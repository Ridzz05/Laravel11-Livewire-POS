<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // redirect ke halaman login
    return redirect('login');
});

//group middleware
Route::middleware('auth')->group(function () {
    Route::get('/home')->name('home');
    Route::get('/profile')->name('home');
});

//middleware guest, sehingga kalau belum login tidak bisa akses halaman pada middleware auth
Route::middleware('guest')->group(function () {
    Route::get('/login')->name('login');
});
