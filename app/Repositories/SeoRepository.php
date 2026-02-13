<?php

namespace App\Repositories;

use App\Models\SeoMetaTag;

class SeoRepository
{
    public function getAll($search)
    {
        return SeoMetaTag::where(function ($q) use ($search) {
            if (!empty($search)) {
                $q->where('meta_key', 'like', "%{$search}%")->orWhere('meta_value', 'like', "%{$search}%");
            }
        })->latest()->get();
    }

    public function findId($id)
    {
        return SeoMetaTag::find($id);
    }

    public function store(array $data)
    {
        return SeoMetaTag::create($data);
    }

    public function update(array $data, $id)
    {
        $seo = SeoMetaTag::find($id);
        if (!$seo) {
            return null;
        }
        return $seo;
        $seo->update($data);
    }

    public function delete($id)
    {
        $seo = SeoMetaTag::find($id);
        if (!$seo) {
            return null;
        }
        $seo->delete();
        return $seo;
    }
}
