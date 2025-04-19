<?php

use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('public/home');
})->name('home');

Route::get('/deals', function () {
    return view('public/deals');
})->name('deals');



    Route::get('/dashboard', function () {
        return view('investor/dashboard');
    })->name('investor.dashboard');

    Route::get('/portfolio', function () {
        return view('investor.portfolio');
    })->name('investor.portfolio');

    Route::get('/chat', function () {
        return view('investor.chat');
    })->name('investor.chat');

    Route::get('/settings', function () {
        return view('investor.settings');
    })->name('investor.settings');


// Authentication routes (simplified)
Route::get('/login', function () {
    return view('public.sign_in');
})->name('login');

Route::post('/logout', function () {
    return redirect('/');
})->name('logout');
