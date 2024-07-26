<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/product/{product_id}', [ProductController::class, 'get']);
Route::delete('/product/{product_id}', [ProductController::class, 'delete']);  
Route::patch('/product/{product_id}', [ProductController::class, 'update']);
Route::get('/product', [ProductController::class, 'getAll']);   
Route::post('/product', [ProductController::class, 'create']);

// Route::post('/upload', "App\Http\Controllers\FileController@upload");
// Route::get('/product', [ProductController::class, 'store'])->name('product.store');

Route::get('/category', [CategoryController::class, 'get']);
Route::get('/store', [StoreController::class, 'get']);




