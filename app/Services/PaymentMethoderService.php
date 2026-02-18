<?php

namespace App\Services;

use App\Helper\UploadImage;
use App\Repositories\PaymentMethodeRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PaymentMethoderService
{

    protected $methodRepo;

    public function __construct(PaymentMethodeRepository $methodRepo)
    {
        $this->methodRepo = $methodRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return $this->methodRepo->getAll($data);
    }

    public function getAdmin($data)
    {
        return $this->methodRepo->getAdmin($data);
    }

    public function findId($id)
    {
        return $this->methodRepo->findId($id);
    }

    public function storeMethod($data, $image = null)
    {
        $imagePath = null;
        try {
            return DB::transaction(function () use ($data, $image, &$imagePath) {
                if ($image) {
                    $imagePath = UploadImage::upload($image, 'asset/pay-method');
                    $data['image_url'] = $imagePath;
                }
                return $this->methodRepo->store($data);
            });
        } catch (\Exception $e) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            throw $e;
        }
    }

    public function updateMethod($id, $data, $image = null)
    {
        $imagePath = null;
        try {
            return DB::transaction(function () use ($id, $data, $image, &$imagePath) {
                $method = $this->methodRepo->findId($id);
                if (!$method) {
                    throw new \Exception('data Payment Method tidak ditemukan');
                }
                if ($image) {
                    if ($method->image) {
                        Storage::disk('public')->delete($method->image);
                    }
                    $imagePath = UploadImage::upload($image, 'asset/pay-method');
                    $data['image_url'] = $imagePath;
                }
                return $this->methodRepo->update($data, $method->id);
            });
        } catch (\Exception $e) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            throw $e;
        }
    }

    public function deleteMethod($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $method = $this->methodRepo->findId($id);
                // Cek jika data tidak ditemukan
                if (!$method) {
                    // Kamu bisa return null atau lempar custom exception
                    throw new \Exception("Payment Method dengan ID {$id} tidak ditemukan.");
                }

                if ($method->image_url) {
                    Storage::disk('public')->delete($method->image_url);
                }

                return $this->methodRepo->delete($method->id);
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
