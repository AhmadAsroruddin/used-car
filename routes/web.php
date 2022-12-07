<?php

use App\Http\Controllers\CariController;
use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PenjualController;

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



Route::middleware(['auth'])->group(function(){
    Route::get('/', [DaftarController::class, 'index']);
    //mobil
    Route::get('/mobil', [MobilController::class, 'index']);
    Route::post('/mobil/store', [MobilController::class, 'store']);
    Route::get('/mobil/{id_mobil}/edit', [MobilController::class, 'edit']);
    Route::put('/mobil/{id_mobil}', [MobilController::class, 'update']);
    Route::delete('/mobil/{id_mobil}', [MobilController::class, 'destroy']);
    Route::get('/mobil/cari',[MobilController::class,'cari']);
    Route::get('/mobil/{id_mobil}/soft', [MobilController::class, 'soft']);
    Route::get('/mobil/restore', [MobilController::class, 'restore']);

    //penjual
    Route::get('/penjual', [PenjualController::class, 'index']);
    Route::post('/penjual/store', [PenjualController::class, 'store']);
    Route::get('/penjual/{id_penjual}/edit', [PenjualController::class, 'edit']);
    Route::put('/penjual/{id_penjual}', [PenjualController::class, 'update']);
    Route::delete('/penjual/{id_penjual}', [PenjualController::class, 'destroy']);
    Route::delete('/penjual/soft/{id_penjual}', [PenjualController::class, 'soft']);
    Route::get('/penjual/restoree', [PenjualController::class, 'restore']);

    //pembeli
    Route::get('/pembeli', [PembeliController::class, 'index']);
    Route::post('/pembeli/store', [PembeliController::class, 'store']);
    Route::get('/pembeli/{id_pembeli}/edit', [PembeliController::class, 'edit']);
    Route::put('/pembeli/{id_pembeli}', [PembeliController::class, 'update']);
    Route::delete('/pembeli/{id_pembeli}', [PembeliController::class, 'destroy']);
    Route::get('/pembeli/{id_pembeli}/soft', [PembeliController::class, 'soft']);
    Route::get('/pembeli/restore', [PembeliController::class, 'restore']);
    //daftar mobil
    Route::get('/daftar', [DaftarController::class, 'sold']);
    Route::get('/daftar/cari', [MobilController::class, 'cari']);
    //cari
    Route::get('/cari/{keyword}', [CariController::class, 'index']);
    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
