<?php

namespace App\Http\Controllers;

use App\Services\AuthService;

class RoleController extends Controller
{
    public function index(AuthService $service)
    {
        $response = $service->getRole();
        return ResponseFormated::success($response, 'data role berhasil ditampilkan');
    }
}
