<?php

namespace App\Repositories;

use App\Models\category;

class KategoriRepository
{
    public function getAll($data)
    {
        $kategori = category::with('produk');
        if (!empty($data['search'])) {
            $kategori = $kategori->where('name', 'like', '%' . $data['search'] . '%');
        }
        $kategori = $kategori->orderBy('created_at', 'desc')->paginate($data['limit']);
        return $kategori;
    }

    public function findId($id)
    {
        return category::with('produk')->find($id);
    }

    public function store(array $data)
    {
        return category::create($data);
    }

    public function update(array $data, $id)
    {
        $kategori = category::find($id);
        if ($kategori) {
            $kategori->update($data);
            return $kategori;
        }
        return $kategori;
    }

    public function delete($id)
    {
        $kategori = category::find($id);
        if ($kategori) {
            $kategori->delete();
            return $kategori;
        }
        return $kategori;
    }
}
