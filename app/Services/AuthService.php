<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data, $user)
    {
        if (!in_array($user->role->name, ['super_admin', 'administrator'])) {
            $data['user_id'] = $user->id;
        }
        return $this->userRepo->getAll($data);
    }

    public function getById($id, $user)
    {
        if (!in_array($user->role->name, ['super_admin', 'administrator'])) {
            if ($id !== $user->id) {
                throw new \Exception('Tidak Memiliki Akses Utk Melihat Data User Ini');
            }
        }
        return $this->userRepo->findId($id);
    }

    public function register(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['password'] = Hash::make($data['password']);
            $data['member_id'] = 1;
            $register = $this->userRepo->store($data);
            if ($register) {
                activity('auth')
                    ->causedBy($register)
                    ->performedOn($register)
                    ->withProperties([
                        'ip' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                        'device_name' => str_contains(request()->userAgent(), 'Mobile') ? 'Mobile Device' : 'Desktop/PC',
                    ])
                    ->log('User Registered');
            }
            return $register;
        });
    }

    public function login(array $data)
    {
        $user = $this->userRepo->getUserByEmail($data['email']);
        if (! $user || ! Hash::check($data['password'], $user->password)) {

            activity('security')
                ->withProperties([
                    'email' => $data['email'],
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'device_name' => str_contains(request()->userAgent(), 'Mobile') ? 'Mobile Device' : 'Desktop/PC',
                ])
                ->log('Failed login attempt');

            throw ValidationException::withMessages([
                // pesan sengaja generik agar tidak memberikan petunjuk (prevent user enumeration)
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $user->tokens()->delete();
        $deviceName = 'API-' . md5($data['ip'] . '|' . $data['agent']);
        // 7) buat token baru untuk client (plainTextToken hanya ditampilkan sekali)
        $token = $user->createToken($deviceName)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'type' => "Bearer"
        ];

        activity('auth')
            ->causedBy($user)
            ->performedOn($user)
            ->withProperties([
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'device_name' => str_contains(request()->userAgent(), 'Mobile') ? 'Mobile Device' : 'Desktop/PC',
            ])
            ->log('User logged in');

        return $response;
    }

    public function refresh($data, $user)
    {
        // 1. Hapus semua token lama (atau token yang sedang dipakai saja)

        $user->tokens()->delete();

        // 2. Buat token baru
        $deviceName = 'API-' . md5($data['ip'] . '|' . $data['agent']);
        $newToken = $user->createToken($deviceName)->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $newToken,
            'type' => "Bearer"
        ];
        return $response;
    }

    public function update(array $data, $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $user = $this->userRepo->findId($id);

            if (!$user) {
                return null;
            }
            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            $user->update($data);
            return $user->fresh();
        });
    }

    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            $user = $this->userRepo->findId($id);

            if (!$user) {
                return null;
            }

            $user->delete();
            return $user;
        });
    }
}
