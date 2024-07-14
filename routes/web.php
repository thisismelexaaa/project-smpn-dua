<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ekskulController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kritikDanSaranController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PersonilController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/galleries', [LandingPageController::class, 'galleries'])->name('galleries');
Route::get('/berita', [LandingPageController::class, 'berita'])->name('berita');
Route::get('/prestasi', [LandingPageController::class, 'prestasi'])->name('prestasi');
Route::get('/personil', [LandingPageController::class, 'personil'])->name('personil');
Route::get('/profile', [LandingPageController::class, 'profile'])->name('profile');
Route::get('/ekskul', [LandingPageController::class, 'ekskul'])->name('ekskul');
Route::post('/kritik-dan-saran', [LandingPageController::class, 'kritikDanSaran'])->name('kritikDanSaran.store');
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
    Route::resource('/masukan', kritikDanSaranController::class);
    Route::resource('/ekskul', ekskulController::class);
    Route::resource('/setting', SettingController::class);
});
