<?php

namespace App\Http\Controllers;

use App\Services\ContactUsService;
use Illuminate\Http\Request;

/**
 * @group Contact Us
 *
 * API untuk mengelola Contact Us
 */

class ContactUsController extends Controller
{
    /**
     * List Contact Us
     * Endpoint ini digunakan untuk mengambil semua data Contact Us.
     * Cocok digunakan di halaman Kebijakan Privasi.
     *
     * @queryParam id integer Mencari Contact Us berdasarkan id.
     * @queryParam status string Mencari Contact Us berdasarkan status.
     * @queryParam search string Mencari Contact Us berdasarkan title.
     * @queryParam limit integer.
     *
     */
    public function index(Request $request, ContactUsService $service)
    {
        $content = null;
        if ($request->input('id')) {
            $content = $service->findId($request->input('id'));
        } else {
            $content = $service->getAll([
                'status' => $request->input('status'),
                'search' => $request->input('search'),
                'limit' => $request->input('limit', 25),
            ]);
        }

        return ResponseFormated::success($content, 'data Contact Us berhasil ditampilkan');
    }

    /**
     * Tambah Contact Us
     *
     * Endpoint ini digunakan untuk menambahkan Contact Us baru ke dalam sistem.
     *
     * @bodyParam order_id string required order_id.
     * @bodyParam kategori string required kategori (Masalah Transaksi,Tanya Admin,Salah Tulis Nominal/TF Dibulatkan).
     * @bodyParam name string required name.
     * @bodyParam phone string required phone.
     * @bodyParam deskripsi string required deskripsi.
     */

    public function store(Request $request, ContactUsService $service)
    {
        $data = $request->validate([
            'token' => ['required', 'string'],
            'order_id' => ['required_if:kategori,Masalah Transaksi'],
            'kategori' => ['required', 'min:3', 'in:Masalah Transaksi,Tanya Admin,Salah Tulis Nominal/TF Dibulatkan'],
            'name' => ['required', 'min:5'],
            'phone' => ['required', 'min:11'],
            'deskripsi' => ['required', 'min:11'],
        ]);

        try {
            $service->createContact($data);
            return ResponseFormated::success(null, 'data Contact Us berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Update Contact Us
     *
     * Endpoint ini digunakan untuk mengedit Contact Us baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam order_id string required order_id.
     * @bodyParam kategori string required kategori (Masalah Transaksi,Tanya Admin,Salah Tulis Nominal/TF Dibulatkan).
     * @bodyParam name string required name.
     * @bodyParam phone string required phone.
     * @bodyParam deskripsi string required deskripsi.
     */

    public function update(Request $request, ContactUsService $service, $id)
    {
        $data = $request->validate([
            'order_id' => ['required_if:kategori,Masalah Transaksi'],
            'kategori' => ['required', 'min:3', 'in:Masalah Transaksi,Tanya Admin,Salah Tulis Nominal/TF Dibulatkan'],
            'name' => ['required', 'min:5'],
            'phone' => ['required', 'min:11'],
            'deskripsi' => ['required', 'min:11'],
        ]);

        try {
            $service->updateContact($data, $id);
            return ResponseFormated::success(null, 'data Contact Us berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Delete Contact Us
     *
     * Endpoint ini digunakan untuk menghapus Contact Us baru ke dalam sistem.
     *
     * @authenticated
     */

    public function delete(ContactUsService $service, $id)
    {
        try {
            $service->deleteContact($id);
            return ResponseFormated::success(null, 'data Contact Us berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }
}
