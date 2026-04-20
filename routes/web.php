<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::livewire('/', 'front.home')->name('home');
Route::livewire('/login', 'front.auth.login')->name('login');
Route::livewire('/register', 'front.auth.register')->name('register');

Route::middleware('auth')->group(function(){

    Route::prefix('dashboard')->name('dashboard.')->group(function(){
        Route::livewire('/', 'dashboard.home')->name('home');
        Route::livewire('/products', 'dashboard.product')->name('products');
        Route::livewire('/suppliers', 'dashboard.supplier')->name('suppliers');
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
