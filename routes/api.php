<?php

use App\Http\Controllers\GymController;
use Illuminate\Http\Request;
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
Route::get('paket', [GymController::class, 'indexApi']);
Route::get('paket/{id}', [GymController::class, 'showApi']);
Route::post('paket',[GymController::class, 'ambildata']);
Route::put('paket/{id}',[GymController::class, 'update']);
Route::delete('paket{id}', [GymController::class, 'destroy']);

