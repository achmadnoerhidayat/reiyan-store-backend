<?php

namespace App\Repositories;

use App\Models\Voucher;

class VoucherRepository
{
    protected $produkRepo;
    protected $userRepo;
    public function __construct(ProdukRepository $produkRepo, UserRepository $userRepo)
    {
        $this->produkRepo = $produkRepo;
        $this->userRepo = $userRepo;
        // throw new \Exception('Not implemented');
    }
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
        if (empty($filters['service_id'])) {
            throw new \Exception('service id wajib diisi');
        }
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

        $service = $this->produkRepo->findLayannById($filters['service_id']);
        if (empty($service)) {
            throw new \Exception('service tidak ditemukan');
        }

        $user = $this->userRepo->findId($filters['user_id']);
        if (empty($user)) {
            throw new \Exception('user tidak ditemukan');
        }

        $level = $user->level->name;

        $price = $service->member_price[$level] ?? $service->member_price['bronze'];

        return $query->where('is_active', true)
            ->where('quota', '>', 0)
            ->where('min_order', '<=', $price)
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
        return $voucher->update($data);
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

    public function usedVoucher($id, $user_id)
    {
        $voucher = Voucher::find($id);
        if (!$voucher) {
            return null;
        }
        $voucher->voucherUser()->create([
            'user_id' => $user_id
        ]);
        $used = $voucher->used;
        $quota = $voucher->quota;

        $voucher->update([
            'used' => $used + 1,
            'quota' => $quota - 1
        ]);
        return $voucher;
    }
}
