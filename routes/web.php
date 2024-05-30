<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AntrianController;

use App\Http\Controllers\ObatController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RekamMedisObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RiwayatRekamMedisController;

use App\Http\Controllers\KategoriObatController;
use App\Http\Controllers\UserController;

// AUTH
Route::get('/login', [AuthController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout']);

// DASHBOARD
Route::resource('/', DashboardController::class)->middleware('auth');

Route::resource('/antrian', AntrianController::class)->middleware('auth');
Route::post('/antrian-next', [AntrianController::class, 'next'])->middleware('auth');
Route::post('/antrian-reset', [AntrianController::class, 'reset'])->middleware('auth');

Route::resource('/obat', ObatController::class)->middleware('auth');
Route::resource('/rekam-medis', RekamMedisController::class)->middleware('auth');
Route::resource('/rekam-medis-obat', RekamMedisObatController::class)->middleware('auth');
Route::resource('/pasien', PasienController::class)->middleware('auth');
Route::resource('/riwayat-rekam-medis', RiwayatRekamMedisController::class)->middleware('auth');

Route::resource('/kategori-obat', KategoriObatController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
