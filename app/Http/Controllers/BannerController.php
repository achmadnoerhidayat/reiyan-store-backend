<?php

namespace App\Http\Controllers;

use App\Services\BannerService;
use Illuminate\Http\Request;

/**
 * @group Banner
 *
 * API untuk mengelola Banner
 */
class BannerController extends Controller
{
    /**
     * List Banner
     * Endpoint ini digunakan untuk mengambil semua data banner.
     * Cocok digunakan di halaman admin.
     * @queryParam search string Mencari banner berdasarkan nama. Example: Mobile
     * @queryParam starts_at date Mencari banner berdasarkan tanggal dimulai. Example: 2026-02-15
     * @queryParam ends_at date Mencari banner berdasarkan tanggal berakhir. Example: 2026-02-30
     * @queryParam is_active boolean Mencari banner berdasarkan status aktif. Example: 1
     * @queryParam limit int Batasi jumlah data yang tampil. Example: 10
     *
     */

    public function index(Request $request, BannerService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $starts_at = $request->input('starts_at');
        $ends_at = $request->input('ends_at');
        $is_active = $request->input('is_active', 1);

        try {
            $banner = null;
            if ($id) {
                $banner = $service->findId($id);
            } else {
                $banner = $service->getAll([
                    'search' => $search,
                    'starts_at' => $starts_at,
                    'ends_at' => $ends_at,
                    'is_active' => $is_active,
                ]);
            }
            return ResponseFormated::success($banner, 'data banner berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Banner
     *
     * Endpoint ini digunakan untuk menambahkan Banner baru ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam title string required Title banner. Example: Reiyan Store
     * @bodyParam image file required Gambar banner. Must be an image (png, jpg, jpeg, webp), max 2048KB.
     * @bodyParam link_url string required URL tujuan saat banner diklik. Example: https://reiyanstore.com/promo/ramadhan
     * @bodyParam starts_at date required Tanggal mulai publikasi banner (ISO Format). Example: 2026-03-01
     * @bodyParam end_at date required Tanggal berakhir publikasi. Harus setelah tanggal mulai. Example: 2026-03-31
     * @bodyParam is_active boolean required Status aktif banner (1 untuk aktif, 0 untuk draft). Example: 1
     */

    public function store(Request $request, BannerService $service)
    {
        $request->merge([
            'is_active' => $request->boolean('is_active')
        ]);
        $data = $request->validate([
            'title' => ['required', 'min:2'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'link_url' => ['required', 'url'],
            'starts_at' => ['required', 'date'],
            'end_at' => ['required', 'date', 'after:starts_at'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {
            $banner = $service->storeBanner($data, $request->file('image'));
            return ResponseFormated::success($banner, 'data banner berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit banner
     *
     * Endpoint ini digunakan untuk mengubah banner web ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam title string required Title banner. Example: Reiyan Store
     * @bodyParam image file required Gambar banner. Must be an image (png, jpg, jpeg, webp), max 2048KB.
     * @bodyParam link_url string required URL tujuan saat banner diklik. Example: https://reiyanstore.com/promo/ramadhan
     * @bodyParam starts_at date required Tanggal mulai publikasi banner (ISO Format). Example: 2026-03-01
     * @bodyParam end_at date required Tanggal berakhir publikasi. Harus setelah tanggal mulai. Example: 2026-03-31
     * @bodyParam is_active boolean required Status aktif banner (1 untuk aktif, 0 untuk draft). Example: 1
     */

    public function update(Request $request, BannerService $service, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:2'],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048', 'dimensions:min_width=1000,min_height=300'],
            'link_url' => ['required', 'url'],
            'starts_at' => ['required', 'date'],
            'end_at' => ['required', 'date', 'after:starts_at'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {
            $banner = $service->updateBanner($id, $data, $request->file('image'));
            return ResponseFormated::success($banner, 'data banner berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus banner Web
     *
     * Endpoint ini digunakan untuk menghapus banner produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(BannerService $service, $id)
    {
        try {
            $banner = $service->deleteBanner($id);
            return ResponseFormated::success($banner, 'data banner berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
