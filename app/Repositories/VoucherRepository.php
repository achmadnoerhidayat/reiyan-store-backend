<?php

namespace App\Repositories;

use App\Models\Voucher;

class VoucherRepository
{
    public function getAll($data)
    {
        return Voucher::with('produk')->where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('code', 'like', "%{$data['search']}%");
            }
            if (!empty($data['start_at'])) {
                $q->where('start_at', 'like', "%{$data['start_at']}%");
            }
            if (!empty($data['end_at'])) {
                $q->where('end_at', 'like', "%{$data['end_at']}%");
            }
            if (!empty($data['type'])) {
                $q->where('type', $data['type']);
            }
        })->latest()->paginate($data['limit']);
    }

    public function findValidVoucher($filters)
    {
        $query = Voucher::query();

        if (!empty($filters['id'])) {
            $query->where('id', $filters['id']);
        }

        if (!empty($filters['code'])) {
            $query->where('code', $filters['code']);
        }

        if (!empty($filters['produk_id'])) {
            $query->where('produk_id', $filters['produk_id']);
        }

        if (!empty($filters['user_id'])) {
            $query->whereDoesntHave('voucherUser', function ($q) use ($filters) {
                $q->where('user_id', $filters['user_id']);
            });
        }

        return $query->where('is_active', true)
            ->where('quota', '>', 0)
            ->whereDate('start_at', '<=', now())
            ->whereDate('end_at', '>=', now())
            ->first();
    }

    public function findId($id)
    {
        return Voucher::find($id);
    }

    public function findIdLock($id)
    {
        return Voucher::lockForUpdate()->find($id);
    }

    public function store(array $data)
    {
        return Voucher::create($data);
    }

    public function update(array $data, $id)
    {
        $voucher = Voucher::find($id);
        if (!$voucher) {
            return null;
        }
        return $voucher;
        $voucher->update($data);
    }

    public function delete($id)
    {
        $voucher = Voucher::find($id);
        if (!$voucher) {
            return null;
        }
        $voucher->delete();
        return $voucher;
    }
}
