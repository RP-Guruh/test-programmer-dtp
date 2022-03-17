<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
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

Route::prefix('karyawan')->group(function () {
    Route::post('/store', [KaryawanController::class, 'store']);
    Route::get('/data', [KaryawanController::class, 'index']);
    Route::get('/detail/{id}', [KaryawanController::class, 'show']);
    Route::get('/delete/{id}', [KaryawanController::class, 'destroy']);
    Route::get('/edit/{id}', [KaryawanController::class, 'edit']);
    Route::post('/update', [KaryawanController::class, 'update']);
});

Route::get('/', function () {
    return view('index');
});
