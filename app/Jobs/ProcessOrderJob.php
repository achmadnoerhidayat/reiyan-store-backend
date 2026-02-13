<?php

namespace App\Jobs;

use App\Repositories\NotificationRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\WalletRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ProcessOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $transId;

    /**
     * Create a new job instance.
     */
    public function __construct($transId)
    {
        $this->transId = $transId;
    }

    /**
     * Execute the job.
     */
    public function handle(TransactionRepository $service, WalletRepository $walletRepo, NotificationRepository $notifRepo): void
    {
        $transaksi = $service->findId($this->transId);
        if (!$transaksi) {
            throw new \Exception("Transaksi Tidak Ditemukan");
        }
        if (!in_array($transaksi->status, ['process'])) {
            throw new \Exception("Status Tidak Valid");
        }

        $produk = $transaksi->produk;
        $provider = $produk->provider;

        $driverClass = $provider->driver;

        if (!class_exists($driverClass)) {
            throw new \Exception("Driver {$driverClass} tidak ditemukan.");
        }

        $services = app($driverClass);

        $rawData = $services->orderGame($provider, [
            'code' => $transaksi->target_details['code'],
            'target' => $transaksi->target_details['target'],
            'server_id' => $transaksi->target_details['server_id'],
        ]);

        DB::transaction(function () use ($transaksi, $rawData, $walletRepo, $notifRepo) {
            if (!$rawData['result']) {
                $wallet = $walletRepo->findWalletUser($transaksi->user_id);
                if (!$wallet) {
                    $balance = 0;

                    $totalBalance = $transaksi->total;
                    $walletRepo->store([
                        'balance' => $totalBalance,
                        'amount' => $transaksi->total,
                        'type' => 'masuk',
                        'description' => "Refund Transaksi #{$transaksi->order_id} Berhasil",
                        'balance_before' => $balance,
                    ]);
                } else {
                    $balance = $wallet->balance;

                    $totalBalance = $transaksi->total + $balance;

                    $walletRepo->update([
                        'balance' => $totalBalance,
                        'amount' => $transaksi->total,
                        'type' => 'masuk',
                        'description' => "Refund Transaksi #{$transaksi->order_id} Berhasil",
                        'balance_before' => $balance,
                    ], $wallet->id);
                }
                $notifRepo->store([
                    'transaksi_id' => $transaksi->id,
                    'user_id' => $transaksi->user->id,
                    'type' => 'ORDER_FAILED',
                    'title' => 'Aduh, Pesanan Gagal',
                    'message' => "{$transaksi->service->nominal} gagal dikirim ke {$transaksi->target_details['target']}. Jangan khawatir, dana sudah kami kembalikan ke saldo Anda.",
                ]);

                $transaksi->update(['status' => 'failed', 'response_provider' => $rawData['data']]);
            } else {
                $notifRepo->store([
                    'transaksi_id' => $transaksi->id,
                    'user_id' => $transaksi->user->id,
                    'type' => 'ORDER_PENDING',
                    'title' => 'Pesanan Diproses',
                    'message' => "{$transaksi->service->nominal} sedang dikirim ke {$transaksi->target_details['target']}. Tunggu sebentar ya, sistem sedang bekerja.",
                ]);
                $transaksi->update(['response_provider' => $rawData['data']]);
            }
        });
    }
}
