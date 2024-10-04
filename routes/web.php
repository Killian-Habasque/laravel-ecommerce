<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'shop')->name('shop');

Route::view('/category/{slug}', 'shop')->name('category');

Route::view('/product/{slug}', 'product')->name('product');