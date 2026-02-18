<?php

namespace App\Http\Controllers;

use App\Services\KategoriService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @group Kategori
 *
 * API untuk mengelola Kategori
 */
class KategoriController extends Controller
{
    /**
     * List Kategori
     * Endpoint ini digunakan untuk mengambil semua data kategori yang aktif.
     * Cocok digunakan untuk menampilkan menu utama di homepage atau halaman produk.
     * @queryParam search string Mencari kategori berdasarkan nama. Example: Mobile
     * @queryParam limit int Batasi jumlah data yang tampil. Example: 10
     *
     */

    public function index(Request $request, KategoriService $service)
    {
        $search = $request->input('search');
        $id = $request->input('id');
        $limit = $request->input('limit', 25);

        try {
            $kategori = null;
            if ($id) {
                $kategori = $service->findId($id);
            } else {
                $kategori = $service->getAll([
                    'search' => $search,
                    'limit' => $limit,
                ]);
            }
            return ResponseFormated::success($kategori, 'data kategori berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Kategori
     *
     * Endpoint ini digunakan untuk menambahkan kategori produk baru ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam name string required Nama kategori. Example: Game Top Up
     * @bodyParam image file nullable Foto logo kategori (PNG/JPG, max 2MB).
     */

    public function store(Request $request, KategoriService $service)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'position' => ['required', 'numeric'],
        ]);

        try {
            $data['slug'] = Str::slug($data['name']);
            $kategori = $service->storeCategory($data, $request->file('image'));

            return ResponseFormated::success($kategori, 'data kategori berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit Kategori
     *
     * Endpoint ini digunakan untuk mengubah kategori produk ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam name string required Nama kategori. Example: Game Top Up
     * @bodyParam image file nullable Foto logo kategori (PNG/JPG, max 2MB).
     */

    public function update(Request $request, KategoriService $service, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'position' => ['required', 'numeric'],
        ]);

        try {
            $data['slug'] = Str::slug($data['name']);
            $kategori = $service->updateCategory($id, $data, $request->file('image'));

            return ResponseFormated::success($kategori, 'data kategori berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus Kategori
     *
     * Endpoint ini digunakan untuk menghapus kategori produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(KategoriService $service, $id)
    {
        try {
            $kategori = $service->deleteCategory($id);
            return ResponseFormated::success($kategori, 'data kategori berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
