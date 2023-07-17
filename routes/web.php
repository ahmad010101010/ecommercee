<?php

use App\Http\Controllers\Admin\BranController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashbardeController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\DeleteOneImage;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Product_Images;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();



//front_end
Route::get('/',[FrontendController::class,'index']);


    //admin
Route::prefix('adminq')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashbardeController::class, 'index']);
    //categories
    Route::resource('/categories',CategoryController::class);
    //product
    Route::get('/get-prands', [productController::class,'getPrands'])->name('getPrands');
    Route::get('/product/deleteiamge/{product}',[productController::class,'DeleteOneImage'])->name('deleteOneImage');
    Route::resource('/product',productController::class);
    //Brands
    Route::resource('/brands',BranController::class);

});




