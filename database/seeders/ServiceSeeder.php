<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\ProdukService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    protected $service;
    public function __construct(ProdukService $service)
    {
        $this->service = $service;
        // throw new \Exception('Not implemented');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = Product::all();
        foreach ($produk as $value) {
            $this->service->createLayanan($value->slug);
        }
    }
}
