<?php

namespace App\Services;

use App\Repositories\NotificationRepository;
use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class WalletService
{

    protected $walletRepo;
    protected $notifRepo;
    public function __construct(WalletRepository $walletRepo, NotificationRepository $notifRepo)
    {
        $this->walletRepo = $walletRepo;
        $this->notifRepo = $notifRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        $wallet = $this->walletRepo->getAll($data);
        return $wallet;
    }

    public function fetchByUser()
    {
        $wallet = $this->walletRepo->findWalletUser(request()->user()->id);
        if (!$wallet) {
            throw new \Exception('dat wallet tidak ditemukan');
        }
        return $wallet;
    }

    public function validPin($pin)
    {
        $wallet = $this->walletRepo->findWalletUser(request()->user()->id);
        if (!$wallet || !Hash::check($pin, $wallet->pin)) {
            if ($wallet->is_frozen) {
                throw new \Exception('Akun Dibekukan Sementara');
            }
            $pin_attempts = $wallet->pin_attempts;
            $data = [
                'pin_attempts' => $pin_attempts + 1
            ];

            if ($wallet->pin_attempts > 5) {
                $data['is_frozen'] = true;
                $data['pin_attempts'] = $pin_attempts;
                $this->notifRepo->store([
                    'user_id' => request()->user()->id,
                    'type' => 'SYSTEM_INFO',
                    'title'   => 'Keamanan: Akun Dibekukan Sementara',
                    'message' => 'Anda telah salah memasukkan PIN sebanyak 5 kali. Demi keamanan, akun Anda dibekukan sementara. Silakan hubungi Admin untuk aktivasi kembali.',
                ]);
            }

            $this->walletRepo->update($data, $wallet->id);
            throw ValidationException::withMessages([
                'pin' => ['Pin Tidak Sesuai.'],
            ]);
        }
        if ($wallet->is_frozen) {
            throw new \Exception('Akun Dibekukan Sementara');
        }
        return $wallet;
    }

    public function createWallet($data)
    {
        return DB::transaction(function () use ($data) {
            $wallet = $this->walletRepo->findWalletUser(request()->user()->id);
            if ($wallet) {
                throw new \Exception('data wallet sudah tersedia');
            }
            return $this->walletRepo->store([
                'user_id' => request()->user()->id,
                'pin' => $data['pin'],
            ]);
        });
    }

    public function updateWallet($data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $wallet = $this->walletRepo->findId($id);
            if (!$wallet) {
                throw new \Exception('data wallet tidak tersedia');
            }
            return $this->walletRepo->update($data, $id);
        });
    }
}
