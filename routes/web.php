<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::livewire('/', 'front.home')->name('home');
Route::livewire('/login', 'front.auth.login')->name('login');
Route::livewire('/register', 'front.auth.register')->name('register');

Route::livewire('/shoping-cart', 'shopping-cart')->name('shopping-cart');

Route::middleware('auth')->group(function(){
    
    Route::livewire('/shipping-address', 'front.shipping-address')->name('shipping-address');
    Route::livewire('order-success', 'front.order-placed')->name('order-success');
    
    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        Route::livewire('/', 'dashboard.home')->name('home');
        Route::livewire('/categories', 'dashboard.category')->name('categories');
        Route::livewire('/categories/{category}', 'dashboard.category.view')->name('categories.view');
        Route::livewire('/districts', 'dashboard.distritos')->name('districts');
        Route::livewire('/products', 'dashboard.product')->name('products');
        Route::livewire('/products/{product}', 'dashboard.product.view')->name('products.view');
        Route::livewire('/product-stocks', 'dashboard.stock')->name('stocks');
        Route::livewire('/suppliers', 'dashboard.supplier')->name('suppliers');
        Route::livewire('/users', 'dashboard.users')->name('users');
    });

    Route::get('logout', function(){
        Auth::logout(); 
        
        return redirect()->route('home');
    })->name('logout');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::view('dashboard', 'dashboard')->name('dashboard');
// });

// require __DIR__.'/settings.php';
