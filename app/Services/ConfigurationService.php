<?php

namespace App\Services;

use App\Helper\UploadImage;
use App\Repositories\ConfigurationiRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConfigurationService
{

    protected $confRepo;
    protected $cacheKey = 'configuration';

    public function __construct(ConfigurationiRepository $confRepo)
    {
        $this->confRepo = $confRepo;
        // throw new \Exception('Not implemented');
    }

    public function first()
    {
        return Cache::remember($this->cacheKey, now()->addDays(1), function () {
            return $this->confRepo->get();
        });
    }

    public function findId($id)
    {
        return $this->confRepo->findId($id);
    }

    public function storeConfig($data, $favicon = null, $logo = null)
    {
        $faviconPath = null;
        $logoPath = null;
        try {
            return DB::transaction(function () use ($data, $favicon, $logo, &$faviconPath, &$logoPath) {
                if ($favicon) {
                    $faviconPath = UploadImage::upload($favicon, 'asset/configuration');
                    $data['favicon'] = $faviconPath;
                }
                if ($logo) {
                    $logoPath = UploadImage::upload($logo, 'asset/configuration');
                    $data['logo'] = $logoPath;
                }
                Cache::forget($this->cacheKey);
                return $this->confRepo->store($data);
            });
        } catch (\Exception $e) {
            if ($faviconPath) {
                Storage::disk('public')->delete($faviconPath);
            }
            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }
            throw $e;
        }
    }

    public function updateConfig($id, $data, $favicon = null, $logo = null)
    {
        $faviconPath = null;
        $logoPath = null;
        try {
            return DB::transaction(function () use ($id, $data, $favicon, $logo, &$faviconPath, &$logoPath) {
                $conf = $this->confRepo->findId($id);
                if (!$conf) {
                    throw new \Exception('data configuration tidak ditemukan');
                }
                if ($favicon) {
                    if ($conf->favicon) {
                        Storage::disk('public')->delete($conf->favicon);
                    }
                    $faviconPath = UploadImage::upload($favicon, 'asset/configuration');
                    $data['favicon'] = $faviconPath;
                }
                if ($logo) {
                    if ($conf->logo) {
                        Storage::disk('public')->delete($conf->logo);
                    }
                    $logoPath = UploadImage::upload($logo, 'asset/configuration');
                    $data['logo'] = $logoPath;
                }
                Cache::forget($this->cacheKey);
                return $this->confRepo->update($data, $conf->id);
            });
        } catch (\Exception $e) {
            if ($faviconPath) {
                Storage::disk('public')->delete($faviconPath);
            }
            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }
            throw $e;
        }
    }

    public function deleteConf($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $conf = $this->confRepo->findId($id);
                // Cek jika data tidak ditemukan
                if (!$conf) {
                    // Kamu bisa return null atau lempar custom exception
                    throw new \Exception("Configuration dengan ID {$id} tidak ditemukan.");
                }

                if ($conf->favicon) {
                    Storage::disk('public')->delete($conf->favicon);
                }
                if ($conf->logo) {
                    Storage::disk('public')->delete($conf->logo);
                }

                $response = $this->confRepo->delete($conf->id);
                Cache::forget($this->cacheKey);
                return $response;
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
