<?php

namespace App\Http\Controllers;

use App\Services\DepositService;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * @group Deposit User
     * List Deposit User
     * Mengambil semua data Deposit milik user yang sedang login.
     * Bisa difilter berdasarkan ID Deposit untuk detail, atau search order_id.
     * @queryParam id int ID Deposit jika ingin mengambil detail satu data.
     * @queryParam search string Cari berdasarkan Order ID.
     * @queryParam status string Cari berdasarkan Status.
     * @queryParam limit int Jumlah data per halaman.
     * @authenticated
     */
    public function index(Request $request, DepositService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $status = $request->input('status');
        $limit = $request->input('limit', 15);
        $deposit = null;
        if ($id) {
            $deposit = $service->findId($id);
        } else {
            $deposit = $service->getAll([
                'search' => $search,
                'status' => $status,
                'limit' => $limit,
            ]);
        }
        return ResponseFormated::success($deposit, 'data Deposit berhasil ditampilkan');
    }

    /**
     * @group Deposit Admin
     * List Deposit (Admin)
     * Mengambil semua data Deposit secara keseluruhan (Global) untuk dashboard admin.
     * @queryParam id int ID Deposit untuk detail admin.
     * @queryParam search string Cari berdasarkan Order ID.
     * @queryParam limit int Jumlah data per halaman.
     * @authenticated
     */

    public function indexAmin(Request $request, DepositService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $status = $request->input('status');
        $limit = $request->input('limit');
        $deposit = null;
        if ($id) {
            $deposit = $service->findId($id);
        } else {
            $deposit = $service->getAdmin([
                'search' => $search,
                'status' => $status,
                'limit' => $limit,
            ]);
        }
        return ResponseFormated::success($deposit, 'data Deposit berhasil ditampilkan');
    }

    /**
     * @group Deposit Admin
     * Hapus Deposit
     * Menghapus data Deposit berdasarkan ID.
     * @urlParam id required ID Deposit yang akan dihapus.
     * @authenticated
     */
    public function delete(DepositService $service, $id)
    {
        try {
            $service->deleteDeposit($id);
            return ResponseFormated::success(null, 'data Deposit berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * @group Webhook / Callback
     * Callback Payment Gateway
     * Endpoint untuk menerima notifikasi status pembayaran dari Midtrans/Duitku.
     */
    public function callbackPayment(Request $request, DepositService $service)
    {
        try {
            $callback = $service->callbackPayment($request);
            return ResponseFormated::success($callback, 'data callback berhasil diproses');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }
}
