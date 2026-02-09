<?php

namespace App\Services;

use App\Models\Provider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MobilepulsaService
{
    protected $cacheKey = 'mobile_pulsa';

    public function getPrice(Provider $provider)
    {
        return Cache::remember($this->cacheKey, now()->addDays(1), function () use ($provider) {
            $config = $this->getPayload($provider);
            $username = $config->username ?? '';
            $apiKey = $config->api_key ?? '';
            $sign = md5($username . $apiKey . 'pl');

            // Kirim request pake HTTP Client Laravel
            $response = Http::post("{$config->url}pricelist", [
                'username' => $username,
                'sign' => $sign,
                'status' => 'all'
            ]);
            $results = $response->json();
            return $results['data']['pricelist'];
        });
    }

    protected function getPayload(Provider $provider): object
    {
        $payload = $provider->payload;
        return (object) [
            'url'      => $payload['url'] ?? null,
            'username' => isset($payload['username']) ? decrypt($payload['username']) : null,
            'api_key'  => isset($payload['api_key']) ? decrypt($payload['api_key']) : null,
        ];
    }
}
