<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StartupController;

// Public routes
Route::get('/', function () {
    return view('public/home');
})->name('home');

Route::get('/deals', function () {
    return view('public/deals');
})->name('deals');
Route::get('/deal_details', function () {
    return view('public/deal_details');
});






//entrepreneur


route::get('/mystartup',[StartupController::class,'GetStartupInfos'])->name('entreprenor.mystartup');

Route::get('/investors', function () {
    return view('entreprenor/investors');
})->name('entreprenor.investors');


//investor
Route::get('/dashboard', function () {
    return view('investor/dashboard');
})->name('investor.dashboard');

Route::get('/portfolio', function () {
    return view('investor.portfolio');
})->name('investor.portfolio');


//common
Route::get('/chat', function () {
    return view('common/chat');
})->name('chat');

Route::get('/settings', function () {
    return view('common/settings');
})->name('settings');












Route::get('/login', function () {
    return view('public.sign_in');
})->name('login');


Route::get('/register', function (){return view('public.sign_up');})->name('show.register');
Route::post('/register', [Authcontroller::class, 'Sign_Up'])->name('register.submit');
Route::post('/login', [Authcontroller::class, 'Sign_In'])->name('login.submit');
Route::post('/logout', [Authcontroller::class, 'Sign_Out'])->name('logout.submit');



Route::POST('/settings',[ProfileController::class,'EditProfile'])->name('edit.profile');

