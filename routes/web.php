<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;  
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;       

Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('main');  // Untuk halaman dashboard utama
    
    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);
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

Route::get('/userpage', function () {
    return view('userpage.layout.main');
});