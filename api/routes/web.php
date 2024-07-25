<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', [ImageController::class, 'upload']);
Route::get('/images', [ImageController::class, 'index']);

// Route::get('/product', [ProductController::class, 'store'])->name('product.store');
