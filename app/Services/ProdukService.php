<?php

namespace App\Services;

use App\Helper\UploadImage;
use App\Repositories\MemberRepository;
use App\Repositories\ProdukRepository;
use App\Repositories\ProviderRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukService
{
    protected $produkRepo;
    protected $provider;
    protected $memberRepo;

    public function __construct(ProdukRepository $produkRepo, ProviderRepository $provider, MemberRepository $memberRepo)
    {
        $this->produkRepo = $produkRepo;
        $this->provider = $provider;
        $this->memberRepo = $memberRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        $user = auth('sanctum')->user();

        $level = 'bronze';

        if ($user) {
            if (in_array($user->role->name, ['super_admin', 'administrator'])) {
                return $this->produkRepo->getAll($data);
            }
            $level = $user->level->name;
        }

        $produk = $this->produkRepo->getAll($data);
        foreach ($produk as $value) {
            $formatted = $value->layanan->map(function ($service) use ($level) {
                return [
                    'code' => $service->code,
                    'nominal' => $service->nominal,
                    'deskripsi' => $service->deskripsi,
                    'status' => $service->status,
                    'price' => $service->member_price[$level] ?? $service->member_price['bronze'],
                    'created_at' => $service->created_at->format('Y-m-d H:i'),
                    'updated_at' => $service->updated_at->format('Y-m-d H:i'),
                ];
            });
            $value->unsetRelation('layanan');
            $value->setRelation('layanan', $formatted);
        }
        return $produk;
    }

    public function getSlug($slug)
    {
        $user = auth('sanctum')->user();

        $level = 'bronze';

        if ($user) {
            if (in_array($user->role->name, ['super_admin', 'administrator'])) {
                return $this->produkRepo->findSlug($slug);
            }
            $level = $user->level->name;
        }

        $produk = $this->produkRepo->findSlug($slug);
        $formatted = $produk->layanan->map(function ($service) use ($level) {
            return [
                'code' => $service->code,
                'nominal' => $service->nominal,
                'deskripsi' => $service->deskripsi,
                'status' => $service->status,
                'price' => $service->member_price[$level] ?? $service->member_price['bronze'],
                'created_at' => $service->created_at->format('Y-m-d H:i'),
                'updated_at' => $service->updated_at->format('Y-m-d H:i'),
            ];
        });
        $produk->unsetRelation('layanan');
        $produk->setRelation('layanan', $formatted);
        return $produk;
    }

    public function priceList($slug)
    {
        $produk = $this->produkRepo->findSlug($slug);

        if (!$produk) {
            throw new \Exception('produk tidak ditemukan');
        }

        $provider = $produk->provider;

        $driverClass = $provider->driver;

        if (!class_exists($driverClass)) {
            throw new \Exception("Driver {$driverClass} tidak ditemukan.");
        }

        $providerUrl = $provider->payload['url'] ?? '';

        // Tentukan tipe provider di awal
        $isIAK = Str::contains($providerUrl, ['iak', 'mobilepulsa']);
        $isVIP = Str::contains($providerUrl, ['vip-reseller']);

        $service = app($driverClass);
        if ($isIAK) {
            $rawData = $service->getPrice($provider);
        }
        if ($isVIP && Str::contains($produk->kategori->name, ['game'], true)) {
            $rawData = $service->getPriceGame($provider);
        }
        $productItems = collect($rawData)->filter(function ($value) use ($produk, $isIAK, $isVIP) {
            $match = null;
            $hargaCukup = null;
            if ($isIAK) {
                $match = Str::contains($value['product_code'], $produk->code);
                $hargaCukup = (int) $value['product_price'] > 10000;
            }
            if ($isVIP) {
                $type = strtolower($produk->provider->payload['type'] ?? 'basic');
                $price = (int) ($value['price'][$type] ?? $value['price']['basic']);
                $match = Str::contains($value['game'], $produk->code);
                $hargaCukup = (int) $price > 10000;
            }

            return $match && $hargaCukup;
        })->map(function ($value) {
            return (array) $value;
        })->values()->all();

        return $productItems;
    }

    public function createLayanan($slug)
    {
        $produk = $this->produkRepo->findSlug($slug);
        if (!$produk) throw new \Exception('produk tidak ditemukan');

        $provider = $produk->provider;
        $driverClass = $provider->driver;

        if (!class_exists($driverClass)) {
            throw new \Exception("Driver {$driverClass} tidak ditemukan.");
        }

        if (!$provider->is_active) {
            throw new \Exception("Provider Tidak Aktif");
        }

        $providerUrl = $provider->payload['url'] ?? '';

        // Tentukan tipe provider di awal
        $isIAK = Str::contains($providerUrl, ['iak', 'mobilepulsa']);
        $isVIP = Str::contains($providerUrl, ['vip-reseller']);

        $service = app($driverClass);
        if ($isIAK) {
            $rawData = $service->getPrice($provider);
        }
        if ($isVIP && Str::contains($produk->kategori->name, ['game'], true)) {
            $rawData = $service->getPriceGame($provider);
        }

        // Ambil semua member sekali aja (Eager Loading mindset)
        $members = $this->memberRepo->getAll();
        $batchLayanan = [];

        foreach ($rawData as $value) {
            $price = 0;
            $temp = [];

            if ($isIAK) {
                if (!Str::contains($value['product_description'] ?? '', $produk->code, true)) continue;
                $price = (int) ($value['product_price'] ?? 0);
                if ($price <= 10000) continue;

                $temp = [
                    'code' => $value['product_code'],
                    'nominal' => $value['product_nominal'],
                    'deskripsi' => $value['product_description'],
                    'status' => $value['status'],
                    'price_provider' => $price,
                ];
            } elseif ($isVIP) {
                if (!Str::contains($value['game'] ?? '', $produk->code, true)) continue;
                $type = strtolower($provider->payload['type'] ?? 'basic');
                $price = (int) ($value['price'][$type] ?? $value['price']['basic']);
                if ($price <= 10000) continue;
                $temp = [
                    'code' => isset($value['code']) ? $value['code'] : null,
                    'nominal' => isset($value['name']) ? $value['name'] : null,
                    'deskripsi' => isset($value['game']) ? $value['game'] : null,
                    'status' => isset($value['status']) ? $value['status'] : null,
                    'price_provider' => $price,
                ];
            }

            if (!empty($temp)) {
                $temp['provider_id'] = $provider->id;
                $temp['member_price'] = $this->generateMmber($price, $members);
                $batchLayanan[] = $temp;
            }
        }
        // Eksekusi Transaction untuk Bulk Insert
        return DB::transaction(function () use ($produk, $batchLayanan) {
            foreach ($batchLayanan as $value) {
                $this->produkRepo->storeLayanan($produk->id, $value);
            }
        });
    }

    public function findId($id)
    {
        return $this->produkRepo->findId($id);
    }

    public function findSlug($slug)
    {
        return $this->produkRepo->findSlug($slug);
    }

    public function createProduk($data, $imageLogo = null, $imageBanner = null)
    {
        $logoPath = null;
        $bannerPath = null;
        try {
            return DB::transaction(function () use ($data, $imageLogo, $imageBanner, &$logoPath, &$bannerPath) {
                if ($imageLogo) {
                    $logo = UploadImage::upload($imageLogo, 'asset/produk');
                    $logoPath = $logo;
                    $data['logo'] = $logo;
                }

                if ($imageBanner) {
                    $baner = UploadImage::upload($imageBanner, 'asset/produk');
                    $bannerPath = $baner;
                    $data['banner'] = $baner;
                }
                $produk = $this->produkRepo->store($data);
                if ($produk) {
                    $this->createLayanan($produk->slug);
                }
                return $this->produkRepo->store($data);
            });
        } catch (\Exception $e) {
            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }
            if ($bannerPath) {
                Storage::disk('public')->delete($bannerPath);
            }

            throw $e;
        }
    }

    public function updateProduk($id, $data, $imageLogo = null, $imageBanner = null)
    {
        $logoPath = null;
        $bannerPath = null;
        try {
            return DB::transaction(function () use ($id, $data, $imageLogo, $imageBanner, &$logoPath, &$bannerPath) {
                $produk = $this->produkRepo->findId($id);

                if (!$id) {
                    throw new \Exception("Produk dengan ID {$id} tidak ditemukan.");
                }

                if ($imageLogo) {
                    if ($produk->logo) {
                        Storage::disk('public')->delete($produk->logo);
                    }
                    $logo = UploadImage::upload($imageLogo, 'asset/produk');
                    $logoPath = $logo;
                    $data['logo'] = $logo;
                }

                if ($imageBanner) {
                    if ($produk->banner) {
                        Storage::disk('public')->delete($produk->banner);
                    }
                    $baner = UploadImage::upload($imageBanner, 'asset/produk');
                    $bannerPath = $baner;
                    $data['banner'] = $baner;
                }
                return $this->produkRepo->update($data, $produk->id);
            });
        } catch (\Exception $e) {
            if ($logoPath) {
                Storage::disk('public')->delete($logoPath);
            }
            if ($bannerPath) {
                Storage::disk('public')->delete($bannerPath);
            }
            throw $e;
        }
    }

    public function deleteProduk($id)
    {
        return DB::transaction(function () use ($id) {
            $produk = $this->produkRepo->findId($id);

            if (!$id) {
                throw new \Exception("Produk dengan ID {$id} tidak ditemukan.");
            }

            if ($produk->logo) {
                Storage::disk('public')->delete($produk->logo);
            }

            if ($produk->banner) {
                Storage::disk('public')->delete($produk->banner);
            }
            return $this->produkRepo->delete($produk->id);
        });
    }

    private function generateMmber($price, $members)
    {
        $list = [];
        foreach ($members as $value) {
            $finalPrice = $price;

            if ($value->markup_type === 'percent') {
                $finalPrice = $price + ($price * ($value->markup_value / 100));
            } else {
                $finalPrice = $price + $value->markup_value;
            }
            $list[$value->name] = (int) ceil($finalPrice);
        }

        return $list;
    }
}
