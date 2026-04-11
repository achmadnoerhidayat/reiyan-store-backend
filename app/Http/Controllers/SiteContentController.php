<?php

namespace App\Http\Controllers;

use App\Services\SiteContentService;
use Illuminate\Http\Request;

/**
 * @group Site Content
 *
 * API untuk mengelola Site Content
 */

class SiteContentController extends Controller
{

    /**
     * List Site Content
     * Endpoint ini digunakan untuk mengambil semua data Site Content.
     * Cocok digunakan di halaman Kebijakan Privasi.
     *
     * @queryParam id integer Mencari Site Content berdasarkan id.
     * @queryParam type string Mencari Site Content berdasarkan type.
     * @queryParam search string Mencari Site Content berdasarkan title.
     * @queryParam limit integer.
     *
     */
    public function index(Request $request, SiteContentService $service)
    {
        $content = null;
        if ($request->input('id')) {
            $content = $service->findId($request->input('id'));
        } else {
            $content = $service->getAll([
                'type' => $request->input('type'),
                'search' => $request->input('search'),
                'limit' => $request->input('limit', 25),
            ]);
        }

        return ResponseFormated::success($content, 'data site conten berhasil ditampilkan');
    }

    /**
     * Tambah Site Content
     *
     * Endpoint ini digunakan untuk menambahkan Site Content baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam type string required type (privacy_policy,terms_condition,contact_us).
     * @bodyParam title string required title.
     * @bodyParam content string required content.
     * @bodyParam is_active string required is_active.
     */

    public function store(Request $request, SiteContentService $service)
    {
        $data = $request->validate([
            'type' => ['required', 'in:privacy_policy,terms_condition,contact_us'],
            'title' => ['required', 'min:3', 'max:50'],
            'content' => ['required', 'min:5'],
            'is_active' => ['required', 'boolean']
        ]);

        try {
            $service->createSite($data);
            return ResponseFormated::success(null, 'data site conten berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Update Site Content
     *
     * Endpoint ini digunakan untuk mengedit Site Content baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam type string required type.
     * @bodyParam title string required title.
     * @bodyParam content string required content.
     * @bodyParam is_active string required is_active.
     */

    public function update(Request $request, SiteContentService $service, $id)
    {
        $data = $request->validate([
            'type' => ['required', 'in:privacy_policy,terms_condition,contact_us'],
            'title' => ['required', 'min:3', 'max:50'],
            'content' => ['required', 'min:5'],
            'is_active' => ['required', 'boolean']
        ]);

        try {
            $service->updateSite($data, $id);
            return ResponseFormated::success(null, 'data site conten berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * Delete Site Content
     *
     * Endpoint ini digunakan untuk menghapus Site Content baru ke dalam sistem.
     *
     * @authenticated
     *
     * @bodyParam type string required type.
     * @bodyParam title string required title.
     * @bodyParam content string required content.
     * @bodyParam is_active string required is_active.
     */

    public function delete(SiteContentService $service, $id)
    {
        try {
            $service->deleteSite($id);
            return ResponseFormated::success(null, 'data site conten berhasil dihapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }
}
