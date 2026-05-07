<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

// 1. Rute Dinamis (Mengambil data roti dari Database menggunakan Controller)
// - Rute untuk halaman utama (Bisa diakses semua orang)
Route::get('/', [ProductController::class, 'index']);
Route::get('/kategori', [ProductController::class, 'kategori']);
Route::get('/detail/{id}', [ProductController::class, 'detail']);

// - RUTE GUEST (Hanya bisa diakses kalau belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
    
// - RUTE BACKEND (Hanya bisa diakses kalau sudah login)
// 1. Rute Umum (Bisa diakses Admin & Kasir)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// 2. Rute Khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "<h1>Ini Halaman Admin</h1> <form action='".route('logout')."' method='POST'>".csrf_field()."<button type='submit'>Logout</button></form>";
    })->name('admin.dashboard');
    
    // Nanti rute tambah produk, edit produk, dll taruh di sini
});

// 3. Rute Khusus Kasir
Route::middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/kasir/dashboard', function () {
        return "<h1>Ini Halaman Kasir POS</h1> <form action='".route('logout')."' method='POST'>".csrf_field()."<button type='submit'>Logout</button></form>";
    })->name('kasir.dashboard');
    
    // Nanti rute proses transaksi offline, cetak struk, dll taruh di sini
});

// 2. Rute Statis (Hanya menampilkan view dasar, belum butuh data dari database)
Route::get('/about', function () {
    return view('about');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/custom-order', function () {
    return view('custom-order');
});