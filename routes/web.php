<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{products}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{products}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::resource('orders', OrderController::class);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{orders}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{orders}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{orders}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{orders}', [OrderController::class, 'destroy'])->name('orders.destroy');

Route::resource('customers', CustomerController::class);
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers/{customers}', [CustomerController::class, 'show'])->name('customers.show');
Route::get('/customers/{customers}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customers/{customers}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customers/{customers}', [CustomerController::class, 'destroy'])->name('customers.destroy');