<?php

namespace App\Services;

use App\Http\Resources\ProviderResource;
use App\Repositories\ProviderRepository;
use Illuminate\Support\Facades\DB;

class ProviderService
{

    protected $provider;

    public function __construct(ProviderRepository $provider)
    {
        $this->provider = $provider;
        // throw new \Exception('Not implemented');
    }

    public function getAll($data)
    {
        $provider = $this->provider->getAll($data);
        return ProviderResource::collection($provider);
    }

    public function findId($id)
    {
        return $this->provider->findId($id);
    }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            return $this->provider->store($data);
        });
    }

    public function update($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $provider = $this->provider->findId($id);
            if (!$provider) {
                throw new \Exception('Provider Tidak Ditemukan');
            }
            return $this->provider->update($provider->id, $data);
        });
    }

    public function delete($id)
    {
        return DB::transaction(function () use ($id) {
            $provider = $this->provider->findId($id);
            if (!$provider) {
                throw new \Exception('Provider Tidak Ditemukan');
            }
            return $this->provider->delete($provider->id);
        });
    }
}
