<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{

    public function getTransAdmin($data)
    {
        $trans = Transaction::with('produk', 'service', 'user', 'voucher', 'payment');
        if (!empty($data['search'])) {
            $trans->where('order_id', 'like', "%{$data['search']}%");
        }
        if (!empty($data['payment_id'])) {
            $trans->where('payment_id', $data['payment_id']);
        }

        return $trans->latest()->paginate($data['limit']);
    }

    public function getTrans($data)
    {
        $trans = Transaction::select('user_id', 'service_id', 'payment_id', 'voucher_id', 'order_id', 'price', 'total', 'discount_amount', 'va_number', 'qr_code', 'status', 'date_exp', 'target_details')->with('service', 'user', 'voucher', 'payment');
        if (!empty($data['search'])) {
            $trans->where('order_id', 'like', "%{$data['search']}%");
        }
        if (!empty($data['payment_id'])) {
            $trans->where('payment_id', $data['payment_id']);
        }

        return $trans->where('user_id', request()->user()->id)->latest()->paginate($data['limit']);
    }

    public function findExstTrans($id)
    {
        return Transaction::where('order_id', $id)->exists();
    }

    public function findId($id)
    {

        return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->find($id);
    }

    public function firstId($id)
    {
        $user = request()->user();
        if (in_array($user->role->name, ['super_admin', 'administrator'])) {
            return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->find($id);
        }
        return Transaction::select('user_id', 'service_id', 'payment_id', 'voucher_id', 'order_id', 'price', 'total', 'discount_amount', 'va_number', 'qr_code', 'status', 'date_exp', 'target_details')->with('produk', 'service', 'user', 'voucher', 'payment')->where('user_id', $user->id)->where('id', $id)->first();
    }

    public function findByReference($data)
    {
        return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->where('reference', $data['reference'])->where('status', $data['status'])->first();
    }

    public function findTrxId($data)
    {
        return Transaction::with('produk', 'service', 'user', 'voucher', 'payment')->whereJsonContains('response_provider', ['trxid' => $data['trxId']])->where('status', $data['status'])->first();
    }

    public function store($data)
    {
        return Transaction::create($data);
    }

    public function update($data, $id)
    {
        $trans = Transaction::find($id);
        if (!$trans) {
            throw new \Exception('data transaksi tidak ditemukan');
        }
        return $trans->update($data);
    }

    public function delete($id)
    {
        $trans = Transaction::find($id);
        if (!$trans) {
            throw new \Exception('data transaksi tidak ditemukan');
        }
        return $trans->delete();
    }
}
