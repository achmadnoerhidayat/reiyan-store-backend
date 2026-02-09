<?php

namespace App\Services;

use App\Repositories\KategoriRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KategoriService
{

    protected $kategoriRepo;

    public function __construct(KategoriRepository $kategoriRepo)
    {
        $this->kategoriRepo = $kategoriRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        return $this->kategoriRepo->getAll($data);
    }

    public function findId($id)
    {
        return $this->kategoriRepo->findId($id);
    }

    public function storeCategory($data, $file = null)
    {
        $uploadedPaths = null;
        try {
            return DB::transaction(function () use ($data, $file, &$uploadedPaths) {
                if ($file) {
                    $path = $file->store('asset/kategori', 'public');
                    $uploadedPaths = $path;
                    $data['image'] = $path;
                }
                $kategori = $this->kategoriRepo->store($data);
                return $kategori;
            });
        } catch (\Exception $e) {
            if ($uploadedPaths) {
                Storage::disk('public')->delete($uploadedPaths);
            }
            throw $e;
        }
    }

    public function updateCategory($id, $data, $file = null)
    {
        $uploadedPaths = null;
        try {
            return DB::transaction(function () use ($id, $data, $file, &$uploadedPaths) {
                $kategori = $this->kategoriRepo->findId($id);
                // Cek jika data tidak ditemukan
                if (!$kategori) {
                    // Kamu bisa return null atau lempar custom exception
                    throw new \Exception("Kategori dengan ID {$id} tidak ditemukan.");
                }

                if ($file) {
                    if ($kategori->image) {
                        Storage::disk('public')->delete($kategori->image);
                    }
                    $path = $file->store('asset/category', 'public');
                    $uploadedPaths = $path;
                    $data['image'] = $path;
                }

                $response = $this->kategoriRepo->update($data, $kategori->id);

                return $response;
            });
        } catch (\Exception $e) {
            if ($uploadedPaths) {
                Storage::disk('public')->delete($uploadedPaths);
            }
            throw $e;
        }
    }

    public function deleteCategory($id)
    {
        try {
            return DB::transaction(function () use ($id) {
                $kategori = $this->kategoriRepo->findId($id);
                // Cek jika data tidak ditemukan
                if (!$kategori) {
                    // Kamu bisa return null atau lempar custom exception
                    throw new \Exception("Kategori dengan ID {$id} tidak ditemukan.");
                }

                if ($kategori->image) {
                    Storage::disk('public')->delete($kategori->image);
                }

                $response = $this->kategoriRepo->delete($kategori->id);

                return $response;
            });
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
