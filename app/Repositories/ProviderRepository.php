<?php

namespace App\Repositories;

use App\Models\Provider;

class ProviderRepository
{
    public function getAll($data)
    {
        $provider = Provider::query();

        if (!empty($data['search'])) {
            $provider->where(function ($q) use ($data) {
                $q->where('name', 'like', '%' . $data['search'] . '%')
                    ->orWhere('code', 'like', '%' . $data['search'] . '%');
            });
        }

        return $provider->paginate($data['limit']);
    }

    public function findId($id)
    {
        return Provider::find($id);
    }

    public function findCode($code)
    {
        return Provider::where('code', 'like', '%' . $code . '%')->where('is_active', true)->first();
    }

    public function store(array $data)
    {
        return Provider::cretae($data);
    }

    public function update($id, array $data)
    {
        $provider = Provider::find($id);
        if ($provider) {
            $provider->update($data);
            return $provider->fresh();
        }
        return $provider;
    }

    public function delete($id)
    {
        $provider = Provider::find($id);
        if ($provider) {
            $provider->delete();
            return $provider;
        }
        return $provider;
    }
}
