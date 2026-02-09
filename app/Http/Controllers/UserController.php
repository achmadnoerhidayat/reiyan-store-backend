<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

/**
 * @group User
 *
 * API untuk mengelola User / Pengguna
 */
class UserController extends Controller
{
    /**
     * List User
     * Endpoint ini digunakan untuk mengambil semua data User.
     * @queryParam id string Mencari user berdasarkan id.
     * @queryParam search string Mencari user berdasarkan nama.
     * @queryParam limit int Batasi jumlah data yang tampil.
     * @authenticated
     */
    public function index(Request $request, AuthService $service)
    {
        $id = $request->input('id');
        $search = $request->input('search');
        $limit = $request->input('limit', 25);

        try {
            if ($id) {
                $user = $service->getById($id, $request->user());
            } else {
                $user = $service->getAll([
                    'search' => $search,
                    'limit' => $limit,
                ], $request->user());
            }

            return ResponseFormated::success($user, 'data user berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 400);
        }
    }

    /**
     * Tambah User
     *
     * Endpoint ini digunakan untuk menambahkan User baru ke dalam sistem Reiyan Store.
     *
     * @authenticated
     *
     * @bodyParam role_id int required ID Roles.
     * @bodyParam full_name string required Full Name.
     * @bodyParam user_name string required User Name.
     * @bodyParam phone string required No HP.
     * @bodyParam email string required Email.
     * @bodyParam password string required Password.
     */
    public function store(Request $request, AuthService $service)
    {
        $data = $request->validate([
            'role_id' => ['required', 'numeric', 'exists:roles,id'],
            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:9'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed', // butuh field password_confirmation
                Password::min(8) // minimal 8 karakter
                    ->letters() // wajib ada huruf
                    ->mixedCase() // wajib ada huruf besar & kecil
                    ->numbers() // wajib ada angka
                    ->symbols(), // wajib ada simbol
            ],
        ]);

        try {
            $data['member_id'] = '1';
            $service->register($data);
            return ResponseFormated::success(null, 'data user berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Edit User
     *
     * Endpoint ini digunakan untuk menambahkan User baru ke dalam sistem Reiyan Store.
     *
     * @authenticated
     *
     * @bodyParam role_id int required ID Roles.
     * @bodyParam full_name string required Full Name.
     * @bodyParam user_name string required User Name.
     * @bodyParam phone string required No HP.
     * @bodyParam email string required Email.
     * @bodyParam password string nullable Password.
     */
    public function update(Request $request, AuthService $service, $id)
    {
        $data = $request->validate([
            'role_id' => ['required', 'numeric', 'exists:roles,id'],
            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'min:9'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => [
                'nullable',
                'confirmed', // butuh field password_confirmation
                Password::min(8) // minimal 8 karakter
                    ->letters() // wajib ada huruf
                    ->mixedCase() // wajib ada huruf besar & kecil
                    ->numbers() // wajib ada angka
                    ->symbols(), // wajib ada simbol
            ],
        ]);

        try {
            $service->update($data, $id);
            return ResponseFormated::success(null, 'data user berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Delete User
     *
     * Endpoint ini digunakan untuk menambahkan User baru ke dalam sistem Reiyan Store.
     *
     * @authenticated
     */
    public function delete(AuthService $service, $id)
    {
        try {
            $service->delete($id);
            return ResponseFormated::success(null, 'data user berhasil di hapus');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }
}
