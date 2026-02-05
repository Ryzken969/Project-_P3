<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminController;


Route::get('/', fn()=>view('welcome'));


Route::get('/login-siswa',[AuthController::class,'loginSiswaForm']);
Route::post('/login-siswa',[AuthController::class,'loginSiswa']);


Route::get('/login-admin',[AuthController::class,'loginAdminForm']);
Route::post('/login-admin',[AuthController::class,'loginAdmin']);


Route::get('/logout',[AuthController::class,'logout']);


Route::get('/dashboard-siswa',[AspirasiController::class,'dashboard']);
Route::get('/form-aspirasi',[AspirasiController::class,'create']);
Route::post('/aspirasi',[AspirasiController::class,'store']);


Route::get('/dashboard-admin',[AdminController::class,'dashboard']);
Route::post('/feedback',[AdminController::class,'feedback']);
Route::get('/selesai/{id}',[AdminController::class,'selesai']);