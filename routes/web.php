<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', function () {
    return view('public/home');
})->name('home');

Route::get('/deals', function () {
    return view('public/deals');
})->name('deals');







Route::get('/mystartup', function () {
    return view('entreprenor/mystartup');
})->name('entreprenor.mystartup');

Route::get('/investors', function () {
    return view('entreprenor/investors');
})->name('entreprenor.investors');

Route::get('/en_chat', function () {
    return view('entreprenor/en_chat');
})->name('entreprenor.chat');

Route::get('/en_settings', function () {
    return view('entreprenor/en_settings');
})->name('entreprenor.en_settings');



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






Route::get('/login', function () {
    return view('public.sign_in');
})->name('login');


Route::get('/register', function (){return view('public.sign_up');});
Route::post('/register', [Authcontroller::class, 'Sign_Up'])->name('register.submit');
Route::post('/login', [Authcontroller::class, 'Sign_In'])->name('login.submit');

Route::post('/logout', function () {
    return redirect('/');
})->name('logout');
