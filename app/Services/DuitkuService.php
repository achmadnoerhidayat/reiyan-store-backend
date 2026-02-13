<?php

namespace App\Services;

use App\Models\Provider;
use Illuminate\Support\Facades\Http;

class DuitkuService
{

    public function inquiryPayment(Provider $provider, $data)
    {
        $config = $this->getPayload($provider);
        $username = $config->username ?? '';
        $apiKey = $config->api_key ?? '';
        $raw = $username . $data['merchantOrderId'] . $data['paymentAmount'] . $apiKey;
        $data['merchantCode'] = $username;
        $data['signature'] = md5($raw);
        // Log::channel('duitku')->info('Request Inquiry Payment', (array) $data);
        $response = Http::post($config->url . '/merchant/v2/inquiry', $data)->body();
        // Log::channel('duitku')->info('Response Transfer Disbursement', (array) $response);
        return json_decode($response);
    }

    public function cekStatus(Provider $provider, $orderId)
    {
        $config = $this->getPayload($provider);
        $username = $config->username ?? '';
        $apiKey = $config->api_key ?? '';

        $raw = $username . $orderId . $apiKey;
        $data = [
            "merchantCode" => $username,
            "merchantOrderId" => $orderId,
            "signature" => md5($raw),
        ];
        $response = Http::post($config->url . '/merchant/transactionStatus', $data)->body();
        return json_decode($response);
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
