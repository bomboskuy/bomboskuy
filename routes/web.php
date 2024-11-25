<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;

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
