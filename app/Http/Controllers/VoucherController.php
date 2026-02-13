<?php

namespace App\Http\Controllers;

use App\Services\VoucherService;
use Illuminate\Http\Request;

/**
 * @group Voucher
 *
 * API untuk mengelola Voucher
 */
class VoucherController extends Controller
{
    /**
     * List Voucher
     * Endpoint ini digunakan untuk mengambil semua data Voucher.
     * Cocok digunakan di halaman pembelian produk.
     * @authenticated
     *
     * @queryParam id integer Mencari Voucher berdasarkan id.
     * @queryParam search string Mencari Voucher berdasarkan nama. Example: Mobile
     * @queryParam start_at date Mencari Voucher berdasarkan Tanggal Dimulai. Example: 2026-02-25
     * @queryParam end_at date Mencari Voucher berdasarkan Tanggal Berakhir. Example: 2026-03-25
     * @queryParam type enum Mencari Voucher berdasarkan Type ('percent', 'flat'). Example: percent
     *
     */

    public function index(Request $request, VoucherService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $start_at = $request->input('start_at');
        $end_at = $request->input('end_at');
        $type = $request->input('type');

        try {
            $voucher = null;
            if ($id) {
                $voucher = $service->findId($id);
            } else {
                $voucher = $service->getAll([
                    'search' => $search,
                    'start_at' => $start_at,
                    'end_at' => $end_at,
                    'type' => $type,
                ]);
            }
            return ResponseFormated::success($voucher, 'data Voucher berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Tambah Voucher
     *
     * Endpoint ini digunakan untuk menambahkan Voucher baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam produk_id int required ID dari tabel products. Example: 1
     * @bodyParam code string required Kode unik voucher (max 255 karakter). Example: DISKONMERDEKA
     * @bodyParam type string required Tipe potongan harga. Must be one of: percent, flat. Example: percent
     * @bodyParam value number required Nilai potongan (persentase atau nominal rupiah). Example: 10
     * @bodyParam quota int required Jumlah total voucher yang tersedia. Example: 100
     * @bodyParam min_order number required Minimal belanja untuk bisa menggunakan voucher ini. Example: 50000
     * @bodyParam start_at date required Tanggal mulai berlakunya voucher (YYYY-MM-DD). Example: 2026-08-01
     * @bodyParam end_at date required Tanggal berakhirnya voucher (YYYY-MM-DD). Example: 2026-08-17
     * @bodyParam is_active boolean required Status keaktifan voucher. Example: true
     */

    public function store(Request $request, VoucherService $service)
    {
        $data = $request->validate([
            'produk_id' => ['required', 'exists:products,id'],
            'code' => ['required', 'unique:vouchers,code'],
            'type' => ['required', 'in:percent,flat'],
            'value' => ['required', 'numeric'],
            'quota' => ['required', 'numeric'],
            'min_order' => ['required', 'numeric'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {
            $voucher = $service->storeVoucher($data);

            return ResponseFormated::success($voucher, 'data Voucher berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Cek Ketersedian Voucher
     *
     * Endpoint ini digunakan untuk Mengecek Ketersedian Voucher.
     *
     * @authenticated
     *
     * @bodyParam produk_id int required ID dari tabel products. Example: 1
     */
    public function findValidVoucher(Request $request, VoucherService $service, $code)
    {
        $data = $request->validate([
            'produk_id' => ['required', 'numeric', 'exists:products,id']
        ]);
        $data['code'] = $code;
        $data['user_id'] = $request->user()->id;
        $voucher = $service->findValidVoucher($data);
        if (!$voucher) {
            return ResponseFormated::error(null, 'data voucher tidak tersedia', 403);
        }
        return ResponseFormated::success($voucher, 'data voucher tersedia silahkan lanjut kepembayaran');
    }

    /**
     * Edit Voucher
     *
     * Endpoint ini digunakan untuk mengubah Voucher ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam produk_id int required ID dari tabel products. Example: 1
     * @bodyParam code string required Kode unik voucher (max 255 karakter). Example: DISKONMERDEKA
     * @bodyParam type string required Tipe potongan harga. Must be one of: percent, flat. Example: percent
     * @bodyParam value number required Nilai potongan (persentase atau nominal rupiah). Example: 10
     * @bodyParam quota int required Jumlah total voucher yang tersedia. Example: 100
     * @bodyParam min_order number required Minimal belanja untuk bisa menggunakan voucher ini. Example: 50000
     * @bodyParam start_at date required Tanggal mulai berlakunya voucher (YYYY-MM-DD). Example: 2026-08-01
     * @bodyParam end_at date required Tanggal berakhirnya voucher (YYYY-MM-DD). Example: 2026-08-17
     * @bodyParam is_active boolean required Status keaktifan voucher. Example: true
     */

    public function update(Request $request, VoucherService $service, $id)
    {
        $data = $request->validate([
            'produk_id' => ['required', 'exists:products,id'],
            'code' => ['required', 'unique:vouchers,code'],
            'type' => ['required', 'in:percent,flat'],
            'value' => ['required', 'numeric'],
            'quota' => ['required', 'numeric'],
            'min_order' => ['required', 'numeric'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date'],
            'is_active' => ['required', 'boolean'],
        ]);

        try {
            $voucher = $service->updateVoucher($id, $data);
            return ResponseFormated::success($voucher, 'data Voucher berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Hapus Voucher
     *
     * Endpoint ini digunakan untuk menghapus Voucher ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(VoucherService $service, $id)
    {
        try {
            $voucher = $service->deleteVoucher($id);
            return ResponseFormated::success($voucher, 'data Voucher berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
