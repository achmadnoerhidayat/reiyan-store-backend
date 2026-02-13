<?php

namespace App\Http\Controllers;

use App\Services\PaymentMethoderService;
use Illuminate\Http\Request;

/**
 * @group Payment Method
 *
 * API untuk mengelola Payment Method
 */
class PaymentMethodController extends Controller
{
    /**
     * List Payment Method
     * Endpoint ini digunakan untuk mengambil semua data Payment Method.
     * Cocok digunakan di halaman pembelian produk.
     * @authenticated
     *
     * @queryParam id integer Mencari Payment Method berdasarkan id.
     * @queryParam search string Mencari Payment Method berdasarkan nama. Example: Mobile
     * @queryParam is_active boolean Mencari Payment Method berdasarkan status aktif. Example: 1
     *
     */

    public function index(Request $request, PaymentMethoderService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $is_active = $request->input('is_active', 1);

        try {
            $payment = null;
            if ($id) {
                $payment = $service->findId($id);
            } else {
                $payment = $service->getAll([
                    'search' => $search,
                    'is_active' => $is_active,
                ]);
            }
            return ResponseFormated::success($payment, 'data Payment Method berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Payment Method
     *
     * Endpoint ini digunakan untuk menambahkan Payment Method baru ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam name string required Nama payment gateway (ex: Mandiri, Dana). Example: Dana Transfer
     * @bodyParam category string required category Category gateway (Contoh: E-Wallet, VA, Retail). Example: E-Wallet
     * @bodyParam code string required Kode unik gateway. Example: DANA_TF
     * @bodyParam gateway string required Tipe vendor gateway (Midtrans/Duitku). Example: duitku
     * @bodyParam fee numeric required Biaya admin dalam angka. Example: 1500
     * @bodyParam is_active boolean required Status aktif (1 atau 0). Example: 1
     * @bodyParam image file required Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp).
     */

    public function store(Request $request, PaymentMethoderService $service)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
            'category' => ['required', 'min:2'],
            'code' => ['required', 'string'],
            'gateway' => ['required', 'string'],
            'fee' => ['required', 'numeric'],
            'is_active' => ['required', 'boolean'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        try {
            $payment = $service->storeMethod($data, $request->file('image'));

            return ResponseFormated::success($payment, 'data Payment Method berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit Payment Method
     *
     * Endpoint ini digunakan untuk mengubah Payment Method web ke dalam sistem.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam name string required Nama payment gateway (ex: Mandiri, Dana). Example: Dana Transfer
     * @bodyParam code string required Kode unik gateway. Example: DANA_TF
     * @bodyParam gateway string required Tipe vendor gateway (Midtrans/Duitku). Example: duitku
     * @bodyParam fee numeric required Biaya admin dalam angka. Example: 1500
     * @bodyParam is_active boolean required Status aktif (1 atau 0). Example: 1
     * @bodyParam image file required Logo gateway (Max: 2MB, Format: png,jpg,jpeg,webp).
     */

    public function update(Request $request, PaymentMethoderService $service, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2'],
            'code' => ['required', 'string'],
            'gateway' => ['required', 'string'],
            'fee' => ['required', 'numeric'],
            'is_active' => ['required', 'boolean'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        try {
            $payment = $service->updateMethod($id, $data, $request->file('image'));
            return ResponseFormated::success($payment, 'data Payment Method berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus Payment Method
     *
     * Endpoint ini digunakan untuk menghapus Payment Method produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(PaymentMethoderService $service, $id)
    {
        try {
            $payment = $service->deleteMethod($id);
            return ResponseFormated::success($payment, 'data Payment Method berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
