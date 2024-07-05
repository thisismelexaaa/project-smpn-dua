<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingpage.index');
});

Auth::routes();

Route::get('/panel/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
