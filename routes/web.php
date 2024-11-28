<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;  // Jika menggunakan DashboardController
use App\Http\Controllers\UserController;       // Pastikan sudah ada controller UserController

Route::prefix('dashboard')
    ->middleware(['auth', 'admin']) // Gunakan alias 'admin' untuk middleware CheckAdmin
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('main'); // Halaman utama dashboard
        Route::resource('users', UserController::class); // Resource controller untuk users
    });

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layouts.main');
});

//register

Route::get('/register', function () {
    return view('auth.register');
})->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

