<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StartupController;

// Public routes
Route::get('/', function () {
    return view('public/home');
})->name('home');



Route::get('/deals',[StartupController::class,'GetAllStartups'])->name('deals');
Route::get('deal_details/{id}',[StartupController::class , 'GetstartupDetails'])->name('details');
Route::Post('/deal_details/{id}',[OfferController::class,'CreateOffer'])->name('add.offer');

//entrepreneur
route::get('/mystartup', [StartupController::class, 'GetStartupInfos'])->name('entreprenor.mystartup');
route::post('/mystartup', [StartupController::class, 'RegsiterStartup'])->name('entreprenor.registerstartup');
route::delete('/mystartup', [StartupController::class, 'DeleteStartup'])->name('entreprenor.deletestartup');
route::post('/mystartup/update', [StartupController::class, 'UpdateStartup'])->name('entreprenor.updatestartup');

Route::get('/investors', function () {
    return view('entreprenor/investors');
})->name('entreprenor.investors');

//investor

Route::get('/dashboard',[OfferController::class,'GetMyoffers'])->name('investor.dashboard');

Route::get('/portfolio', function () {
    return view('investor.portfolio');
})->name('investor.portfolio');


Route::get('/chat',[ConversationController::class,'GetConversations'])->name('chat');

Route::get('/settings', function () {
    return view('common/settings');
})->name('settings');

Route::get('/login', function () {
    return view('public.sign_in');
})->name('login');

Route::get('/register', function () {
    return view('public.sign_up');
})->name('show.register');
Route::post('/register', [Authcontroller::class, 'Sign_Up'])->name('register.submit');
Route::post('/login', [Authcontroller::class, 'Sign_In'])->name('login.submit');
Route::post('/logout', [Authcontroller::class, 'Sign_Out'])->name('logout.submit');

Route::POST('/settings', [ProfileController::class, 'EditProfile'])->name('edit.profile');
