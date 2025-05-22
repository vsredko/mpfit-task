<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
Route::get('/', [ProductController::class, 'index']);

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/create', 'create')->name('products.create');
    Route::get('/products/{product:id}/edit',  'edit')->name('products.edit');
    Route::post('/products', 'store')->name('products.store');
    Route::patch('/products/{product:id}', 'update')->name('products.update');
    Route::delete('/products/{product:id}', 'destroy')->name('products.destroy');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders',  'index')->name('orders.index');
    Route::get('/orders/create',  'create')->name('orders.create');
    Route::get('/orders/{order:id}/edit',  'edit')->name('orders.edit');
    Route::post('/orders',  'store')->name('orders.store');
    Route::patch('/orders/{order:id}',  'update')->name('orders.update');
    Route::delete('/orders/{order:id}',  'destroy')->name('orders.destroy');
});

