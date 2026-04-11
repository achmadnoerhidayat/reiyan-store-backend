<?php

namespace App\Repositories;

use App\Models\SiteContent;

class SiteContentRepository
{

    public function getAll($data)
    {
        $conten = SiteContent::where(function ($q) use ($data) {
            if (!empty($data['type'])) {
                $q->where('type', $data['type']);
            }
            if (!empty($data['search'])) {
                $q->where('title', $data['search']);
            }
        })->latest();

        if ((int) $data['limit'] === 1) {
            $conten = $conten->first();
        } else {
            $conten = $conten->paginate($data['limit']);
        }

        return $conten;
    }

    public function findId($id)
    {
        return SiteContent::find($id);
    }

    public function store($data)
    {
        return SiteContent::create($data);
    }

    public function update($data, $id)
    {
        $conten = SiteContent::find($id);
        if (!$conten) {
            throw new \Exception('data site conten tidak ditemukan');
        }
        return $conten->update($data);
    }

    public function delete($id)
    {
        $conten = SiteContent::find($id);
        if (!$conten) {
            throw new \Exception('data site conten tidak ditemukan');
        }
        return $conten->delete();
    }
}
