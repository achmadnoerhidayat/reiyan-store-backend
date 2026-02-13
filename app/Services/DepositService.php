<?php

namespace App\Services;

use App\Jobs\CheckExpDepositJob;
use App\Repositories\ConfigurationiRepository;
use App\Repositories\DepositRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\PaymentMethodeRepository;
use App\Repositories\ProviderRepository;
use App\Repositories\WalletRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepositService
{

    protected $depositRepo;
    protected $confRepo;
    protected $paymentRepo;
    protected $providerRepo;
    protected $notifRepo;
    protected $walletRepo;
    public function __construct(DepositRepository $depositRepo, ConfigurationiRepository $confRepo, PaymentMethodeRepository $paymentRepo, ProviderRepository $providerRepo, NotificationRepository $notifRepo, WalletRepository $walletRepo)
    {
        $this->depositRepo = $depositRepo;
        $this->confRepo = $confRepo;
        $this->paymentRepo = $paymentRepo;
        $this->providerRepo = $providerRepo;
        $this->notifRepo = $notifRepo;
        $this->walletRepo = $walletRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return $this->depositRepo->getAll($data);
    }

    public function getAdmin($data)
    {
        return $this->depositRepo->getAdmin($data);
    }

    public function findId($id)
    {
        return $this->depositRepo->firstId($id);
    }

    public function createDeposit($data)
    {
        return DB::transaction(function () use ($data) {
            $user = request()->user();
            $data['order_id'] = $this->generateOrderId();
            $payment = $this->paymentRepo->findId($data['payment_id']);

            if (!$payment) {
                throw new \Exception('data payment method tidak ditemukan');
            }

            if ((int) $data['amount'] < 10000) {
                throw new \Exception('Min Deposit 10.000');
            }
            $data['user_id'] = $user->id;
            $deposit = $this->depositRepo->store($data);
            DB::afterCommit(function () use ($deposit, $user) {
                $total = number_format($deposit->amount, 0, ',', '.');
                $this->notifRepo->store([
                    'user_id' => $user->id,
                    'type' => 'TOPUP_PENDING',
                    'title' => 'Menunggu Pembayaran',
                    'message' => "Pesanan deposit sebesar Rp {number_format($total)} via {$deposit->payment->name} telah berhasil dibuat. Silakan selesaikan pembayaran agar saldo masuk ke akun Anda secara otomatis.",
                ]);
                CheckExpDepositJob::dispatch($deposit->id);
            });
            return $this->generateToken($deposit);
        });
    }

    public function deleteDeposit($id)
    {
        $deposit = $this->depositRepo->findId($id);
        if (!$deposit) {
            throw new \Exception('data deposit tidak ditemukan');
        }

        return $this->depositRepo->delete($deposit->id);
    }

    public function callbackPayment($request)
    {
        return DB::transaction(function () use ($request) {
            $deposit = $this->depositRepo->findByReference([
                'reference' => $request->reference,
                'status' => 'pending',
            ]);

            if (!$deposit) {
                throw new \Exception("Deposit tidak ditemukan.");
            }

            $provider = $this->providerRepo->findCode($deposit->payment->gateway);

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
                $wallet = $this->walletRepo->findWalletUser($deposit->user->id);

                if (!$wallet) {
                    $this->walletRepo->store([
                        'balance' => $deposit->amount,
                        'amount' => $deposit->amount,
                        'type' => 'masuk',
                        'description' => "Deposit saldo via {$deposit->payment->name} berhasil (Ref: {$deposit->reference})",
                        'balance_before' => 0,
                    ]);
                } else {
                    $balance = $wallet->balance;

                    $totalBalance = $balance + $deposit->amount;

                    $this->walletRepo->update([
                        'balance' => $totalBalance,
                        'amount' => $deposit->amount,
                        'type' => 'masuk',
                        'description' => "Deposit saldo via {$deposit->payment->name} berhasil (Ref: {$deposit->reference})",
                        'balance_before' => $balance,
                    ], $wallet->id);
                }

                $deposit->update(['status' => 'success']);

                DB::afterCommit(function () use ($deposit) {
                    $total = number_format($deposit->amount, 0, ',', '.');
                    $this->notifRepo->store([
                        'user_id' => $deposit->user->id,
                        'type' => 'TOPUP_SUCCESS',
                        'title' => 'Pembayaran Diterima',
                        'message' => "Deposit sebesar Rp {$total} telah masuk ke akun Anda. Terima kasih telah bertransaksi!",
                    ]);
                });
            }

            return $request->resultCode === "00";
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
        } while ($this->depositRepo->findExstDepo($id));

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

        $name = "Deposit {number_format($order->amount, 0, ',', '.')}";
        $items = [];

        $items[] = [
            'price'    => $order->amount,
            'quantity' => 1,
            'name'     => $name,
        ];

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
            'callbackUrl'     => url('/deposit/callback-payment'),
            'returnUrl'       => url('/transaksi'),
            'expiryPeriod'    => 60,
        ];

        if (count($items) > 0) {
            $params['itemDetails'] = $items;
        }

        $snap = $service->inquiryPayment($params);

        //  Update Data Transaksi
        $this->depositRepo->update([
            "reference" => $snap->reference,
            "va_number" => isset($snap->vaNumber) ? $snap->vaNumber : null,
            "qr_code" => isset($snap->qrCode) ? $snap->qrCode : null,
            "date_exp" => Carbon::now()->addMinutes(60)
        ], $order->id);

        $snap->order_id = $order->order_id;

        return $snap;
    }
}
