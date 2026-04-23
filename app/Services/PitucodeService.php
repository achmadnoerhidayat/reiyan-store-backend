<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PitucodeService
{
    protected $url;
    protected $key;
    public function __construct()
    {
        $this->key = env('PITUCODE_KEY');
        $this->url = env('PITUCODE_URL');
    }

    public function checkIdGame($data)
    {
        $baseUrl = $this->url . '/cek-id-game';
        $response = Http::withHeaders(['x-api-key' => $this->key])->get($baseUrl, [
            'game' => $data['code'],
            'userId' => $data['user_id'],
            'zoneId' => isset($data['server_id']) ? $data['server_id'] : "",
        ]);

        if ($response->status() === 200) {
            $results = $response->json();
            return $results ?? [];
        }
    }

    public function checkNameToken($id)
    {
        $baseUrl = $this->url . '/cek-user-pln-token-prabayar';
        $response = Http::withHeaders(['x-api-key' => $this->key])->get($baseUrl, [
            'id' => $id
        ]);

        if ($response->status() === 200) {
            $results = $response->json();
            return $results ?? [];
        }
    }
}
