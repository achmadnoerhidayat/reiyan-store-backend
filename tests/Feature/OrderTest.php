<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_proses_pembelian_produk_berhasil()
    {
        // Tembak API internal lo
        $response = $this->postJson('/produk/payment', [
            'produk_id'  => 27,
            'service_id'  => 619,
            'target'    => '12345678',
            'server_id'  => '8821',
            'payment'    => 2
        ]);
        $response->assertStatus(201);
    }
}
