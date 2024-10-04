<?php

use App\Livewire\ProductPage;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::view('/', 'shop')->name('shop');

Route::view('/category/{slug}', 'shop')->name('category');

Route::view('/product/{slug}', 'product')->name('product');