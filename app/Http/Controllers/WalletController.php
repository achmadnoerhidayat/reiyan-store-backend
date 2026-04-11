<?php

namespace App\Http\Controllers;

use App\Services\WalletService;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    protected $service;
    public function __construct(WalletService $service)
    {
        $this->service = $service;
    }

    /**
     * @group Wallet Management
     *
     * Menampilkan data wallet user yang sedang login.
     * @authenticated
     */
    public function index()
    {
        try {
            $wallet = $this->service->fetchByUser();
            return ResponseFormated::success($wallet, 'data wallet berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * @group Wallet Management
     *
     * Menampilkan semuaa data wallet admin akses.
     * @authenticated
     */
    public function indexAdmin(Request $request)
    {
        try {
            $wallet = $this->service->getAll([
                'type' => $request->input('type'),
                'limit' => $request->input('limit'),
            ]);
            return ResponseFormated::success($wallet, 'data wallet berhasil ditampilkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * @group Wallet Management
     *
     * Membuat wallet baru (aktivasi wallet).
     * @authenticated
     * @bodyParam pin string required PIN wallet, minimal 6 karakter. Example: 123456
     * * @response {
     * "meta": { "code": 200, "status": "success", "message": "data wallet berhasil ditambahkan" },
     * "data": { "id": 1, "balance": 0, "is_frozen": false }
     * }
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pin' => ['required', 'min:6']
        ]);
        try {
            $wallet = $this->service->createWallet($data);
            return ResponseFormated::success($wallet, 'data wallet berhasil ditambahkan');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    /**
     * @group Wallet Management
     *
     * Update status atau saldo wallet (Admin/System Only).
     * @authenticated
     * @urlParam id int required ID Wallet. Example: 1
     * @bodyParam balance numeric Saldo wallet. Example: 100000
     * @bodyParam hold_balance numeric Saldo yang ditahan. Example: 5000
     * @bodyParam is_frozen boolean Status suspend wallet. Example: false
     * * @response {
     * "meta": { "code": 200, "status": "success", "message": "data wallet berhasil diupdate" },
     * "data": { "id": 1, "balance": 100000, "is_frozen": false }
     * }
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'balance' => ['nullable', 'numeric'],
            'hold_balance' => ['nullable', 'numeric'],
            'is_frozen' => ['nullable', 'boolean'],
        ]);
        try {
            $wallet = $this->service->updateWallet($data, $id);
            return ResponseFormated::success($wallet, 'data wallet berhasil diupdate');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }

    public function chekValidPin(Request $request)
    {
        $data = $request->validate([
            'pin' => ['required', 'min:6', 'numeric']
        ]);

        try {
            $wallet = $this->service->validPin($data['pin']);
            return ResponseFormated::success($wallet, 'Pin Sesuai');
        } catch (\Exception $e) {
            return ResponseFormated::error(null, $e->getMessage(), 500);
        }
    }
}
