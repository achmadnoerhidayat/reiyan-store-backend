<?php

namespace App\Services;

use App\Helper\UploadImage;
use App\Repositories\BannerRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerService
{

    protected $bannerRepo;
    protected $cacheKey = 'banner';
    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepo = $bannerRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return Cache::remember($this->cacheKey, now()->addDays(1), function () use ($data) {
            return $this->bannerRepo->getAll($data);
        });
    }

    public function findId($id)
    {
        return $this->bannerRepo->findId($id);
    }

    public function storeBanner($data, $image = null)
    {
        $imagePath = null;
        try {
            return DB::transaction(function () use ($data, $image, &$imagePath) {
                if ($image) {
                    $imagePath = UploadImage::upload($image, 'asset/banner');
                    $data['image_url'] = $imagePath;
                }
                Cache::forget($this->cacheKey);
                return $this->bannerRepo->store($data);
            });
        } catch (\Exception $e) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            throw $e;
        }
    }

    public function updateBanner($id, $data, $image = null)
    {
        $imagePath = null;
        try {
            return DB::transaction(function () use ($id, $data, $image, &$imagePath) {
                $banner = $this->bannerRepo->findId($id);
                if (!$banner) {
                    throw new \Exception('data Banner tidak ditemukan');
                }
                if ($image) {
                    if ($banner->image) {
                        Storage::disk('public')->delete($banner->image);
                    }
                    $imagePath = UploadImage::upload($image, 'asset/banner');
                    $data['image_url'] = $imagePath;
                }
                Cache::forget($this->cacheKey);
                return $this->bannerRepo->update($data, $banner->id);
            });
        } catch (\Exception $e) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            throw $e;
        }
    }

    public function deleteBanner($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $banner = $this->bannerRepo->findId($id);
                // Cek jika data tidak ditemukan
                if (!$banner) {
                    // Kamu bisa return null atau lempar custom exception
                    throw new \Exception("Configuration dengan ID {$id} tidak ditemukan.");
                }

                if ($banner->image_url) {
                    Storage::disk('public')->delete($banner->image_url);
                }
                Cache::forget($this->cacheKey);
                return $this->bannerRepo->delete($banner->id);
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
