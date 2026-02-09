<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Services\ProdukService;
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
     * @queryParam slug string Mencari Produk berdasarkan slug. Example:
     * @queryParam limit int Batasi jumlah data yang tampil. Example:
     *
     */

    public function index(Request $request, ProdukService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
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
}
