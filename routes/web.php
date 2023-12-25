<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;

Route::get('/',[PagesController::class,'index'])->name('index');
Route::get('/product',[PagesController::class,'product'])->name('product');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');


// Admin Routes
Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');

    // Product Routes
    Route::group(['prefix'=>'product'],function(){

    Route::get('/',[AdminProductController::class,'index'])->name('admin.product');
    Route::get('/create',[AdminProductController::class,'create'])->name('admin.product.create');
    Route::POST('/store',[AdminProductController::class,'store'])->name('admin.product.store');

    Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('admin.product.edit');
    Route::POST('/update/{id}',[AdminProductController::class,'update'])->name('admin.product.update');
    Route::post('/delete/{id}',[AdminProductController::class,'delete'])->name('admin.product.delete');

});
});


//     Route::get('/product/create',[AdminController::class,'create'])->name('admin.product.create');
// Route::Post('/product/store',[AdminController::class,'store'])->name('admin.product.store');

// Route::get('/product/edit/{id}',[AdminController::class,'edit'])->name('admin.product.edit');
// Route::Post('/product/update/{id}',[AdminController::class,'update'])->name('admin.product.update');
// Route::delete('/product/delete/{id}',[AdminController::class,'delete'])->name('admin.product.delete');
