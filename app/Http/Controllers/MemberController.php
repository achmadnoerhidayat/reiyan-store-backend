<?php

namespace App\Http\Controllers;

use App\Services\MemberService;
use Illuminate\Http\Request;

/**
 * @group Member Level
 *
 * API untuk mengelola User / Pengguna
 */
class MemberController extends Controller
{
    /**
     * List User
     * Endpoint ini digunakan untuk mengambil semua data User.
     * @queryParam search string Mencari user berdasarkan nama.
     * @authenticated
     */
    public function index(Request $request, MemberService $service)
    {
        $search = $request->input('search');
        $member = $service->getAll([
            'search' => $search
        ]);

        return ResponseFormated::success($member, 'data member berhasil ditampilkan');
    }

    /**
     * Edit Member
     *
     * Endpoint ini digunakan untuk menambahkan Member baru ke dalam sistem Reiyan Store.
     *
     * @authenticated
     *
     * @bodyParam name string required Name.
     * @bodyParam markup_type string required markup Type.
     * @bodyParam markup_value string required Markup Value.
     * @bodyParam min_threshold string required Min Order.
     */

    public function update(Request $request, MemberService $service, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'markup_type' => ['required', 'string', 'in:percent,flat'],
            'markup_value' => ['required', 'numeric'],
            'min_threshold' => ['required', 'numeric'],
        ]);
        try {
            $member = $service->updateMember($data, $id);

            return ResponseFormated::success($member, 'data member berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }
}
