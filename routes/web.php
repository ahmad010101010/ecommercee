<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BranController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\frontend\StripePaymentController;



Auth::routes();



//front_end
Route::controller(FrontendController::class)->group(function(){
    Route::get('/','index')->name('main_page');
    //show singl product
    Route::get('/product/{slug}','show')->name('show_product');
    //show all product
    Route::get('products', 'products')->name('products');
    //show all category
    Route::get('categories', 'categories')->name('categories');
    //show product by category
    Route::get('categroies/{category_slug}','categories_product')->name('categories-producr');
});



//Cart route
Route::get('add-to-cart',[CartController::class,'addToCart'])->name('addToCart');

Route::middleware(['auth'])->group(function(){
Route::get('show-cart',[CartController::class,'show_cart'])->name('showCart');
Route::get('delete-cart{cart}',[CartController::class,'delete_cart'])->name('deleteCarte');
Route::get('cashondelivary/{total}',[CartController::class,'cashondelivary'])->name('cashOnDelivary');
Route::get('stripe/{total}',[StripePaymentController::class,'stripe'])->name('stripe');
Route::post('stripe/{total}',[StripePaymentController::class,'stripePost'])->name('stripe.post');
});



//admin
    Route::prefix('adminq')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashbardeController::class, 'index']);
        //categories
    Route::resource('/categories',CategoryController::class);
        //product
    Route::get('get-prands/', [productController::class,'getPrands'])
    ->name('getPrands');//ajax filter
    Route::get('/product/deleteiamge/{product}',[productController::class,'DeleteOneImage'])
    ->name('deleteOneImage');//delete one form multiple images for product
    Route::resource('/product',productController::class);
        //Brands
    Route::resource('/brands',BranController::class);
    //orders
    Route::controller(OrderController::class)->group(function(){
        Route::get('Orders','index')->name('Orders');
        Route::get('OrdersShow/{id}','show')->name('showOrderItem');
        Route::put('OrdersShip/{id}','srdersship')->name('OrdersShip');
        Route::get('invoice/{id}','invoice')->name('invoice');
        Route::get('invoice/{orderId}/mail','invoice_mail')->name('invoice_mail');
    });






});




