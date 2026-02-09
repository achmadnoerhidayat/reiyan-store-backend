<?php

namespace App\Services;

use App\Models\Provider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class VipResellerService
{
    protected $cacheKey = 'vip_reseller';

    public function getPriceGame(Provider $provider)
    {
        return Cache::remember($this->cacheKey, now()->addDays(1), function () use ($provider) {
            $config = $this->getPayload($provider);
            $username = $config->username ?? '';
            $apiKey = $config->api_key ?? '';
            $sign = md5($username . $apiKey);

            // Kirim request pake HTTP Client Laravel
            $response = Http::asForm()->post("{$config->url}game-feature", [
                'key' => $apiKey,
                'sign' => $sign,
                'type' => 'services'
            ]);

            if ($response->status() === 200) {
                $results = $response->json();
                return $results['data'] ?? [];
            }
            return [];
        });
    }

    public function getStokGame(Provider $provider, $code)
    {
        $config = $this->getPayload($provider);
        $username = $config->username ?? '';
        $apiKey = $config->api_key ?? '';
        $sign = md5($username . $apiKey);

        // Kirim request pake HTTP Client Laravel
        $response = Http::asForm()->post("{$config->url}game-feature", [
            'key' => $apiKey,
            'sign' => $sign,
            'type' => 'service-stock',
            'service' => $code
        ]);

        if ($response->status() === 200) {
            $results = $response->json();
            return $results['data'] ?? [];
        }
        return [];
    }

    public function getNickName(Provider $provider, $data)
    {
        $config = $this->getPayload($provider);
        $username = $config->username ?? '';
        $apiKey = $config->api_key ?? '';
        $sign = md5($username . $apiKey);

        // Kirim request pake HTTP Client Laravel
        $response = Http::asForm()->post("{$config->url}game-feature", [
            'key' => $apiKey,
            'sign' => $sign,
            'type' => 'get-nickname',
            'service' => $data['code'],
            'target' => $data['user_id'],
            'additional_target' => $data['server_id'],
        ]);

        if ($response->status() === 200) {
            $results = $response->json();
            return $results['data'] ?? [];
        }
        return [];
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
