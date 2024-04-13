<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
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



Route::post('/add_cart/{id}',[ShopController::class,'add_cart'])->name('add_cart');
Route::get('/cart-products',[ShopController::class,'show_cart'])->name('user.cart');
Route::get('/remove-cart/{id}',[ShopController::class,'remove_cart'])->name('remove_cart');
Route::get('/cash_order',[ShopController::class,'cash_order'])->name('cash_order');
Route::get('/stripe{totalprice}',[ShopController::class,'stripe'])->name('stripe');
Route::post('/stripe{totalprice}',[ShopController::class,'stripePost'])->name('stripe.post');



Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('add-to-cart/{slug}',[CartController::class,'addToCart'])->name('add-cart');
Route::get('/remove/{slug}',[CartController::class,'remove'])->name('remove');

Route::middleware(\App\Http\Middleware\Authenticate::class)->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware([\App\Http\Middleware\Authenticate::class,\App\Http\Middleware\AuthAdmin::class])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});


Route::get('/list',[AdminController::class,'createproduct'])->name('create.product');
Route::post('/products',[AdminController::class,'storeproduct'])->name('products.store');
Route::get('/p-list',[AdminController::class,'showproduct'])->name('show.plist');
Route::get('/p-edit/{product}',[AdminController::class,'editproduct'])->name('admin.pedit');
Route::put('/p-update/{product}',[AdminController::class,'updateproduct'])->name('admin.pupdate');
Route::delete('/p-delete/{product}',[AdminController::class,'destroyproduct'])->name('admin.pdelete');



Route::get('/catlist', [CategoryController::class, 'ccreate'])->name('create.category');
Route::post('/category',[CategoryController::class,'storecat'])->name('category.store');
Route::get('/c-list',[CategoryController::class,'showcat'])->name('show.clist');
Route::get('/c-edit/{product}', [CategoryController::class, 'editcat'])->name('admin.cedit');
Route::put('/c-update/{product}',[CategoryController::class,'updatecat'])->name('admin.cupdate');
Route::delete('/c-delete/{id}',[CategoryController::class,'destroycat'])->name('admin.cdelete');


Route::get('/brandlist',[BrandController::class,'bcreate'])->name('create.brand');
Route::post('/brands',[BrandController::class,'storebrand'])->name('brand.store');
Route::get('/b-list',[BrandController::class,'showbrand'])->name('show.blist');
Route::get('/b-edit/{product}',[BrandController::class,'editb'])->name('admin.bedit');
Route::put('/b-update/{product}',[BrandController::class,'updateb'])->name('admin.bupdate');
Route::delete('/b-delete/{id}',[BrandController::class,'destroyb'])->name('admin.bdelete');







Auth::routes();


