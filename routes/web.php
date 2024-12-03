<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;  
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;      
use App\Http\Controllers\MenuController; 
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\CartController;

Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('main');  // Untuk halaman dashboard utama
    
    Route::resource('users', UserController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('produk', ProdukController::class);
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

Route::get('/userpage', [UserPageController::class, 'showProducts'])->name('produk.index');

//menu
Route::get('menus', [MenuController::class, 'index'])->name('menu.index');
Route::get('menus/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('menus', [MenuController::class, 'store'])->name('menu.store');
Route::get('menus/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('menus/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::post('menus/reorder', [MenuController::class, 'reorder'])->name('menu.reorder');


// Menambahkan produk ke keranjang
Route::get('/add-to-cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/update/{index}/{change}', [CartController::class, 'updateQuantity'])->name('cart.update');
