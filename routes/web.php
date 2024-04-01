<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;

if( ini_get( 'wincache.ocenabled' ) )
{
    ini_set( 'wincache.ocenabled', '0' );
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');

Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('add-to-cart/{slug}',[CartController::class,'addToCart'])->name('add-cart');
Route::get('/remove/{slug}',[CartController::class,'remove'])->name('remove');

Route::middleware(\App\Http\Middleware\Authenticate::class)->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware([\App\Http\Middleware\Authenticate::class,\App\Http\Middleware\AuthAdmin::class])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});



Route::post('/products',[AdminController::class,'store'])->name('products.store');
Route::get('/list',[AdminController::class,'showlist'])->name('show.list');
Route::get('/edit/{product}',[AdminController::class,'edit'])->name('admin.edit');
Route::put('/update/{product}',[AdminController::class,'update'])->name('admin.update');
Route::delete('/delete/{product}',[AdminController::class,'delete'])->name('admin.delete');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
