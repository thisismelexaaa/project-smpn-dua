<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.index');
});

Auth::routes();

Route::get('/panel/admin/dashboard', [HomeController::class, 'index'])->name('home');

// logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
