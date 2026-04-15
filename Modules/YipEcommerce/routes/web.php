<?php

use Illuminate\Support\Facades\Route;
use Modules\YipEcommerce\Http\Controllers\ProductController;
use Modules\YipEcommerce\Http\Controllers\CartController;
use Modules\YipEcommerce\Http\Controllers\CheckoutController;
use Modules\YipEcommerce\Http\Controllers\Admin\OrderController;

Route::get('/products', [ProductController::class, 'index'])->name('home');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');    
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

// Admin Routes (Protected)
Route::prefix('admin')->middleware(['web', \Modules\YipEcommerce\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/orders', [\Modules\YipEcommerce\Http\Controllers\Admin\OrderController::class, 'index'])
        ->name('admin.orders.index');
    
    Route::get('/orders/{order}', [\Modules\YipEcommerce\Http\Controllers\Admin\OrderController::class, 'show'])
        ->name('admin.orders.show');
    
    Route::patch('/orders/{order}/status', [\Modules\YipEcommerce\Http\Controllers\Admin\OrderController::class, 'updateStatus'])
        ->name('admin.orders.update-status');
});