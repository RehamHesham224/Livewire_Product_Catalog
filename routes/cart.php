<?php

use App\Http\Controllers\CartController;
use App\Http\Livewire\Cart\CartPage;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/cart',CartPage::class)->name('cart.index');
//    Route::get('/add-to-cart/{product}', [CartController::class, 'add'])->name('cart.add');
//    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//    Route::get('/cart/destroy/{itemId}', [CartController::class, 'destroy'])->name('cart.destroy');
//    Route::get('/cart/update/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});
