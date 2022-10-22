<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ReserveController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/', [ShopController::class, 'index']);
Route::post('/', [ShopController::class, 'search']);
Route::POST('/favorite', [FavoriteController::class, 'like']);
Route::post('/delete', [FavoriteController::class, 'remove']);


Route::GET('/detail', [DetailController::class, 'detail']);
Route::POST('/done', [ReserveController::class, 'create']);


Route::get('/mypage', [FavoriteController::class, 'favorite']);
Route::POST('/remove', 
[ReserveController::class, 'delete']);
Route::POST('/update', [ReserveController::class, 'update']);


Route::get('/thanks', [ShopController::class, 'thanks']);



Route::get('/file', [ShopController::class, 'file']);
Route::post('/file', [ShopController::class, 'create']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
