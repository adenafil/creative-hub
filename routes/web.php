<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;



Route::controller(HomeController::class)->group(function () {
   Route::get('/', 'index');
});

//Route::get('admin/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/transactions');

    Route::controller(ProductController::class)->group(function () {
       Route::get('/admin/products','index')->name('product.index');
       Route::get('/admin/products/create','create');
       Route::get('/admin/products/edit','edit');
    });

    Route::controller(ProductOrderController::class)->group(function () {
        Route::get('/admin/product_orders', 'index')->name('product.order.index');
        Route::get('/admin/product_orders/details', 'detail')->name('product.order.detail');
    });

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/admin/transactions', 'index')->name('transaction.index');
        Route::get('/admin/transactions/details', 'detail')->name('transaction.detail');
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
