<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
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

    // Rute untuk ProductController
    Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index');
    Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('create.product');
    Route::post('/admin/products/create', [ProductController::class, 'doCreate'])->name('doCreate.product');
    Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/admin/products/edit/{id}', [ProductController::class, 'doEdit'])->name('product.update');

    // Rute untuk ProductOrderController
    Route::get('/admin/product_orders', [ProductOrderController::class, 'index'])->name('product.order.index');
    Route::get('/admin/product_orders/details', [ProductOrderController::class, 'detail'])->name('product.order.detail');

    // Rute untuk TransactionController
    Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/admin/transactions/details', [TransactionController::class, 'detail'])->name('transaction.detail');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Route::get('/file/{encoded}', function ($encoded) {
//    $decoded = base64_decode($encoded);
//    list($folder, $filename) = explode('/', $decoded);
//
//    $path = storage_path("app/product/pictures/{$folder}/{$filename}");
//
//    if (!File::exists($path)) {
//        abort(404);
//    }
//
//    $file = File::get($path);
//    $type = File::mimeType($path);
//
//    $response = Response::make($file, 200);
//    $response->header("Content-Type", $type);
//
//    return $response;
//})->name('file.view');

//Route::get('/file/{encoded}', function ($encoded) {
//    try {
//        $decoded = base64_decode($encoded);
//        $path = storage_path("app/product/pictures/{$decoded}");
//
//        if (!File::exists($path)) {
//            return response("File not found at path: $path", 404);
//        }
//
//        $file = File::get($path);
//        $type = File::mimeType($path);
//
//        $response = Response::make($file, 200);
//        $response->header("Content-Type", $type);
//
//        return $response;
//    } catch (\Exception $e) {
//        return response("Error decoding path: " . $e->getMessage(), 500);
//    }
//})->name('file.view');

Route::get('/file/{encoded}', [FileController::class, 'viewFile'])->name('file.view');

//Route::get('/tes', function () {
//    $encodedPath = base64_encode("37/cover_1717813678.png");
//    return \route('file.view', ['encoded' => $encodedPath]);
//});
//
Route::get('/test-encode', function () {
    $path = "cover_1717795197.png";
    $encodedPath = base64_encode($path);
    $decodedPath = base64_decode($encodedPath);

    return response()->json([
        'original' => $path,
        'encoded' => $encodedPath,
        'decoded' => $decodedPath,
    ]);
});

require __DIR__.'/auth.php';
