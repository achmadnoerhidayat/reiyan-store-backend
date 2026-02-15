<?php

namespace App\Repositories;

use App\Models\Rating;

class RatingRepository
{
    public function getAll($data)
    {
        return Rating::with('produk', 'user', 'transaksi', 'admin')->where(function ($q) use ($data) {
            if (!empty($data['produk_id'])) {
                $q->where('produk_id', $data['produk_id']);
            }

            if (!empty($data['user_id'])) {
                $q->where('user_id', $data['user_id']);
            }

            if (!empty($data['is_publish'])) {
                $q->where('is_publish', $data['is_publish']);
            }

            if (!empty($data['search'])) {
                $search = $data['search'];
                $q->whereHas('transaksi', function ($t) use ($search) {
                    $t->where('order_id', 'like', "%{$search}%");
                });
            }
        })->where('is_publish', true)->latest()->paginate($data['limit']);
    }

    public function findId($id)
    {
        return Rating::with('produk', 'user', 'transaksi', 'admin')->find($id);
    }

    public function findRatingByTrans($data)
    {
        return Rating::with('produk', 'user', 'transaksi', 'admin')->where(function ($q) use ($data) {
            $q->where('transaksi_id', $data['transaksi_id'])->where('user_id', $data['user_id']);
        })->first();
    }

    public function store(array $data)
    {
        return Rating::create($data);
    }

    public function update(array $data, $id)
    {
        $rate = Rating::find($id);
        if (!$rate) {
            throw new \Exception('data rating tidak ditemukan');
        }
        return $rate->update($data);
    }

    public function delete($id)
    {
        $rate = Rating::find($id);
        if (!$rate) {
            throw new \Exception('data rating tidak ditemukan');
        }
        return $rate->delete();
    }
}
