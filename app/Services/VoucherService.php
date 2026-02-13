<?php

namespace App\Services;

use App\Repositories\VoucherRepository;
use Illuminate\Support\Facades\DB;

class VoucherService
{

    protected $voucherRepo;
    public function __construct(VoucherRepository $voucherRepo)
    {
        $this->voucherRepo = $voucherRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return $this->voucherRepo->getAll($data);
    }

    public function findId($id)
    {
        return $this->voucherRepo->findId($id);
    }

    public function findValidVoucher($filter)
    {
        return $this->voucherRepo->findValidVoucher($filter);
    }

    public function findIdLock($id)
    {
        return $this->voucherRepo->findIdLock($id);
    }

    public function storeVoucher($data)
    {
        return DB::transaction(function () use ($data) {
            return $this->voucherRepo->store($data);
        });
    }

    public function updateVoucher($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $seo = $this->voucherRepo->findId($id);
            if (!$seo) {
                throw new \Exception('data Voucher tidak ditemukan');
            }
            return $this->voucherRepo->update($data, $seo->id);
        });
    }

    public function deleteVoucher($id)
    {
        return DB::transaction(function () use ($id) {
            $seo = $this->voucherRepo->findId($id);
            // Cek jika data tidak ditemukan
            if (!$seo) {
                // Kamu bisa return null atau lempar custom exception
                throw new \Exception("Voucher dengan ID {$id} tidak ditemukan.");
            }

            return $this->voucherRepo->delete($seo->id);
        });
    }
}
