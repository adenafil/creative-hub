<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
   Route::get('/', 'index')->name('home');
   Route::get('/products/{id}', 'products')->name('home.product.detail');
   Route::get('/products/{id}/checkout', 'checkout')->name('checkout');
   Route::get('//products/{id}/checkout/success', 'successCheckout')->name('success.checkout');
   Route::post('/products/{id}/checkout', 'doCheckout')->name('do.checkout');
});

Route::get('/kntl/{id}', function ($id) {
    return $id;
})->name('kntl');


//Route::get('admin/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {


    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Rute untuk ProductController
    Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('create.product');
    Route::post('/admin/products/create', [ProductController::class, 'doCreate'])->name('doCreate.product');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'doEdit'])->name('product.update');

    // Rute untuk ProductOrderController
    Route::get('/admin/product_orders', [ProductOrderController::class, 'index'])->name('product.order.index');
    Route::get('/admin/product_orders/details/{id}', [ProductOrderController::class, 'detail'])->name('product.order.detail');
    Route::post('/admin/product_orders/{id}', [ProductOrderController::class, 'doApproveOrDisapprove'])->name('product.approve.or.disapprove');

    // Rute untuk purchase
    Route::get('/admin/purchases', [TransactionController::class, 'index'])->name('purchases.index');
    Route::post('/admin/purchases/{id}', [TransactionController::class, 'doComment'])->name('purchases.comment.index');
    Route::get('/admin/purchases/details/{id}', [TransactionController::class, 'detail'])->name('purchases.detail');
    Route::get('/download', [TransactionController::class, 'doDownload'])->name('download.asset');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::patch('/payment-method', [PaymentMethodController::class, 'update'])->name('profile.payment.method.update');
});


Route::controller(FileController::class)->group(function () {
    Route::get('/file/product/{encoded}', [FileController::class, 'viewImageInProduct'])->name('file.view');
    Route::get('/file/profile/{encoded}', [FileController::class, 'viewImageInProfile'])->name('profile.file');
    Route::get('/file/payment_proof/{encoded}', [FileController::class, 'viewImagePaymetnProof'])->name('proof.file');
});


require __DIR__.'/auth.php';
