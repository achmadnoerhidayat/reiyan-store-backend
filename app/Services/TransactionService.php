<?php

namespace App\Services;

use App\Jobs\CheckExpTransJob;
use App\Jobs\ProcessOrderJob;
use App\Repositories\ConfigurationiRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\PaymentMethodeRepository;
use App\Repositories\ProdukRepository;
use App\Repositories\ProviderRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\VoucherRepository;
use App\Repositories\WalletRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionService
{
    protected $transRepo;
    protected $confRepo;
    protected $voucherRepo;
    protected $produkRepo;
    protected $providerRepo;
    protected $paymentRepo;
    protected $walletRepo;
    protected $notifRepo;

    public function __construct(TransactionRepository $transRepo, ConfigurationiRepository $confRepo, VoucherRepository $voucherRepo, ProdukRepository $produkRepo, ProviderRepository $providerRepo, PaymentMethodeRepository $paymentRepo, WalletRepository $walletRepo, NotificationRepository $notifRepo)
    {
        $this->transRepo = $transRepo;
        $this->confRepo = $confRepo;
        $this->voucherRepo = $voucherRepo;
        $this->produkRepo = $produkRepo;
        $this->providerRepo = $providerRepo;
        $this->paymentRepo = $paymentRepo;
        $this->walletRepo = $walletRepo;
        $this->notifRepo = $notifRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAdmin($data)
    {
        return $this->transRepo->getTransAdmin($data);
    }

    public function getAll($data)
    {
        return $this->transRepo->getTrans($data);
    }

    public function findId($id)
    {
        return $this->transRepo->firstId($id);
    }

    public function storeTrans($data)
    {
        $transaksi = DB::transaction(function () use ($data) {
            $user = request()->user();
            $data['order_id'] = $this->generateOrderId();
            $nominalDiskon = 0;

            $wallet = null;

            $payment = $this->paymentRepo->findId($data['payment_id']);

            if (!$payment) {
                throw new \Exception('data payment method tidak ditemukan');
            }

            $service = $this->produkRepo->findLayannById($data['service_id']);

            if (!$service) {
                throw new \Exception('data layanan tidak ditemukan');
            }

            if ($service->produk->is_check_server) {
                if (empty($data['server_id'])) {
                    throw new \Exception('Server Wajib Diisi Utk Pembelian Produk Ini');
                }
            }

            if ($service->produk->is_check_name) {
                if (empty($data['nick_name'])) {
                    throw new \Exception('Nick Name Wajib Diisi Utk Pembelian Produk Ini');
                }
            }

            $provider = $service->produk->provider;

            $driverClass = $provider->driver;

            if (!class_exists($driverClass)) {
                throw new \Exception("Driver {$driverClass} tidak ditemukan.");
            }

            $providerUrl = $provider->payload['url'] ?? '';

            // Tentukan tipe provider di awal
            $isIAK = Str::contains($providerUrl, ['iak', 'mobilepulsa']);
            $isVIP = Str::contains($providerUrl, ['vip-reseller']);

            $services = app($driverClass);
            if ($isIAK) {
                $rawData = $services->getPrice($provider);
            }
            if ($isVIP && Str::contains($service->produk->kategori->name, ['game'], true)) {
                $rawData = $services->getStokGame($provider);
                if (!$rawData) {
                    throw new \Exception("Layanan Yang Anda Pilih Belum Tersedia");
                }
            }

            $level = $user->level->name;
            $price = $service->member_price[$level] ?? $service->member_price['bronze'];
            $modal = $service->price_provider;

            if (!empty($data['voucher_id'])) {

                $this->voucherRepo->findIdLock($data['voucher_id']);

                $voucher = $this->voucherRepo->findValidVoucher([
                    'id' => $data['voucher_id'],
                    'produk_id' => $data['produk_id'],
                    'user_id' => $user->id,
                ]);

                if (!$voucher) {
                    throw new \Exception('data voucher tidak valid');
                }

                if ($price < $voucher->min_order) {
                    throw new \Exception("Minimal order untuk voucher ini adalah Rp " . number_format($voucher->min_order, 0, ',', '.'));
                }

                if ($voucher->type === 'percent') {
                    $nominalDiskon = ($voucher->value / 100) * $price;
                } else {
                    $nominalDiskon = $voucher->value;
                }
            }

            $totalPrice = $price - $nominalDiskon;

            $data['discount_amount'] = $nominalDiskon;
            $data['price'] = $price;
            $data['profit'] = $totalPrice - $modal;
            $data['total'] = $totalPrice;
            $data['user_id'] = $user->id;
            $data['target_details'] = [
                'target' => $data['target'] ?? "",
                'server_id' => $data['server_id'] ?? "",
                'nick_name' => $data['nick_name'] ?? "",
            ];

            $order = $this->transRepo->store($data);
            $order->payment_type = $payment->gateway;
            if ($payment->gateway === 'saldo') {
                $wallet = $this->walletRepo->findWalletUser($user->id);

                if (!$wallet) {
                    throw new \Exception('data saldo user tidak ditemukan');
                }

                $balance = $wallet->balance;

                $totalBalance = $balance - $totalPrice;

                if ($totalBalance < 0) {
                    throw new \Exception('saldo user anda tidak mencukupi untuk melakukan transaksi ini');
                }

                $this->walletRepo->update([
                    'balance' => $totalBalance,
                    'amount' => $totalPrice,
                    'type' => 'keluar',
                    'description' => "Topup {$service->produk->name} {$service->nominal}",
                    'balance_before' => $balance,
                ], $wallet->id);
                $order->update(['status' => 'process']);
                DB::afterCommit(function () use ($order) {
                    ProcessOrderJob::dispatch($order->id);
                });

                return $order;
            } else {
                $snap = $this->generateToken($order);
                DB::afterCommit(function () use ($order) {
                    CheckExpTransJob::dispatch($order->id)->delay(Carbon::now()->addMinutes(60));
                });
                return $snap;
            }
        });

        if ($transaksi) {
            $user = request()->user();
            $orders = $this->transRepo->findId($transaksi->id);
            if ($orders->payment->gateway !== 'saldo') {
                $total = number_format($orders->total, 0, ',', '.');
                $this->notifRepo->store([
                    'transaksi_id' => $orders->id,
                    'user_id' => $user->id,
                    'type' => 'ORDER_PENDING',
                    'title' => 'Menunggu Pembayaran',
                    'message' => "Pesanan {$orders->service->nominal} berhasil dibuat! Segera selesaikan pembayaran Rp {$total} via {$orders->payment->name} agar pesanan bisa langsung kami proses.",
                ]);
            }
        }
        return $transaksi;
    }

    public function deleteTrans($id)
    {
        $transaksi = $this->transRepo->findId($id);
        if (!$transaksi) {
            throw new \Exception('data transaksi tidak ditemukan');
        }

        $this->transRepo->delete($id);
        return $transaksi;
    }

    public function callbackPayment($request)
    {
        return DB::transaction(function () use ($request) {
            $transaction = $this->transRepo->findByReference([
                'reference' => $request->reference,
                'status' => 'pending',
            ]);

            if (!$transaction) {
                throw new \Exception("Transaksi tidak ditemukan.");
            }

            $provider = $this->providerRepo->findCode($transaction->payment->gateway);

            if (!$provider) {
                throw new \Exception("Provider tidak ditemukan.");
            }

            $payload = $provider->payload;

            $merchant = isset($payload['username']) ? decrypt($payload['username']) : null;
            $key = isset($payload['api_key']) ? decrypt($payload['api_key']) : null;

            $raw = $merchant . $request->amount . $request->merchantOrderId . $key;
            $signature = md5($raw);

            if ($request->signature != $signature) {
                throw new \Exception("Invalid Signature.");
            }

            if ($request->resultCode === "00") {
                $transaction->update(['status' => 'process']);
                DB::afterCommit(function () use ($transaction) {
                    ProcessOrderJob::dispatch($transaction->id);
                });
            }

            return $request->resultCode === "00";
        });
    }

    public function callbackPpob($request)
    {
        return DB::transaction(function () use ($request) {
            $transaction = $this->transRepo->findTrxId([
                'trxId' => $request->data->trxid,
                'status' => 'process',
            ]);

            if (!$transaction) {
                throw new \Exception("Transaksi tidak ditemukan.");
            }

            $provider = $transaction->produk->provider;

            if (!$provider) {
                throw new \Exception("Provider tidak ditemukan.");
            }

            $payload = $provider->payload;

            $username = isset($payload['username']) ? decrypt($payload['username']) : null;
            $key = isset($payload['api_key']) ? decrypt($payload['api_key']) : null;

            $raw = $username . $key;
            $signature = md5($raw);

            if ($request->header('X-Client-Signature') != $signature) {
                throw new \Exception("Invalid Signature.");
            }

            if ($request->data->status === "success") {
                $this->notifRepo->store([
                    'transaksi_id' => $transaction->id,
                    'user_id' => $transaction->user_id,
                    'type' => 'ORDER_SUCCESS',
                    'title' => 'Topup Berhasil!',
                    'message' => "Pesanan {$transaction->produk->name} sukses dikirim ke {$transaction->target_details['target']}. Puas dengan layanan kami? Kasih ulasan yuk!",
                ]);
                $transaction->update(['status' => 'success', 'response_provider' => $request->data]);
            }

            if ($request->data->status === "error") {
                $wallet = $this->walletRepo->findWalletUser($transaction->user_id);

                if (!$wallet) {
                    $balance = 0;

                    $totalBalance = $transaction->total;
                    $this->walletRepo->store([
                        'balance' => $totalBalance,
                        'amount' => $transaction->total,
                        'type' => 'masuk',
                        'description' => "Refund Transaksi #{$transaction->order_id} Berhasil",
                        'balance_before' => $balance,
                    ]);
                } else {
                    $balance = $wallet->balance;

                    $totalBalance = $transaction->total + $balance;

                    $this->walletRepo->update([
                        'balance' => $totalBalance,
                        'amount' => $transaction->total,
                        'type' => 'masuk',
                        'description' => "Refund Transaksi #{$transaction->order_id} Berhasil",
                        'balance_before' => $balance,
                    ], $wallet->id);
                }
                $this->notifRepo->store([
                    'transaksi_id' => $transaction->id,
                    'user_id' => $transaction->user->id,
                    'type' => 'ORDER_FAILED',
                    'title' => 'Aduh, Pesanan Gagal',
                    'message' => "{$transaction->service->nominal} gagal dikirim ke {$transaction->target_details['target']}. Jangan khawatir, dana sudah kami kembalikan ke saldo Anda.",
                ]);
                $transaction->update(['status' => 'failed', 'response_provider' => $request->data]);
            }

            return $request->data;
        });
    }

    private function generateOrderId()
    {
        $namaBrand = $this->confRepo->get();
        $brand = collect(explode(' ', $namaBrand))
            ->map(fn($word) => strtoupper($word[0]))
            ->join('');
        $date = date('ymd'); // Format: 260210

        do {
            $id = $brand . '-' . $date . '-' . strtoupper(Str::random(6));
        } while ($this->transRepo->findExstTrans($id));

        return $id;
    }

    private function generateToken($order)
    {
        $provider = $this->providerRepo->findCode($order->payment->gateway);
        if (!$provider) {
            throw new \Exception('data provider tidak ditemukan');
        }
        $driverClass = $provider->driver;

        if (!class_exists($driverClass)) {
            throw new \Exception("Driver {$driverClass} tidak ditemukan.");
        }
        $service = app($driverClass);

        $name = "Topup {$order->produk->name} {$order->service->nominal}";
        $items = [];

        $items[] = [
            'price'    => $order->price,
            'quantity' => 1,
            'name'     => $name,
        ];

        if ((int) $order->discount_amount > 0) {
            $items[] = [
                'price' => -$order->discount_amount,
                'quantity' => 1,
                'name' => 'Voucher Diskon'
            ];
        }

        if ((int) $order->payment->fee > 0) {
            $items[] = [
                'price' => $order->payment->fee,
                'quantity' => 1,
                'name' => 'Service Fee'
            ];
        }

        // Susun Params (Lebih ringkas agar tidak double-code)
        $params = [
            'paymentAmount'   => $order->total,
            'paymentMethod'   => $order->payment->code,
            'merchantOrderId' => $order->order_id,
            'productDetails'  => $name,
            'email'           => $order->user->email,
            'phoneNumber'     => $order->user->phone,
            'customerDetail'  => [
                'firstName'   => $order->user->full_name,
                'email'       => $order->user->email,
                'phoneNumber' => $order->user->phone,
                'billingAddress' => [
                    'firstName'   => $order->user->user_name,
                    'address'     => '-',
                    'city'        => '-',
                    'postalCode'  => '-',
                    'countryCode' => "IDN"
                ],
            ],
            'callbackUrl'     => url('/transaksi/callback-payment'),
            'returnUrl'       => url('/transaksi'),
            'expiryPeriod'    => 60,
        ];

        if (count($items) > 0) {
            $params['itemDetails'] = $items;
        }

        $snap = $service->inquiryPayment($params);

        //  Update Data Transaksi
        $this->transRepo->update([
            "reference" => $snap->reference,
            "va_number" => isset($snap->vaNumber) ? $snap->vaNumber : null,
            "qr_code" => isset($snap->qrCode) ? $snap->qrCode : null,
            "date_exp" => Carbon::now()->addMinutes(60)
        ], $order->id);

        $snap->order_id = $order->order_id;
        $snap->payment_type = $order->payment_type;

        return $snap;
    }
}
