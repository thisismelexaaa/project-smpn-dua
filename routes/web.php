<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.index');
});

Auth::routes();

Route::get('/panel/admin/dashboard', [HomeController::class, 'index'])->name('home');

// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('/panel/admin/personil', PersonilController::class);
Route::resource('/panel/admin/berita', BeritaController::class);
