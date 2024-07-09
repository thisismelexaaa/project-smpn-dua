<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PersonilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/galleries', [LandingPageController::class, 'galleries'])->name('galleries');
Route::get('/informasi', [LandingPageController::class, 'informasi'])->name('informasi');
Route::get('/profile', [LandingPageController::class, 'profile'])->name('profile');
Route::resource('/home', LandingPageController::class);

Auth::routes();

Route::get('/panel/admin/dashboard', [HomeController::class, 'index'])->name('home');


// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// prefix
Route::prefix('/panel/admin/')->group(function () {
    Route::resource('/personil', PersonilController::class);
    Route::resource('/berita', BeritaController::class);
    Route::resource('/galleries', GalleriesController::class);
});
