<?php

namespace App\Http\Controllers;

use App\Services\ConfigurationService;
use Illuminate\Http\Request;

/**
 * @group Config Website
 *
 * API untuk mengelola Config Website
 */
class ConfigController extends Controller
{
    /**
     * List Setting Website
     * Endpoint ini digunakan untuk mengambil semua data config yang aktif.
     * Cocok digunakan di halaman admin.
     * @queryParam id string Mencari config berdasarkan id.
     *
     */

    public function index(Request $request, ConfigurationService $service)
    {
        $id = $request->input('id');

        try {
            $config = null;
            if ($id) {
                $config = $service->findId($id);
            } else {
                $config = $service->first();
            }
            return ResponseFormated::success($config, 'data config berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Setting Website
     *
     * Endpoint ini digunakan untuk menambahkan config web baru ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam title string required Title config. Example: Reiyan Store
     * @bodyParam short_title string required Short Title config. Example: Termurah & Terpercaya
     * @bodyParam deskripsi string required Deskripsi config. Example: Website Topup Game Termurah & Terpercaya
     * @bodyParam favicon file required Foto favicon config (PNG/JPG, max 2MB).
     * @bodyParam logo file required Foto logo config (PNG/JPG, max 2MB).
     */

    public function store(Request $request, ConfigurationService $service)
    {
        $data = $request->validate([
            'title' => ['required', 'min:2'],
            'short_title' => ['required', 'min:2'],
            'favicon' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'logo' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'deskripsi' => ['required', 'min:2'],
        ]);

        try {
            $config = $service->storeConfig($data, $request->file('favicon'), $request->file('logo'));
            return ResponseFormated::success($config, 'data config berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit config
     *
     * Endpoint ini digunakan untuk mengubah config web ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam title string required Title config. Example: Reiyan Store
     * @bodyParam short_title string required Short Title config. Example: Termurah & Terpercaya
     * @bodyParam deskripsi string required Deskripsi config. Example: Website Topup Game Termurah & Terpercaya
     * @bodyParam favicon file nullable Foto favicon config (PNG/JPG, max 2MB).
     * @bodyParam logo file nullable Foto logo config (PNG/JPG, max 2MB).
     */

    public function update(Request $request, ConfigurationService $service, $id)
    {
        $data = $request->validate([
            'title' => ['required', 'min:2'],
            'short_title' => ['required', 'min:2'],
            'favicon' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'logo' => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'deskripsi' => ['required', 'min:2'],
        ]);

        try {
            $config = $service->updateConfig($id, $data, $request->file('favicon'), $request->file('logo'));
            return ResponseFormated::success($config, 'data config berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus config Web
     *
     * Endpoint ini digunakan untuk menghapus config produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(ConfigurationService $service, $id)
    {
        try {
            $config = $service->deleteConf($id);
            return ResponseFormated::success($config, 'data config berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
