<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository
{
    public function getAll($data)
    {
        return Notification::with('transaksi', 'user')->where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('title', 'like', "%{$data['search']}%");
            }
            if (!empty($data['is_read'])) {
                $q->where('is_read', $data['is_read']);
            }
        })->latest()->paginate($data['limit']);
    }

    public function findId($id)
    {
        return Notification::with('transaksi', 'user')->find($id);
    }

    public function store(array $data)
    {
        return Notification::create($data);
    }

    public function update(array $data, $id)
    {
        $kategori = Notification::find($id);
        if ($kategori) {
            $kategori->update($data);
            return $kategori;
        }
        return $kategori;
    }

    public function delete($id)
    {
        $kategori = Notification::find($id);
        if ($kategori) {
            $kategori->delete();
            return $kategori;
        }
        return $kategori;
    }
}
