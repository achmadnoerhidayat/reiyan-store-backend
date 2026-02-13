<?php

namespace App\Services;

use App\Helper\UploadImage;
use App\Repositories\SocialMediaRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SocialService
{

    protected $socialRepo;
    protected $cacheKey = 'social-media';
    public function __construct(SocialMediaRepository $socialRepo)
    {
        $this->socialRepo = $socialRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return Cache::remember($this->cacheKey, now()->addDays(1), function () use ($data) {
            return $this->socialRepo->getAll($data);
        });
    }

    public function findId($id)
    {
        return $this->socialRepo->findId($id);
    }

    public function storeSocial($data, $icon = null)
    {
        $iconPath = null;
        try {
            return DB::transaction(function () use ($data, $icon, &$iconPath) {
                if (!empty($icon)) {
                    $iconPath = UploadImage::upload($icon, 'asset/social');
                    $data['icon'] = $iconPath;
                }
                Cache::forget($this->cacheKey);
                return $this->socialRepo->store($data);
            });
        } catch (\Exception $e) {
            if (!empty($iconPath)) {
                Storage::disk('public')->delete($iconPath);
            }
            throw $e;
        }
    }

    public function updateSocial($data, $id, $icon = null)
    {
        $iconPath = null;
        try {
            return DB::transaction(function () use ($id, $data, $icon, &$iconPath) {
                $social = $this->socialRepo->findId($id);
                if (!$social) {
                    throw new \Exception('data social media tidak ditemukan');
                }
                if (!empty($icon)) {
                    if ($social->icon) {
                        Storage::disk('public')->delete($social->icon);
                    }
                    $iconPath = UploadImage::upload($icon, 'asset/social');
                    $data['icon'] = $iconPath;
                }
                Cache::forget($this->cacheKey);
                return $this->socialRepo->update($data, $id);
            });
        } catch (\Exception $e) {
            if (!empty($iconPath)) {
                Storage::disk('public')->delete($iconPath);
            }
            throw $e;
        }
    }

    public function deleteSocial($id)
    {
        return DB::transaction(function () use ($id) {
            $social = $this->socialRepo->findId($id);
            if (!$social) {
                throw new \Exception('data social media tidak ditemukan');
            }
            if ($social->icon) {
                Storage::disk('public')->delete($social->icon);
            }
            Cache::forget($this->cacheKey);
            return $this->socialRepo->delete($id);
        });
    }
}
