<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @group Transaksi User
     * List Transaksi User
     * Mengambil semua data transaksi milik user yang sedang login.
     * Bisa difilter berdasarkan ID transaksi untuk detail, atau search order_id.
     * @queryParam id int ID transaksi jika ingin mengambil detail satu data. Example: 1
     * @queryParam search string Cari berdasarkan Order ID. Example: ORD-2024
     * @queryParam limit int Jumlah data per halaman. Default: 10. Example: 15
     * @authenticated
     */
    public function index(Request $request, TransactionService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $limit = $request->input('limit', 15);
        $transaksi = null;
        if ($id) {
            $transaksi = $service->findId($id);
        } else {
            $transaksi = $service->getAll([
                'search' => $search,
                'limit' => $limit,
            ]);
        }
        return ResponseFormated::success($transaksi, 'data transaksi berhasil ditampilkan');
    }

    /**
     * @group Transaksi Admin
     * List Transaksi (Admin)
     * Mengambil semua data transaksi secara keseluruhan (Global) untuk dashboard admin.
     * @queryParam id int ID transaksi untuk detail admin. Example: 1
     * @queryParam search string Cari berdasarkan Order ID. Example: ORD-2024
     * @queryParam limit int Jumlah data per halaman. Example: 20
     * @authenticated
     */

    public function indexAmin(Request $request, TransactionService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $limit = $request->input('limit');
        $transaksi = null;
        if ($id) {
            $transaksi = $service->findId($id);
        } else {
            $transaksi = $service->getAdmin([
                'search' => $search,
                'limit' => $limit,
            ]);
        }
        return ResponseFormated::success($transaksi, 'data transaksi berhasil ditampilkan');
    }

    /**
     * @group Transaksi Admin
     * Hapus Transaksi
     * Menghapus data transaksi berdasarkan ID.
     * @urlParam id required ID transaksi yang akan dihapus. Example: 1
     * @authenticated
     */
    public function delete(TransactionService $service, $id)
    {
        try {
            $service->deleteTrans($id);
            return ResponseFormated::success(null, 'data transaksi berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * @group Webhook / Callback
     * Callback Payment Gateway
     * Endpoint untuk menerima notifikasi status pembayaran dari Midtrans/Duitku.
     */
    public function callbackPayment(Request $request, TransactionService $service)
    {
        try {
            $callback = $service->callbackPayment($request);
            return ResponseFormated::success($callback, 'data callback berhasil diproses');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * @group Webhook / Callback
     * Callback Provider PPOB
     * Endpoint untuk menerima status pesanan dari Provider (VIP/IAK/Digiflazz).
     * Pastikan header X-Client-Signature dikirim untuk validasi.
     */
    public function callbackPpob(Request $request, TransactionService $service)
    {
        try {
            $callback = $service->callbackPpob($request);
            return ResponseFormated::success($callback, 'data callback berhasil diproses');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }
}
