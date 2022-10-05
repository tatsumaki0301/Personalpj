<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ReserveController;



Route::get('/', [ShopController::class, 'index']);
Route::post('/', [ShopController::class, 'search']);
Route::POST('/favorite', [FavoriteController::class, 'like']);
Route::post('/delete', [FavoriteController::class, 'remove']);


Route::GET('/detail', [DetailController::class, 'detail']);
Route::POST('/done', [ReserveController::class, 'create']);


Route::get('/mypage', [FavoriteController::class, 'favorite']);
Route::POST('/remove', 
[ReserveController::class, 'delete']);


Route::get('/thanks', [ShopController::class, 'thanks']);



Route::get('/file', [ShopController::class, 'file']);
Route::post('/file', [ShopController::class, 'create']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';