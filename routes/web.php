<?php

use App\Http\Controllers\GymController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('gym/dashboard');
});

Route::view('partial', 'partial/master-gym');
// tugas web 3 web route :
Route::get('gym/index', [GymController::class, 'index']);
Route::get('add-gym', [GymController::class, 'create']);
Route::post('save-gym', [GymController::class, 'ambilData'])->name('gym.save-gym');
Route::delete('delete-gym/{id}', [GymController::class, 'destroy'])->name('delete.gym');
Route::get('edit-gym/{id}/edit', [GymController::class, 'edit'])->name('edit.gym');
Route::put('edit-gym/{id}', [GymController::class, 'update'])->name('update.gym');
