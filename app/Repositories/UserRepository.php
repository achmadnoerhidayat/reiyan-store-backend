<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class UserRepository
{

    public function getAll($data)
    {
        $user = User::with('role', 'level');
        if (!empty($data['search'])) {
            $search = $data['search'];
            $user = $user->where(function ($query) use ($search) {
                $query->where('full_name', 'like', '%' . $search . '%')
                    ->orWhere('user_name', 'like', '%' . $search . '%')
                    ->orWhere('email', $search);
            });
        }

        if (!empty($data['level'])) {
            $user = $user->where('member_id', $data['level']);
        }

        if (!empty($data['user_id'])) {
            $user = $user->where('id', $data['user_id'])->first();
        }

        if (empty($data['user_id'])) {
            $user = $user->orderBy('created_at', 'asc')->paginate($data['limit']);
        }

        return $user;
    }

    public function getRole()
    {
        return Role::all();
    }

    public function getCount()
    {
        return User::count();
    }

    /**
     * Get User Berdasarkan id
     */
    public function findId($id)
    {
        return User::with('role', 'level')->find($id);
    }

    /**
     * Get User Berdasarkan Email
     */
    public function getUserByEmail($email)
    {
        return User::with('role', 'level')->where('email', $email)->first();
    }

    /**
     * Tambah User
     */
    public function store($data)
    {
        return User::create($data);
    }

    /**
     * Update User
     */
    public function update($id, $data)
    {
        $user = User::find($id);
        if (!$user) {
            return null;
        }

        $user->update($data);

        $user->role()->update([
            'name' => $data['role']
        ]);

        return $user;
    }
}
