<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;

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

Route::resource('/obat', ObatController::class)->middleware('auth');
Route::resource('/pasien', PasienController::class)->middleware('auth');

Route::resource('/kategori-obat', KategoriObatController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('auth');
