<?php

namespace App\Repositories;

use App\Models\Deposit;

class DepositRepository
{
    public function getAll($data)
    {
        $user = request()->user();
        return Deposit::with('user', 'payment')->where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('order_id', 'like', "%{$data['search']}%");
            }

            if (!empty($data['status'])) {
                $q->where('status', 'like', "%{$data['status']}%");
            }
        })->where('user_id', $user->id)->latest()->paginate($data['limit']);
    }

    public function getAdmin($data)
    {
        return Deposit::with('user', 'payment')->where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('order_id', 'like', "%{$data['search']}%");
            }

            if (!empty($data['status'])) {
                $q->where('status', 'like', "%{$data['status']}%");
            }
        })->latest()->paginate($data['limit']);
    }

    public function findId($id)
    {
        return Deposit::with('user', 'payment')->find($id);
    }

    public function firstId($id)
    {
        $user = request()->user();
        if (in_array($user->role->name, ['super_admin', 'administrator'])) {
            return Deposit::with('user', 'payment')->find($id);
        }
        return Deposit::with('user', 'payment')->where('user_id', $user->id)->where('id', $id)->first();
    }

    public function findOrderId($orderId)
    {
        return Deposit::with('user', 'payment')->where('order_id', $orderId)->first();
    }

    public function findExstDepo($id)
    {
        return Deposit::where('order_id', $id)->exists();
    }

    public function findByReference($data)
    {
        return Deposit::with('user', 'payment')->where('reference', $data['reference'])->where('status', $data['status'])->first();
    }

    public function store($data)
    {
        return Deposit::create($data);
    }

    public function update($data, $id)
    {
        $deposit = Deposit::find($id);
        if (!$deposit) {
            throw new \Exception('data Deposit tidak ditemukan');
        }
        return $deposit->update($data);
    }

    public function delete($id)
    {
        $deposit = Deposit::find($id);
        if (!$deposit) {
            throw new \Exception('data Deposit tidak ditemukan');
        }
        return $deposit->delete();
    }
}
