<?php

namespace App\Services;

use App\Repositories\SeoRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SeoService
{

    protected $seoRepo;
    protected $cacheKey = 'seo';
    public function __construct(SeoRepository $seoRepo)
    {
        $this->seoRepo = $seoRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return Cache::remember($this->cacheKey, now()->addDays(1), function () use ($data) {
            return $this->seoRepo->getAll($data);
        });
    }

    public function findId($id)
    {
        return $this->seoRepo->findId($id);
    }

    public function storeSeo($data)
    {
        return DB::transaction(function () use ($data) {
            Cache::forget($this->cacheKey);
            return $this->seoRepo->store($data);
        });
    }

    public function updateSeo($id, $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $seo = $this->seoRepo->findId($id);
            if (!$seo) {
                throw new \Exception('data Seo Meta Tag tidak ditemukan');
            }
            Cache::forget($this->cacheKey);
            return $this->seoRepo->update($data, $seo->id);
        });
    }

    public function deleteSeo($id)
    {
        return DB::transaction(function () use ($id) {
            $seo = $this->seoRepo->findId($id);
            // Cek jika data tidak ditemukan
            if (!$seo) {
                // Kamu bisa return null atau lempar custom exception
                throw new \Exception("Seo Meta Tag dengan ID {$id} tidak ditemukan.");
            }
            Cache::forget($this->cacheKey);
            return $this->seoRepo->delete($seo->id);
        });
    }
}
