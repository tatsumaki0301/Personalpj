<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


Route::get('/', [ShopController::class, 'index']);
Route::post('/', [ShopController::class, 'search']);

Route::get('/done', [ShopController::class, 'done']);
Route::get('/thanks', [ShopController::class, 'thanks']);


Route::get('/file', [ShopController::class, 'file']);
Route::post('/file', [ShopController::class, 'create']);
