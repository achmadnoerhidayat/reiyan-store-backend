<?php

namespace App\Repositories;

use App\Models\SocialMedia;

class SocialMediaRepository
{
    public function getAll($data)
    {
        return SocialMedia::where(function ($q) use ($data) {
            if (!empty($data['search'])) {
                $q->where('platform', 'like', "%{$data['search']}%");
            }
            if (!empty($data['is_active'])) {
                $q->where('is_active', $data['is_active']);
            }
        })->latest()->limit(4)->get();
    }

    public function findId($id)
    {
        return SocialMedia::find($id);
    }

    public function store(array $data)
    {
        return SocialMedia::create($data);
    }

    public function update(array $data, $id)
    {
        $social = SocialMedia::find($id);
        if (!$social) {
            return null;
        }
        return $social;
        $social->update($data);
    }

    public function delete($id)
    {
        $social = SocialMedia::find($id);
        if (!$social) {
            return null;
        }
        $social->delete();
        return $social;
    }
}
