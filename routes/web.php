<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['throttle:10,1'], 'prefix' => 'auth'], function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
});

Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin', 'throttle:10,1'], 'prefix' => 'log'], function () {
    Route::get('/', [AuthController::class, 'logging']);
});

Route::group(['middleware' => ['auth:sanctum', 'throttle:10,1'], 'prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::group(['middleware' => ['role:administrator,super_admin']], function () {
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'delete']);
    });
});

Route::group(['middleware' => ['auth:sanctum', 'throttle:10,1'], 'prefix' => 'level'], function () {
    Route::get('/', [MemberController::class, 'index']);
    Route::group(['middleware' => ['role:administrator,super_admin']], function () {
        Route::put('/{id}', [MemberController::class, 'update']);
    });
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin,product_manager', 'throttle:10,1']], function () {
        Route::post('/', [KategoriController::class, 'store']);
        Route::put('/{id}', [KategoriController::class, 'update']);
        Route::delete('/{id}', [KategoriController::class, 'delete']);
    });
});

Route::group(['prefix' => 'produk'], function () {
    Route::get('/', [ProdukController::class, 'index']);
    Route::get('/{slug}', [ProdukController::class, 'show']);
    Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin,product_manager']], function () {
        Route::get('/list-harga/{slug}', [ProdukController::class, 'priceList']);
        Route::group(['middleware' => ['throttle:10,1']], function () {
            Route::post('/', [ProdukController::class, 'store']);
            Route::put('/{id}', [ProdukController::class, 'update']);
            Route::delete('/{id}', [ProdukController::class, 'delete']);
        });
    });
});

Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin'], 'prefix' => 'provider'], function () {
    Route::get('/', [ProviderController::class, 'index']);
    Route::group(['middleware' => ['throttle:10,1']], function () {
        // Route::post('/', [ProviderController::class, 'store']);
        Route::put('/{id}', [ProviderController::class, 'update']);
        Route::delete('/{id}', [ProviderController::class, 'delete']);
    });
});
