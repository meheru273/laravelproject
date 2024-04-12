<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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


Route::get('/list',[AdminController::class,'create'])->name('create.product');
Route::post('/products',[AdminController::class,'store'])->name('products.store');
Route::get('/p-list',[AdminController::class,'showlist'])->name('show.plist');
Route::get('/p-edit/{product}',[AdminController::class,'edit'])->name('admin.pedit');
Route::put('/p-update/{product}',[AdminController::class,'update'])->name('admin.pupdate');
Route::delete('/p-delete/{product}',[AdminController::class,'destroy'])->name('admin.pdelete');



Route::get('/catlist',[CategoryController::class,'create'])->name('create.category');
Route::post('/category',[CategoryController::class,'store'])->name('category.store');
Route::get('/c-list',[CategoryController::class,'showlist'])->name('show.clist');
Route::get('/c-edit/{product}',[CategoryController::class,'edit'])->name('admin.cedit');
Route::put('/c-update/{product}',[CategoryController::class,'update'])->name('admin.cupdate');
Route::delete('/c-delete/{id}',[CategoryController::class,'destroy'])->name('admin.cdelete');


Route::get('/brandlist',[CategoryController::class,'bcreate'])->name('create.brand');
Route::post('/brands',[CategoryController::class,'store'])->name('brand.store');
Route::get('/b-list',[CategoryController::class,'showlist'])->name('show.blist');
Route::get('/b-edit/{product}',[CategoryController::class,'edit'])->name('admin.bedit');
Route::put('/b-update/{product}',[CategoryController::class,'update'])->name('admin.bupdate');
Route::delete('/b-delete/{id}',[CategoryController::class,'destroy'])->name('admin.bdelete');







Auth::routes();


