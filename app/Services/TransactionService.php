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

    public function firstRevenue($data)
    {
        return $this->transRepo->getRevenue($data);
    }

    public function firstSales($data)
    {
        return $this->transRepo->getSalesCount($data);
    }

    public function firstSpending()
    {
        return $this->transRepo->getSpending();
    }

    public function getRevenueStats($type)
    {
        return $this->transRepo->getRevenueStats($type);
    }

    public function storeTrans($data)
    {
        return DB::transaction(function () use ($data) {
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
                $rawData = $services->getPrice($provider, $service->code);
            }
            if ($isVIP && Str::contains($service->produk->kategori->name, ['game'], true)) {
                $rawData = $services->getStokGame($provider, $service->code);
                if (!$rawData) {
                    throw new \Exception("Layanan Yang Anda Pilih Belum Tersedia");
                }
            }

            $level = $user->level->name;
            $price = $service->member_price[$level] ?? $service->member_price['bronze'];
            $modal = $service->price_provider;

            if (!empty($data['voucher_id'])) {

                $voucher = $this->voucherRepo->findValidVoucher([
                    'id' => $data['voucher_id'],
                    'produk_id' => $data['produk_id'],
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                ]);

                if (!$voucher) {
                    throw new \Exception('data voucher tidak valid');
                }

                $this->voucherRepo->findIdLock($data['voucher_id']);


                if ($price < $voucher->min_order) {
                    throw new \Exception("Minimal order untuk voucher ini adalah Rp " . number_format($voucher->min_order, 0, ',', '.'));
                }

                if ($voucher->type === 'percent') {
                    $nominalDiskon = ($voucher->value / 100) * $price;
                } else {
                    $nominalDiskon = $voucher->value;
                }
                $this->voucherRepo->usedVoucher($voucher->id, $user->id);
            }

            $totalPrice = $price - $nominalDiskon;

            $data['discount_amount'] = $nominalDiskon;
            $data['price'] = $price;
            $data['profit'] = $totalPrice - $modal;
            $data['total'] = $totalPrice + $payment->fee;
            $data['user_id'] = $user->id;
            $data['target_details'] = [
                'target' => $data['target'] ?? "",
                'server_id' => $data['server_id'] ?? "",
                'nick_name' => $data['nick_name'] ?? "",
            ];
            $data['date_exp'] = Carbon::now()->addMinutes(60);

            $order = $this->transRepo->store($data);
            $order->payment_type = $payment->gateway;
            if ($payment->category === 'Saldo') {
                $wallet = $this->walletRepo->findWalletUser($user->id);

                if (!$wallet) {
                    throw new \Exception('data saldo user tidak ditemukan');
                }

                if ($wallet->is_frozen) {
                    throw new \Exception('Akun Dibekukan Sementara');
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
                DB::afterCommit(function () use ($order, $user) {
                    $total = number_format($order->total, 0, ',', '.');
                    $this->notifRepo->store([
                        'transaksi_id' => $order->id,
                        'user_id' => $user->id,
                        'type' => 'ORDER_PENDING',
                        'title' => 'Menunggu Pembayaran',
                        'message' => "Pesanan {$order->service->nominal} berhasil dibuat! Segera selesaikan pembayaran Rp {$total} via {$order->payment->name} agar pesanan bisa langsung kami proses.",
                    ]);
                    CheckExpTransJob::dispatch($order->id)->delay(Carbon::now()->addMinutes(60));
                });
                return $snap;
            }
        });
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
        $brand = collect(explode(' ', $namaBrand->title))
            ->map(fn($word) => strtoupper($word[0]))
            ->join('');
        $date = date('ymd');
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
            'callbackUrl'     => env('APP_URL') . '/transaksi/callback-payment',
            'returnUrl'       => env('APP_URL') . '/transaksi',
            'expiryPeriod'    => 60,
        ];

        if (count($items) > 0) {
            $params['itemDetails'] = $items;
        }

        $snap = $service->inquiryPayment($provider, $params);
        //  Update Data Transaksi
        $this->transRepo->update([
            "reference" => $snap->reference,
            "va_number" => isset($snap->vaNumber) ? $snap->vaNumber : null,
            "qr_code" => isset($snap->qrCode) ? $snap->qrCode : null,
            "date_exp" => Carbon::now()->addMinutes(60)
        ], $order->id);

        $snap->order_id = $order->order_id;
        $snap->payment_type = $order->payment_type;
        $snap->url_js = $provider->payload['url_js'];

        return $snap;
    }
}
