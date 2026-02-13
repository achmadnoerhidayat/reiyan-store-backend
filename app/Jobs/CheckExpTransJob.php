<?php

namespace App\Jobs;

use App\Repositories\TransactionRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckExpTransJob implements ShouldQueue
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
    public function handle(TransactionRepository $transRepo): void
    {
        $transaksi = $transRepo->findId($this->transId);

        if (!$transaksi) {
            throw new \Exception("Transaksi Tidak Ditemukan");
        }

        if ($transaksi->status === 'pending') {
            $transRepo->update([
                'status' => 'expire'
            ], $transaksi->id);
        }
    }
}
