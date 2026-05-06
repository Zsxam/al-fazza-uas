<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/custom-order', function () {
    return view('custom-order');
});

Route::get('/detail', function () {
    return view('detail');
});
