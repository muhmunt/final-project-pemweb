<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix'=>'products'], function(){
    Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
    Route::post('/', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');

    Route::get('/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
    Route::post('/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');

    Route::get('/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
});

Route::group(['prefix'=>'transaction'], function(){
    Route::get('/', [App\Http\Controllers\TransactionController::class, 'store'])->name('transaction');
    Route::get('/list', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.list');
    Route::post('/buy', [App\Http\Controllers\TransactionController::class, 'buy'])->name('transaction.buy');
    Route::get('/report', [App\Http\Controllers\TransactionController::class, 'report'])->name('transaction.report');
});
Route::group(['prefix'=>'cart'], function(){
    Route::get('/', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/', [App\Http\Controllers\CartController::class, 'add'])->name('add.to.cart');
    Route::get('/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart_destroy');
});
