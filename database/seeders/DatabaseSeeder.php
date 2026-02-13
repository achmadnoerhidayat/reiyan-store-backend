<?php

namespace Database\Seeders;

use App\Models\MemberLevel;
use App\Models\Provider;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->role();

        $this->member();

        User::updateOrCreate([
            'full_name' => 'Admin',
            'user_name' => 'Admin',
            'email' => 'admin@reiyan.com',
        ], [
            'full_name' => 'Admin',
            'user_name' => 'Admin',
            'email' => 'admin@reiyan.com',
            'role_id' => '1',
            'member_id' => '3',
            'password' => 'rahasia123',
        ]);

        $this->provider();
    }

    private function role()
    {
        $roles = [
            'super_admin',
            'administrator',
            'finance',
            'customer_service',
            'product_manager',
            'reseller_vip',
            'reseller_gold',
            'member',
            'guest'
        ];
        foreach ($roles as $role) {
            // Gunakan updateOrCreate agar tidak error saat re-seed
            Role::updateOrCreate(
                ['name' => $role],
                ['name' => $role]
            );
        }
    }

    private function member()
    {
        $member = [
            [
                "name" => "bronze",
                "markup_type" => "percent",
                "markup_value" => 10,
                "min_threshold" => 0
            ],
            [
                "name" => "silver",
                "markup_type" => "percent",
                "markup_value" => 5,
                "min_threshold" => 1000000
            ],
            [
                "name" => "gold",
                "markup_type" => "percent",
                "markup_value" => 2,
                "min_threshold" => 5000000
            ]
        ];
        foreach ($member as $value) {
            MemberLevel::updateOrCreate([
                'name' => $value['name']
            ], $value);
        }
    }

    private function provider()
    {
        $provider = [
            [
                'name' => 'Mobile Postpaid',
                'code' => 'mobile-postpaid',
                'driver' => 'App\Services\MobilepulsaService',
                'is_active' => false,
                'payload' => [
                    'username' => encrypt(env("MOBILE_NAME")),
                    'api_key' => encrypt(env("MOBILE_KEY")),
                    'url' => "https://testpostpaid.mobilepulsa.net/api/",
                ],
            ],
            [
                'name' => 'Mobile Prepaid',
                'code' => 'mobile-prepaid',
                'driver' => 'App\Services\MobilepulsaService',
                'is_active' => false,
                'payload' => [
                    'username' => encrypt(env("MOBILE_NAME")),
                    'api_key' => encrypt(env("MOBILE_KEY")),
                    'url' => "https://prepaid.iak.dev/api/",
                ],
            ],
            [
                'name' => 'Vip Postpaid',
                'code' => 'vip-postpaid',
                'driver' => 'App\Services\VipResellerService',
                'is_active' => true,
                'payload' => [
                    'username' => encrypt(env("VIP_ID")),
                    'api_key' => encrypt(env("VIP_KEY")),
                    'type' => "Basic",
                    'url' => "https://vip-reseller.co.id/api/",
                ],
            ],
            [
                'name' => 'Vip Prepaid',
                'code' => 'vip-prepaid',
                'driver' => 'App\Services\VipResellerService',
                'is_active' => true,
                'payload' => [
                    'username' => encrypt(env("VIP_ID")),
                    'api_key' => encrypt(env("VIP_KEY")),
                    'type' => "Basic",
                    'url' => "https://vip-reseller.co.id/api/",
                ],
            ],
            [
                'name' => 'Payment Gateway Duitku',
                'code' => 'payment-gateway-duitku',
                'driver' => 'App\Services\DuitkuService',
                'is_active' => true,
                'payload' => [
                    'username' => encrypt(env("DUITKU_NAME")),
                    'api_key' => encrypt(env("DUITKU_KEY")),
                    'url' => "https://sandbox.duitku.com/webapi/api/merchant",
                    'url_js' => "https://app-sandbox.duitku.com/lib/js/duitku.js",
                ],
            ],
        ];
        foreach ($provider as $value) {
            Provider::updateOrCreate([
                'name' => $value['name'],
                'payload' => $value['payload'],
            ], $value);
        }
    }
}
