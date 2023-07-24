<?php

use App\Http\Controllers\Admin\BranController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbardeController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\DeleteOneImage;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\product;
use App\Models\Product_Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();



//front_end
Route::get('/',[FrontendController::class,'index'])->name('main_page');
//show singl product
Route::get('/product/{slug}',[FrontendController::class, 'show'])->name('show_product');
//show all product
Route::get('products',[FrontendController::class, 'products'])->name('products');
//show all category
Route::get('categories',[FrontendController::class, 'categories'])->name('categories');
//show product by category
Route::get('categroies/{category_slug}',[FrontendController::class,'categories_product'])->name('categories-producr');

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

});




