<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Services\ProdukService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @group Produk
 *
 * API untuk mengelola Produk
 */
class ProdukController extends Controller
{
    /**
     * List Produk
     * Endpoint ini digunakan untuk mengambil semua data Produk yang aktif.
     * Cocok digunakan untuk menampilkan menu utama di homepage atau halaman produk.
     * @queryParam search string Mencari Produk berdasarkan nama. Example:
     * @queryParam kategori_id integer Mencari Produk berdasarkan katergori. Example:
     * @queryParam slug string Mencari Produk berdasarkan slug. Example:
     * @queryParam limit int Batasi jumlah data yang tampil. Example:
     *
     */

    public function index(Request $request, ProdukService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $kategori_id = $request->input('kategori_id');
        $slug = $request->input('slug');
        $limit = $request->input('limit', 15);

        try {
            $produk = null;
            if ($id) {
                $produk = $service->findId($id);
            } else if ($slug) {
                $produk = $service->findSlug($slug);
            } else {
                $produk = $service->getAll([
                    'search' => $search,
                    'kategori_id' => $kategori_id,
                    'limit' => $limit,
                ]);
            }

            return ResponseFormated::success($produk, 'data produk berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Show Daftar Harga
     * Endpoint ini digunakan untuk mengambil data Produk yang aktif berdasarkan slug.
     * Cocok digunakan untuk menampilkan menu utama di homepage atau halaman produk.
     */

    public function show(ProdukService $service, $slug)
    {
        try {
            $response = $service->getSlug($slug);
            return ResponseFormated::success($response, 'daftar harga berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * List Daftar Harga
     * Endpoint ini digunakan untuk mengambil semua data Harga Dari Provider yang aktif.
     * @authenticated
     */

    public function priceList(ProdukService $service, $slug)
    {
        try {
            $response = $service->priceList($slug);
            return ResponseFormated::success($response, 'daftar harga berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * Tambah Produk
     *
     * Endpoint ini digunakan untuk menambahkan produk baru ke dalam sistem Reiyan Store.
     * Pastikan upload menggunakan format multipart/form-data karena menyertakan file image.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam categori_id int required ID Kategori dari tabel categories. Example: 1
     * @bodyParam provider_id int required ID Provider dari tabel providers. Example: 1
     * @bodyParam name string required Nama Produk. Example: Mobile Legends
     * @bodyParam code string required Kode unik produk untuk sistem. Example: Mobile Legend
     * @bodyParam brand string required brand produk untuk sistem. Example: Monton
     * @bodyParam logo file required Foto logo produk (PNG/JPG/WEBP, max 2MB).
     * @bodyParam banner file required Foto banner produk (PNG/JPG/WEBP, max 2MB).
     * @bodyParam is_check_id boolean required msaukuan id game. Example: true
     * @bodyParam is_check_server boolean required msaukuan server game. Example: true
     * @bodyParam is_check_name boolean required msaukuan name pengguna. Example: false
     * @bodyParam faq array nullable Daftar pertanyaan dan jawaban.
     * @bodyParam faq object[] required Daftar FAQ.
     * @bodyParam faq[].question string required Pertanyaan FAQ. Example: Bagaimana cara topup?
     * @bodyParam faq[].answer string required Jawaban FAQ. Example: Masukkan ID dan pilih nominal.
     * @response 201 {
     * "status": "success",
     * "message": "produk berhasil ditambahkan",
     * "data": { "id": 1, "name": "Mobile Legends", ... }
     * }
     */

    public function store(StoreProdukRequest $request, ProdukService $service)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);
            $produk = $service->createProduk($data, $request->file('logo'), $request->file('banner'));
            return ResponseFormated::success($produk, 'data produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Update Produk
     *
     * Endpoint ini digunakan untuk mengubah produk ke dalam sistem Reiyan Store.
     * Pastikan upload menggunakan format multipart/form-data karena menyertakan file image.
     *
     * @authenticated
     * @header Content-Type multipart/form-data
     *
     * @bodyParam categori_id int required ID Kategori dari tabel categories. Example: 1
     * @bodyParam provider_id int required ID Provider dari tabel providers. Example: 1
     * @bodyParam name string required Nama Produk. Example: Mobile Legends
     * @bodyParam code string required Kode unik produk untuk sistem. Example: hmobilelegend
     * @bodyParam brand string required brand produk untuk sistem. Example: Monton
     * @bodyParam logo file required Foto logo produk (PNG/JPG/WEBP, max 2MB).
     * @bodyParam banner file required Foto banner produk (PNG/JPG/WEBP, max 2MB).
     * @bodyParam is_check_id boolean required msaukuan id game. Example: true
     * @bodyParam is_check_server boolean required msaukuan server game. Example: true
     * @bodyParam is_check_name boolean required msaukuan name pengguna. Example: false
     * @bodyParam faq object[] required Daftar FAQ.
     * @bodyParam faq[].id string required id.
     * @bodyParam faq[].question string required Pertanyaan.
     * @bodyParam faq[].answer string required Jawaban.
     * * @response 201 {
     * "status": "success",
     * "message": "produk berhasil diupdate",
     * "data": { "id": 1, "name": "Mobile Legends", ... }
     * }
     */

    public function update(UpdateProdukRequest $request, ProdukService $service, $id)
    {
        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);
            $produk = $service->updateProduk($id, $data, $request->file('logo'), $request->file('banner'));
            return ResponseFormated::success($produk, 'data produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Hapus Produk
     *
     * Endpoint ini digunakan untuk menghapus Produk ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(ProdukService $service, $id)
    {
        try {
            $produk = $service->deleteProduk($id);
            return ResponseFormated::success($produk, 'data produk berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Update Harga Produk
     *
     * Endpoint ini digunakan untuk mengupdate harga provider dan harga member (Gold, Silver, Bronze).
     * @authenticated
     *
     * @bodyParam code string Required. code produk. Example: FFMAX80-S888
     * @bodyParam price_provider numeric Required. Harga beli dari provider. Example: 15000
     * @bodyParam is_publish boolean Required. Status publikasi produk (true/false). Example: true
     * @bodyParam member_price object Required. Data harga untuk tiap level member.
     * @bodyParam member_price.gold numeric Required. Harga untuk member level Gold. Example: 16500
     * @bodyParam member_price.silver numeric Required. Harga untuk member level Silver. Example: 17000
     * @bodyParam member_price.bronze numeric Required. Harga untuk member level Bronze. Example: 17500
     */

    public function updateLayanan(Request $request, ProdukService $service, $id)
    {
        $data = $request->validate([
            'code' => ['required', 'string'],
            'price_provider' => ['required', 'numeric'],
            'is_publish' => ['required', 'boolean'],
            'member_price' => ['required'],
            'member_price.gold' => ['required', 'numeric'],
            'member_price.bronze' => ['required', 'numeric'],
            'member_price.silver' => ['required', 'numeric'],
        ]);

        try {
            $service->updateLayanan($id, $data);
            return ResponseFormated::success(null, 'data layanan berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Cek Validasi ID Game
     * Endpoint ini digunakan untuk memvalidasi user ID dan server ID sebelum melakukan transaksi.
     * Aturan validasi (required/nullable) akan berubah secara dinamis tergantung pada pengaturan produk:
     * - Jika `is_check_id` aktif, maka `user_id` wajib diisi.
     * - Jika `is_check_server` aktif, maka `server_id` wajib diisi.
     *
     * @urlParam id string Required ID Produk yang ingin dicek. Example: 1
     * @bodyParam user_id numeric ID User dari game. Required jika produk membutuhkan validasi ID. Example: 12345678
     * @bodyParam server_id string ID Server dari game. Required jika produk membutuhkan validasi Server. Example: 8821
     */

    public function getNickname(Request $request, ProdukService $service, $id)
    {
        $produk = $service->findId($id);
        $user_id = "nullable";
        $server_id = "nullable";
        if ($produk && $produk->is_check_id) {
            $user_id = "required";
        }

        if ($produk && $produk->is_check_server) {
            $server_id = "required";
        }

        $data = $request->validate([
            'user_id' => [$user_id, 'numeric'],
            'server_id' => [$server_id, 'string'],
        ]);
        try {
            $trans = $service->checkNikname($id, $data);
            return ResponseFormated::success($trans, 'check username berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Checkout Top Up
     * Endpoint ini digunakan untuk membuat pesanan top up (Game, Pulsa, E-Wallet).
     * Sistem akan memvalidasi stok produk, menghitung harga (termasuk diskon voucher),
     * dan mengembalikan URL pembayaran Snap Invoice Duitku.
     *
     * @authenticated
     *
     * @bodyParam service_id int required ID dari layanan yang dipilih (contoh: Pulsa, Game, dll). Example: 1
     * @bodyParam produk_id int required ID produk yang ingin dibeli. Example: 45
     * @bodyParam payment_id int required ID metode pembayaran (Midtrans, Duitku, dll). Example: 2
     * @bodyParam voucher_id int ID voucher jika tersedia. Example: 5
     * @bodyParam target No ID Game / No HP.
     * @bodyParam server_id No Server.
     * @bodyParam nick_name Nickname Game.
     */

    public function payment(Request $request, TransactionService $service)
    {
        $data = $request->validate([
            'service_id' => ['required', 'numeric', 'exists:services,id'],
            'produk_id' => ['required', 'numeric', 'exists:products,id'],
            'payment_id' => ['required', 'numeric', 'exists:payment_methods,id'],
            'voucher_id' => ['nullable', 'numeric', 'exists:vouchers,id'],
            'target'    => ['required', 'numeric'],
            'server_id' => ['nullable', 'numeric'],
            'nick_name' => ['required', 'string'],
        ]);

        try {
            $trans = $service->storeTrans($data);
            return ResponseFormated::success($trans, 'token pembayran berhasil dibuat');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }
}
