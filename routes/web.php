<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
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
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/payment', [ProdukController::class, 'payment']);

        Route::group(['middleware' => ['role:administrator,super_admin,product_manager']], function () {
            Route::get('/list-harga/{slug}', [ProdukController::class, 'priceList']);
            Route::group(['middleware' => ['throttle:10,1']], function () {
                Route::post('/', [ProdukController::class, 'store']);
                Route::put('/{id}', [ProdukController::class, 'update']);
                Route::delete('/{id}', [ProdukController::class, 'delete']);
            });
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

Route::group(['prefix' => 'config'], function () {
    Route::get('/', [ConfigController::class, 'index']);
    Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin', 'throttle:10,1']], function () {
        Route::post('/', [ConfigController::class, 'store']);
        Route::put('/{id}', [ConfigController::class, 'update']);
        Route::delete('/{id}', [ConfigController::class, 'delete']);
    });
});

Route::group(['prefix' => 'banner'], function () {
    Route::get('/', [BannerController::class, 'index']);
    Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin', 'throttle:10,1']], function () {
        Route::post('/', [BannerController::class, 'store']);
        Route::put('/{id}', [BannerController::class, 'update']);
        Route::delete('/{id}', [BannerController::class, 'delete']);
    });
});

Route::group(['prefix' => 'payment-method'], function () {
    Route::get('/', [PaymentMethodController::class, 'index']);
    Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin', 'throttle:10,1']], function () {
        Route::post('/', [PaymentMethodController::class, 'store']);
        Route::put('/{id}', [PaymentMethodController::class, 'update']);
        Route::delete('/{id}', [PaymentMethodController::class, 'delete']);
    });
});

Route::group(['prefix' => 'seo'], function () {
    Route::get('/', [SeoController::class, 'index']);
    Route::group(['middleware' => ['auth:sanctum', 'role:administrator,super_admin', 'throttle:10,1']], function () {
        Route::post('/', [SeoController::class, 'store']);
        Route::put('/{id}', [SeoController::class, 'update']);
        Route::delete('/{id}', [SeoController::class, 'delete']);
    });
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'voucher'], function () {
    Route::get('/', [VoucherController::class, 'index']);
    Route::post('/check/{code}', [VoucherController::class, 'findValidVoucher']);
    Route::group(['middleware' => ['role:administrator,super_admin', 'throttle:10,1']], function () {
        Route::post('/', [VoucherController::class, 'store']);
        Route::put('/{id}', [VoucherController::class, 'update']);
        Route::delete('/{id}', [VoucherController::class, 'delete']);
    });
});

Route::group(['prefix' => 'transaksi'], function () {
    // callback
    Route::post('/callback-payment', [TransactionController::class, 'callbackPayment']);
    Route::post('/callback-ppob', [TransactionController::class, 'callbackPpob']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/', [TransactionController::class, 'index']);

        Route::group(['middleware' => ['role:administrator,super_admin,finance', 'throttle:10,1']], function () {
            Route::get('/admin', [TransactionController::class, 'indexAmin']);
            Route::delete('/{id}', [TransactionController::class, 'delete']);
        });
    });
});

Route::group(['prefix' => 'deposit'], function () {
    // callback
    Route::post('/callback-payment', [DepositController::class, 'callbackPayment']);
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/', [DepositController::class, 'index']);

        Route::group(['middleware' => ['role:administrator,super_admin,finance', 'throttle:10,1']], function () {
            Route::get('/admin', [DepositController::class, 'indexAmin']);
            Route::delete('/{id}', [DepositController::class, 'delete']);
        });
    });
});

Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'review'], function () {
    Route::get('/', [RatingController::class, 'index']);
    Route::post('/', [RatingController::class, 'store']);
    Route::put('/{id}', [RatingController::class, 'update']);

    Route::group(['middleware' => ['role:administrator,super_admin,finance', 'throttle:10,1']], function () {
        Route::get('/admin', [RatingController::class, 'indexAmin']);
    });
});
