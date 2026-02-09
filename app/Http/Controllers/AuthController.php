<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Http\Resources\ActivityLogResource;
use Spatie\Activitylog\Models\Activity;

/**
 * @group Autentikasi
 *
 * API untuk mengelola login dan logout user Reiyan Store
 */
class AuthController extends Controller
{
    /**
     * Register User
     *
     * Endpoint ini digunakan untuk register akun reiyan store.
     *
     * @bodyParam full_name string required Full Name. Example: Bambang Pamungkas
     * @bodyParam user_name string required User Name. Example: Bambang
     * @bodyParam phone string required User Name. Example: 081227415987
     * @bodyParam email string required Email user. Example: bambang@gmail.com
     * @bodyParam password string required Password user. Example: aP1W5B0>YC4I
     * @bodyParam password_confirmation string required Password user. Example: aP1W5B0>YC4I
     */
    public function register(Request $request, AuthService $service)
    {
        $data = $request->validate([
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
            $data['role_id'] = '9';
            $service->register($data);
            return ResponseFormated::success(null, 'Register Successfully');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Login User
     *
     * Endpoint ini digunakan untuk mendapatkan token akses.
     *
     * @bodyParam email string required Email user. Example: bambang@gmail.com
     * @bodyParam password string required Password user. Example: aP1W5B0>YC4I
     */
    public function login(Request $request, AuthService $service)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        try {
            $data['ip'] = $request->ip();
            $data['agent'] = $request->header('User-Agent');
            $login = $service->login($data);
            return ResponseFormated::success($login, 'Login Successfully');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Refresh Token
     *
     * Tukar token lama dengan token baru agar masa berlaku (expiration) diperpanjang.
     * @authenticated
     */
    public function refreshToken(Request $request, AuthService $service)
    {
        try {
            $data['ip'] = $request->ip();
            $data['agent'] = $request->header('User-Agent');
            $refresh = $service->refresh($data, $request->user());

            return ResponseFormated::success($refresh, 'Refresh Successfully');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 403);
        }
    }

    /**
     * Log Sistem
     *
     * Endpoint ini digunakan untuk memantau list Log Sistem.
     */
    public function logging()
    {
        $logs = Activity::with('causer')->latest()->paginate(10);
        return ActivityLogResource::collection($logs);
    }
}
