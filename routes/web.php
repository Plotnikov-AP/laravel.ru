<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;                                                              
use App\Models\Counter;                                                                   
use App\Http\Controllers\MainController;                                                  
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ChatLikeController;



Route::get('/', function () {
    return redirect()->route('main');;
});
Route::get('/main', [MainController::class, 'main'])->name('main');                                         
Route::get('/pyatnashki', [MainController::class, 'pyatnashki'])->name('pyatnashki');
Route::get('/chats', [MainController::class, 'chats'])
->middleware('auth')
->name('chats');
Route::get('/chats/{id}', [MainController::class, 'chat'])
->middleware('auth')
->name('chat');
Route::post('/chats/add_chat', [MainController::class, 'add_chat']);
Route::post('/chats/add_comment', [MainController::class, 'add_comment']);
Route::post('/chats/del_comment/{id}', [MainController::class, 'del_comment']);           
// Route::get('/testworks', [MainController::class, 'testWorks'])->name('testworks');        
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
