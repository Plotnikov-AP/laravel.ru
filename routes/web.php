<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;                                                              
use App\Models\Counter;                                                                   
use App\Http\Controllers\MainController;                                                  
use App\Http\Controllers\BasketController;                                                
                                                                                          
                                                                                          
Route::get('/', [MainController::class, 'main']);                                         
Route::get('/author', [MainController::class, 'author'])->name('author');                 
Route::get('/testworks', [MainController::class, 'testWorks'])->name('testworks');        
Route::get('/shop', [MainController::class, 'shop'])
->middleware('auth')
->name('shop');                       
Route::get('/shop/product/{id}', [MainController::class, 'productId']);                   
Route::get('/basket/show', [BasketController::class, 'basket_show'])->name('basket_show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
