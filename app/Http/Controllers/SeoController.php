<?php

namespace App\Http\Controllers;

use App\Services\SeoService;
use Illuminate\Http\Request;

/**
 * @group Seo Meta Tags
 *
 * API untuk mengelola Seo Meta Tags
 */
class SeoController extends Controller
{
    /**
     * List Seo Meta Tags
     * Endpoint ini digunakan untuk mengambil semua data Seo Meta Tags.
     * Cocok digunakan di halaman pembelian produk.
     * @authenticated
     *
     * @queryParam id integer Mencari Seo Meta Tags berdasarkan id.
     * @queryParam search string Mencari Seo Meta Tags berdasarkan nama. Example: Mobile
     * @queryParam is_active boolean Mencari Seo Meta Tags berdasarkan status aktif. Example: 1
     *
     */

    public function index(Request $request, SeoService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');

        try {
            $payment = null;
            if ($id) {
                $payment = $service->findId($id);
            } else {
                $payment = $service->getAll($search);
            }
            return ResponseFormated::success($payment, 'data Seo Meta Tags berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Seo Meta Tags
     *
     * Endpoint ini digunakan untuk menambahkan Seo Meta Tags baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam meta_key string required Meta Key (ex: og:description). Example: og:description
     * @bodyParam meta_value string required Meta Value. Example: Topup Game Terpercaya
     */

    public function store(Request $request, SeoService $service)
    {
        $data = $request->validate([
            'meta_key' => ['required', 'min:2'],
            'meta_value' => ['required', 'string'],
        ]);

        try {
            $payment = $service->storeSeo($data);

            return ResponseFormated::success($payment, 'data Seo Meta Tags berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit Seo Meta Tags
     *
     * Endpoint ini digunakan untuk mengubah Seo Meta Tags web ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam meta_key string required Meta Key (ex: og:description). Example: og:description
     * @bodyParam meta_value string required Meta Value. Example: Topup Game Terpercaya
     */

    public function update(Request $request, SeoService $service, $id)
    {
        $data = $request->validate([
            'meta_key' => ['required', 'min:2'],
            'meta_value' => ['required', 'string'],
        ]);

        try {
            $payment = $service->updateSeo($id, $data);
            return ResponseFormated::success($payment, 'data Seo Meta Tags berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus Seo Meta Tags
     *
     * Endpoint ini digunakan untuk menghapus Seo Meta Tags produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(SeoService $service, $id)
    {
        try {
            $payment = $service->deleteSeo($id);
            return ResponseFormated::success($payment, 'data Seo Meta Tags berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
