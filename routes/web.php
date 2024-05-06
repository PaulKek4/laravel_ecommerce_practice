<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class,'productdetails'])->name('shop.product.details');
Route::get('/contact-us',[Appcontroller::class,'contact_us'])->name('contact.us');
Route::get('/about-us',[Appcontroller::class,'about_us'])->name('about.us');


Route::middleware('auth')->group(function () {

    Route::get('/my-account',[UserController::class,'index'])->name('user.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart/store',[CartController::class,'addToCart'])->name('cart.store');

    Route::put('/cart/update',[CartController::class,'updateCart'])->name('cart.update');
    Route::delete('/cart/remove',[CartController::class,'removeItem'])->name('cart.remove');
    Route::delete('/cart/clear',[CartController::class,'clearCart'])->name('cart.clear');

    Route::post('/wishlist/add',[WishlistController::class,'addProductToWishlist'])->name('wishlist.store');

    Route::get('/checkout',[CartController::class,'addCheckout'])->name('checkout.index');
    });


Auth::routes();



Route::middleware(['auth','admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

    Route::get('/admin/product',[AdminController::class,'addProduct'])->name('product.index');
    Route::post('/admin/product/store',[AdminController::class,'storeProduct'])->name('product.store');
    Route::get('/admin/product/list',[AdminController::class,'productList'])->name('product.list');
    Route::get('/admin/product/remove/{id}',[AdminController::class,'removeProduct'])->name('remove.product');
    Route::get('/admin/product/edit/{id}',[AdminController::class,'editProduct'])->name('edit.product');
    Route::post('/admin/product/update',[AdminController::class,'updateProduct'])->name('update.product');

    Route::get('/admin/category',[AdminController::class,'addCategory'])->name('category.index');
    Route::post('/admin/category/store',[AdminController::class,'storeCategory'])->name('category.store');
    Route::get('/admin/category/list',[AdminController::class,'categoryList'])->name('category.list');
    Route::get('/admin/category/remove/{id}',[AdminController::class,'removeCategory'])->name('remove.category');
    Route::get('/admin/category/edit/{id}',[AdminController::class,'editCategory'])->name('edit.category');
    Route::post('/admin/category/update',[AdminController::class,'updateCategory'])->name('update.category');


    Route::get('/admin/brand',[AdminController::class,'addBrand'])->name('brand.index');
    Route::post('/admin/brand/store',[AdminController::class,'storeBrand'])->name('brand.store');
    Route::get('/admin/brand/list',[AdminController::class,'brandList'])->name('brand.list');
    Route::get('/admin/brand/remove/{id}',[AdminController::class,'removeBrand'])->name('remove.brand');
    Route::get('/admin/brand/edit/{id}',[AdminController::class,'editBrand'])->name('edit.brand');
    Route::post('/admin/brand/update',[AdminController::class,'updateBrand'])->name('update.brand');
});
