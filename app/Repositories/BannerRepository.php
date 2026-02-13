<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository
{
    public function getAll($data)
    {
        return Banner::where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('title', 'like', "%{$data['search']}%");
            }
            if (!empty($data['starts_at'])) {
                $q->where('starts_at', 'like', "%{$data['starts_at']}%");
            }
            if (!empty($data['ends_at'])) {
                $q->where('ends_at', 'like', "%{$data['ends_at']}%");
            }
            if (!empty($data['is_active'])) {
                $q->where('is_active', $data['is_active']);
            }
        })->latest()->limit(4)->get();
    }

    public function findId($id)
    {
        return Banner::find($id);
    }

    public function store(array $data)
    {
        return Banner::create($data);
    }

    public function update(array $data, $id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return null;
        }
        return $banner;
        $banner->update($data);
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        if (!$banner) {
            return null;
        }
        $banner->delete();
        return $banner;
    }
}
