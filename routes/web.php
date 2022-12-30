<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Person\PersonController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\StripeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PersonMiddleware;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailler;



Route::get('/', [ShopController::class, 'index']);
Route::post('/', [ShopController::class, 'search']);
Route::post('/favorite', [FavoriteController::class, 'like']);
Route::post('/delete', [FavoriteController::class, 'remove']);


Route::get('/detail', [DetailController::class, 'detail']);
Route::post('/done', [ReserveController::class, 'create']);
Route::post('/review/evaluation',[ReviewController::class, 'review']);


Route::get('/mypage', [FavoriteController::class, 'favorite']);
Route::post('/remove', [ReserveController::class, 'delete']);
Route::post('/update', [ReserveController::class, 'update']);


Route::get('/thanks', [ShopController::class, 'thanks']);


Route::get('/qrcode', [QrCodeController::class, 'index']);
Route::get('/qrcodeview', [QrCodeController::class, 'show']);


Route::post('/review', [ReviewController::class, 'index']);
Route::post('/review/star', [ReviewController::class, 'create']);
Route::get('/verror', [ReviewController::class, 'verror']);


Route::get('/admin/dashboard', [AdminController::class,'index'])->middleware(AdminMiddleware::class);
Route::post('/admin/create', [AdminController::class, 'create']);
Route::post('/admin/update', [AdminController::class, 'update']);
Route::post('/admin/delete', [AdminController::class, 'delete']);
Route::get('/admin/users', [AdminController::class, 'show_users']);

Route::post('/person/shop_update', [PersonController::class, 'update']);
Route::post('/person/shop_create', [PersonController::class, 'create']);

Route::get('/mail/send', [MailController::class, 'send']);
Route::post('/mail/reservemail', [MailController::class, 'reservemail']);

Route::get('/mail', function() {
    $mail_text = "メールテストで使いたい文章";
    Mail::to('to_address@exanple.com')->send(new Mailler($mail_text));
});


Route::get('/subscription', [StripeController::class, 'index']);
Route::post('/subscription/afterpay', [StripeController::class, 'afterpay']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
        Route::get('login',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class,'create'])->name('login');
        Route::post('admin/login',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class,'store'])->name('adminlogin');
    });
    Route::post('logout',[App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');
});

Route::namespace('Person')->prefix('person')->name('person.')->group(function(){
    Route::namespace('Auth')->group(function(){
        Route::get('login',[App\Http\Controllers\Person\Auth\AuthenticatedSessionController::class,'create'])->name('login');
        Route::post('person/login',[App\Http\Controllers\Person\Auth\AuthenticatedSessionController::class,'store'])->name('personlogin');
        Route::post('/person/dashboard', [PersonController::class,'index'])->middleware(PersonMiddleware::class);
    });
    Route::post('logout',[App\Http\Controllers\Person\Auth\AuthenticatedSessionController::class,'destroy'])->name('logout');
});






