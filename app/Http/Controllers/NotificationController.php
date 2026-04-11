<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * @group Notifikasi
     * List Notifikasi
     * Mengambil semua data Notifikasi milik user yang sedang login.
     * Bisa difilter berdasarkan ID Notifikasi untuk detail, atau search order_id.
     * @queryParam id int ID Notifikasi jika ingin mengambil detail satu data.
     * @queryParam search string Cari berdasarkan Order ID.
     * @queryParam status string Cari berdasarkan Status.
     * @queryParam limit int Jumlah data per halaman.
     * @authenticated
     */
    public function index(Request $request, NotificationService $service)
    {
        return ResponseFormated::success($service->getAll([
            'search' => $request->input('search'),
            'is_read' => $request->input('is_read'),
            'limit' => $request->input('limit', 15),
        ]), 'data notifikasi berhasil ditampilkan');
    }

    public function update(Request $request, NotificationService $service, $id)
    {
        $data = $request->validate([
            'is_read' => ['required', 'boolean']
        ]);

        try {
            return ResponseFormated::success($service->update($data, $id), 'data berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }
}
