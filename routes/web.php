<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Counter;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;


Route::get('/', [MainController::class, 'main']);
Route::get('/main', [MainController::class, 'main'])->name('main');
Route::get('/author', [MainController::class, 'author'])->name('author');
Route::get('/testworks', [MainController::class, 'testWorks'])->name('testworks');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::get('/shop/product/{id}', [MainController::class, 'productId']);
Route::get('/basket/show', [BasketController::class, 'basket_show'])->name('basket_show');



