<?php

namespace App\Http\Controllers;

use App\Services\RatingService;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * @group Review
     * List Review User
     * Mengambil semua data Review milik user yang sedang login.
     * Bisa difilter berdasarkan ID Review untuk detail, atau produk_id.
     * @queryParam id int ID Review jika ingin mengambil detail satu data.
     * @queryParam produk_id string Cari berdasarkan ID Produk.
     * @queryParam status string Cari berdasarkan Status.
     * @queryParam limit int Jumlah data per halaman.
     * @authenticated
     */
    public function index(Request $request, RatingService $service)
    {
        $id = $request->input('id');
        $produk_id = $request->input('produk_id');
        $limit = $request->input('limit', 15);
        $rating = null;
        if ($id) {
            $rating = $service->findId($id);
        } else {
            $rating = $service->getAll([
                'produk_id' => $produk_id,
                'limit' => $limit,
            ]);
        }
        return ResponseFormated::success($rating, 'data Review berhasil ditampilkan');
    }

    /**
     * @group Review
     * List Review (Admin)
     * Mengambil semua data Review secara keseluruhan (Global) untuk dashboard admin.
     * @queryParam id int ID Review untuk detail admin.
     * @queryParam search string Cari berdasarkan Order ID.
     * @queryParam limit int Jumlah data per halaman.
     * @authenticated
     */

    public function indexAmin(Request $request, RatingService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $status = $request->input('status');
        $limit = $request->input('limit');
        $rating = null;
        if ($id) {
            $rating = $service->findId($id);
        } else {
            $rating = $service->getAdmin([
                'search' => $search,
                'status' => $status,
                'limit' => $limit,
            ]);
        }
        return ResponseFormated::success($rating, 'data Review berhasil ditampilkan');
    }

    /**
     * @group Review
     * Endpoint ini digunakan untuk membuat pesanan Topup Saldo.
     * dan mengembalikan URL pembayaran Snap Invoice Duitku.
     *
     * @authenticated
     *
     * @bodyParam transaksi_id int required ID Transaksi.
     * @bodyParam produk_id int required ID Produk.
     * @bodyParam comment string required comentar.
     * @bodyParam rating int rating.
     */

    public function store(Request $request, RatingService $service)
    {
        $data = $request->validate([
            'transaksi_id' => ['required', 'numeric', 'exists:transactions,id'],
            'produk_id' => ['required', 'numeric', 'exists:products,id'],
            'comment' => ['required', 'string'],
            'rating' => ['required', 'numeric', 'min:1', 'max:5'],
        ]);
        try {
            $service->createRating($data);
            return ResponseFormated::success(null, 'token pembayran berhasil dibuat');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * @group Review
     * Update Rating & Balasan
     * Endpoint ini digunakan oleh User untuk merevisi ulasan (maks 1x)
     * atau oleh Admin untuk membalas ulasan dan mengatur status publikasi.
     * @authenticated
     * @bodyParam rating int Skala 1-5 (Hanya untuk User).
     * @bodyParam comment string Isi ulasan (Hanya untuk User).
     * @bodyParam reply_message string Balasan admin (Hanya untuk Admin).
     * @bodyParam is_publish boolean Status tampil di frontend (Hanya untuk Admin).
     *
     */

    public function update(Request $request, RatingService $service, $id)
    {
        $user = $request->user();

        if (!in_array($user->role->name, ['administrator', 'super_admin'])) {
            $data = $request->validate([
                'comment' => ['required', 'string'],
                'rating' => ['required', 'numeric', 'min:1', 'max:5'],
            ]);
        } else {
            $data = $request->validate([
                'is_publish' => ['nullable', 'boolean'],
                'reply_message' => ['nullable', 'boolean'],
            ]);
        }
        try {
            $service->updateRating($data, $id);
            return ResponseFormated::success(null, 'rating berhasil diubah');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }
}
