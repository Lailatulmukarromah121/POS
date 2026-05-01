<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;

/**
 * ==========================================
 * POS (Point of Sales) Routes
 * ==========================================
 */

// Halaman Utama / Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Kategori Produk
Route::get('/category/{category}', [ProductController::class, 'showByCategory'])->name('products.category');

// Halaman Profil User
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile'])->name('user.profile');

// Halaman Penjualan / Sales
Route::get('/sales', [SalesController::class, 'index'])->name('sales');