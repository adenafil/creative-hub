<?php

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

use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);

Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');;
    Route::post('/login', 'doLogin');
});

Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
   Route::get('/register', 'register');
   Route::post('/register', 'doRegister');
});

Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
   Route::get('/home', 'home');
});
