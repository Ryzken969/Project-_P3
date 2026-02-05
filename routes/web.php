<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL
|--------------------------------------------------------------------------
*/

// Halaman pilih login
Route::get('/', function () {
    return view('auth.pilih-login');
});


/*
|--------------------------------------------------------------------------
| AUTH LOGIN
|--------------------------------------------------------------------------
*/

// Login siswa
Route::get('/login-siswa', [AuthController::class,'loginSiswaForm']);
Route::post('/login-siswa', [AuthController::class,'loginSiswa']);

// Login admin
Route::get('/login-admin', [AuthController::class,'loginAdminForm']);
Route::post('/login-admin', [AuthController::class,'loginAdmin']);

// Logout
Route::get('/logout', [AuthController::class,'logout']);


/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/

// Register siswa
Route::get('/register-siswa', [AuthController::class,'registerSiswaForm']);
Route::post('/register-siswa', [AuthController::class,'registerSiswa']);

// Register admin
Route::get('/register-admin', [AuthController::class,'registerAdminForm']);
Route::post('/register-admin', [AuthController::class,'registerAdmin']);


/*
|--------------------------------------------------------------------------
| SISWA AREA
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-siswa', [AspirasiController::class,'dashboard']);
Route::get('/form-aspirasi', [AspirasiController::class,'create']);
Route::post('/aspirasi', [AspirasiController::class,'store']);


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::get('/dashboard-admin', [AdminController::class,'dashboard']);
Route::post('/feedback-admin', [AdminController::class,'feedback']);
Route::get('/aspirasi-selesai/{id}', [AdminController::class,'selesai']);
