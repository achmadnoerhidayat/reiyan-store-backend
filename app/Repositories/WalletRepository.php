<?php

namespace App\Repositories;

use App\Models\Wallet;

class WalletRepository
{

    public function getAll($data)
    {
        return Wallet::with('user', 'history')->where(function ($q) use ($data) {
            if (!empty($data['type'])) {
                $q->where('type', $data['type']);
            }
        })->latest()->paginate($data['limit']);
    }

    public function findWalletUser($user_id)
    {
        return Wallet::with('user', 'history')->lockForUpdate()->where('user_id', $user_id)->first();
    }

    public function findId($id)
    {
        return Wallet::with('user', 'history')->find($id);
    }

    public function store(array $data)
    {
        $Wallet = Wallet::create($data);
        $Wallet->history()->create([
            'amount' => $data['amount'],
            'type' => $data['type'] ?? null,
            'description' => $data['description'] ?? null,
            'balance_before' => $data['balance_before'],
        ]);
        return $Wallet;
    }

    public function update(array $data, $id)
    {
        $Wallet = Wallet::find($id);
        if (!$Wallet) {
            return null;
        }
        $Wallet->update($data);
        $Wallet->history()->create([
            'amount' => $data['amount'],
            'type' => $data['type'] ?? null,
            'description' => $data['description'] ?? null,
            'balance_before' => $data['balance_before'],
        ]);
        return $Wallet;
    }

    public function delete($id)
    {
        $Wallet = Wallet::find($id);
        if (!$Wallet) {
            return null;
        }
        $Wallet->delete();
        return $Wallet;
    }
}
