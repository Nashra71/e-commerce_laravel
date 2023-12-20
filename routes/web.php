<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('/product',[PagesController::class,'product'])->name('product');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');

Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/product',[AdminController::class,'manage_product'])->name('admin.products');

    Route::get('/product/create',[AdminController::class,'create'])->name('admin.product.create');
    Route::Post('/product/store',[AdminController::class,'store'])->name('admin.product.store');

    Route::get('/product/edit/{id}',[AdminController::class,'edit'])->name('admin.product.edit');
    Route::Post('/product/update/{id}',[AdminController::class,'update'])->name('admin.product.update');
    Route::delete('/product/delete/{id}',[AdminController::class,'delete'])->name('admin.product.delete');

});

