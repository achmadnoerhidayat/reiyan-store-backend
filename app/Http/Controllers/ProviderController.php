<?php

namespace App\Http\Controllers;

use App\Services\ProviderService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @group Provider
 *
 * API untuk mengelola Provider Reiyan Store
 */
class ProviderController extends Controller
{
    /**
     * List provider
     * Endpoint ini digunakan untuk mengambil semua data provider yang aktif.
     * @authenticated
     * @queryParam search string Mencari provider berdasarkan nama. Example: Mobile
     * @queryParam limit int Batasi jumlah data yang tampil. Example: 10
     *
     */

    public function index(Request $request, ProviderService $service)
    {
        $search = $request->input('search');
        $id = $request->input('id');
        $limit = $request->input('limit', 25);

        try {
            $provider = null;
            if ($id) {
                $provider = $service->findId($id);
            } else {
                $provider = $service->getAll([
                    'search' => $search,
                    'limit' => $limit,
                ]);
            }
            return ResponseFormated::success($provider, 'data provider berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah provider
     *
     * Endpoint ini digunakan untuk menambahkan provider produk baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam name string required Nama provider. Example: Postpaid
     * @bodyParam driver string required Driver. Example: App\Services\MobilepulsaService
     * @bodyParam is_active string required Code Provider. Example:true
     * @bodyParam payload object nullable Data tambahan konfigurasi (API Key, Secret, dll)
     */

    public function store(Request $request, ProviderService $service)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
            'driver' => ['required'],
            'is_active' => ['required', 'boolean'],
            'payload' => ['required'],
            'payload.username' => ['required'],
            'payload.api_key' => ['required'],
            'payload.url' => ['required'],
        ]);

        try {
            $data['code'] = Str::slug($data['name']);
            $provider = $service->store($data);
            return ResponseFormated::success($provider, 'data provider berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit provider
     *
     * Endpoint ini digunakan untuk mengubah provider produk ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam name string required Nama provider. Example: Postpaid
     * @bodyParam driver string required Driver. Example: App\Services\MobilepulsaService
     * @bodyParam is_active string required Code Provider. Example:true
     * @bodyParam payload object nullable Data tambahan konfigurasi (API Key, Secret, dll)
     */

    public function update(Request $request, ProviderService $service, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
            'driver' => ['required'],
            'is_active' => ['required', 'boolean'],
            'payload' => ['nullable'],
        ]);

        try {
            $data['code'] = Str::slug($data['name']);
            $provider = $service->update($id, $data);
            return ResponseFormated::success($provider, 'data provider berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus provider
     *
     * Endpoint ini digunakan untuk menghapus provider produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(ProviderService $service, $id)
    {
        try {
            $provider = $service->delete($id);
            return ResponseFormated::success($provider, 'data provider berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
