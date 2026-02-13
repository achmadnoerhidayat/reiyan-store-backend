<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;

/**
 * @group Social Media
 *
 * API untuk mengelola Social Media
 */
class SocialController extends Controller
{
    /**
     * List Social Media
     * Endpoint ini digunakan untuk mengambil semua data Social Media.
     * Cocok digunakan di halaman pembelian produk.
     *
     * @queryParam id integer Mencari Social Media berdasarkan id.
     * @queryParam search string Mencari Social Media berdasarkan nama. Example: Mobile
     * @queryParam is_active boolean Mencari Social Media berdasarkan status aktif. Example: 1
     *
     */

    public function index(Request $request, SocialService $service)
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
            return ResponseFormated::success($payment, 'data Social Media berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Social Media
     *
     * Endpoint ini digunakan untuk menambahkan Social Media baru ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam platform string required Platform (ex: Instagram). Example: Instagram
     * @bodyParam url string required Url Profil. Example: https://ig.com/profil
     * @bodyParam icon file required Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp).
     * @bodyParam is_active boolean required Status aktif (1 atau 0). Example: 1
     */

    public function store(Request $request, SocialService $service)
    {
        $data = $request->validate([
            'platform' => ['required', 'min:2'],
            'url' => ['required', 'url'],
            'icon' => ['required', 'image', 'mimes:png,jpg,jpeg,webp'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {
            $payment = $service->storeSocial($data, $request->file('icon'));

            return ResponseFormated::success($payment, 'data Social Media berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit Social Media
     *
     * Endpoint ini digunakan untuk mengubah Social Media web ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam platform string required Platform (ex: Instagram). Example: Instagram
     * @bodyParam url string required Url Profil. Example: https://ig.com/profil
     * @bodyParam icon file required Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp).
     * @bodyParam is_active boolean required Status aktif (1 atau 0). Example: 1
     */

    public function update(Request $request, SocialService $service, $id)
    {
        $data = $request->validate([
            'platform' => ['required', 'min:2'],
            'url' => ['required', 'url'],
            'icon' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {
            $payment = $service->updateSocial($data, $id, $request->file('icon'));
            return ResponseFormated::success($payment, 'data Social Media berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus Social Media
     *
     * Endpoint ini digunakan untuk menghapus Social Media produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(SocialService $service, $id)
    {
        try {
            $payment = $service->deleteSocial($id);
            return ResponseFormated::success($payment, 'data Social Media berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
