<?php

use Illuminate\Support\Facades\Route;


Route::livewire('/', 'front.home')->name('home');
Route::livewire('/login', 'front.auth.login')->name('login');
Route::livewire('/register', 'front.auth.register')->name('register');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

// require __DIR__.'/settings.php';
