<?php

namespace App\Services;

use App\Repositories\WalletRepository;
use Illuminate\Support\Facades\DB;

class WalletService
{

    protected $walletRepo;
    public function __construct(WalletRepository $walletRepo)
    {
        $this->walletRepo = $walletRepo;
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
