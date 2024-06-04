<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/count', [CounterController::class, 'getAllCount']);
Route::get('//shop/product/{id}', [ProductController::class, 'showProductDetail']);
Route::get('//basket/add/{product_id}', [BasketController::class, 'Add']);
Route::get('//basket/del/{product_id}', [BasketController::class, 'del']);
Route::get('//basket/get', [BasketController::class, 'get']);
Route::get('//basket/count', [BasketController::class, 'count']);

