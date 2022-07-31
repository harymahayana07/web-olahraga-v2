<?php

use App\Http\Controllers\API\MemberController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PaketsController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// tidak perlu login dengan barear access token untuk mengakses :
Route::group(['prefix' => 'hary-gym'], function() {
    // Get Password
    Route::get('password', function () {
        return bcrypt('arikmahayana');
    });
    // untuk tabel customer
    Route::get('member', [MemberController::class, 'index']);
    Route::get('member/{id}', [MemberController::class, 'show']);
    // untuk tabel orders
    Route::get('order', [OrderController::class, 'index']);
    Route::get('order/{id}', [OrderController::class, 'show']);
    // untuk tabel products
    Route::get('paket', [PaketsController::class, 'index']);
    Route::get('paket/{id}', [PaketsController::class, 'show']);
});
// jwt auth
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

// setelah login dengan barear access token
Route::group(['middleware' => 'auth:api', 'prefix' => 'hary-gym'], function ($router) {
   
    Route::post('member', [MemberController::class, 'store']); //tambah member
    Route::put('member/{id}', [MemberController::class, 'update']); //edit member
    Route::delete('member/{id}', [MemberController::class, 'destroy']); //hapus member
    Route::get('relasi-member', [MemberController::class, 'member_relasi']); //lihat relasi tabel member

    Route::post('order', [OrderController::class, 'store']); //tambah order
    Route::put('order/{id}', [OrderController::class, 'update']); //edit order
    Route::delete('order/{id}', [OrderController::class, 'destroy']); //hapus order
    Route::get('relasi-order', [OrderController::class, 'order_relasi']); //lihat relasi tabel order

    Route::post('paket', [PaketsController::class, 'store']); //tambah paket
    Route::put('paket/{id}', [PaketsController::class, 'update']); //edit paket
    Route::delete('paket/{id}', [PaketsController::class, 'destroy']); //hapus paket
    Route::get('relasi-paket', [PaketsController::class, 'paket_relasi']); //lihat relasi tabel paket
});


