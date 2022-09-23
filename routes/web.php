<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;


Route::get('/', [ShopController::class, 'index']);
Route::post('/', [ShopController::class, 'search']);

Route::get('/mypage', [FavoriteController::class, 'favorite']);
Route::post('/mypage', [FavoriteController::class, 'delete']);

Route::get('/done', [ShopController::class, 'done']);
Route::get('/thanks', [ShopController::class, 'thanks']);


Route::get('/file', [ShopController::class, 'file']);
Route::post('/file', [ShopController::class, 'create']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
