<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminProductController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;


Route::get('/',[PagesController::class,'index' ])->name('index');
Route::get('/contact',[PagesController::class,'contact'])->name('contact');

// products for user side
Route::get('/product',[ProductController::class,'index'])->name('product');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('products.show');
Route::get('/search',[PagesController::class,'search'])->name('search');



// Admin Routes
Route::group(['prefix'=>'admin'],function(){

    Route::get('/',[AdminController::class,'index'])->name('admin.index');

    // Product Routes
    Route::group(['prefix'=>'/product'],function(){

    Route::get('/',[AdminProductController::class,'index'])->name('admin.product');
    Route::get('/create',[AdminProductController::class,'create'])->name('admin.product.create');
    Route::Post('/store',[AdminProductController::class,'store'])->name('admin.product.store');

    Route::get('/edit/{id}',[AdminProductController::class,'edit'])->name('admin.product.edit');
    Route::Post('/update/{id}',[AdminProductController::class,'update'])->name('admin.product.update');
    Route::post('/delete/{id}',[AdminProductController::class,'delete'])->name('admin.product.delete');

});
 // category Routes
 Route::group(['prefix'=>'/categories'],function(){

    Route::get('/',[CategoryController::class,'index'])->name('admin.categories');
    Route::get('/create',[CategoryController::class,'create'])->name('admin.categories.create');
    Route::Post('/store',[CategoryController::class,'store'])->name('admin.categories.store');

    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('admin.categories.edit');
    Route::Post('/update/{id}',[CategoryController::class,'update'])->name('admin.categories.update');
    Route::post('/delete/{id}',[CategoryController::class,'delete'])->name('admin.categories.delete');

});
});


// Route::get('/product/create',[AdminController::class,'create'])->name('admin.product.create');
// Route::Post('/product/store',[AdminController::class,'store'])->name('admin.product.store');

// Route::get('/product/edit/{id}',[AdminController::class,'edit'])->name('admin.product.edit');
// Route::Post('/product/update/{id}',[AdminController::class,'update'])->name('admin.product.update');
// Route::delete('/product/delete/{id}',[AdminController::class,'delete'])->name('admin.product.delete');
