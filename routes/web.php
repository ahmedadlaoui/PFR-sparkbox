<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StartupController;
use App\Http\Middleware\RoleMiddleware;




route::get('/',[StartupController::class,'renderHomePage'])->name('home');

Route::get('/deals', [StartupController::class, 'RenderDealsPage'])->name('deals');
Route::get('/startups/json/{filterParam?}', [StartupController::class, 'GetAllStartupsJson'])->name('startups.json');
Route::get('/startups/search/{SearchValue}', [StartupController::class, 'SearchStartups'])->name('startups.json.search');
Route::get('deal_details/{id}', [StartupController::class, 'GetstartupDetails'])->name('details');
Route::get('/login', function () {
    return view('public.sign_in');
})->name('login');
Route::post('/login', [Authcontroller::class, 'Sign_In'])->name('login.submit');
Route::get('/register', function () {
    return view('public.sign_up');
})->name('show.register');
Route::post('/register', [Authcontroller::class, 'Sign_Up'])->name('register.submit');



Route::middleware('auth')->group(function () {

    //entrepreneur
    Route::middleware([RoleMiddleware::class, 'entrepreneur'])->group(function () {
        route::get('/mystartup', [StartupController::class, 'GetStartupInfos'])->name('entreprenor.mystartup');
        route::post('/mystartup', [StartupController::class, 'RegsiterStartup'])->name('entreprenor.registerstartup');
        route::delete('/mystartup', [StartupController::class, 'DeleteStartup'])->name('entreprenor.deletestartup');
        route::post('/mystartup/update', [StartupController::class, 'UpdateStartup'])->name('entreprenor.updatestartup');
        route::get('/investors', [OfferController::class, 'GetStartupInvestors'])->name('entreprenor.investors');
        route::post('/investors', [ConversationController::class, 'AddConversation'])->name('add.conversation');
        route::patch('/investors', [OfferController::class, 'UpdateOfferStatus'])->name('UpdateStatus');
    });

    //investor routes
    Route::middleware([RoleMiddleware::class, 'investor'])->group(function () {
        Route::Post('/deal_details/{id}', [OfferController::class, 'CreateOffer'])->name('add.offer');
        Route::get('/dashboard', [OfferController::class, 'GetMyoffers'])->name('investor.dashboard');
        route::post('/dashboard', [ConversationController::class, 'AddConversation'])->name('add.conv');
        route::delete('/dashboard', [OfferController::class, 'DeleteOffer'])->name('delete.offer');
    });

    //common routes
    Route::delete('/conversations/{conversation_id}', [ConversationController::class, 'deleteConversation'])->name('chat.delete');
    Route::get('/conversations/{id}/messages', [MessageController::class, 'getMessages'])->name('messages.get');
    Route::get('/chat', [ConversationController::class, 'GetConversations'])->name('chat');
    Route::post('/messages', [MessageController::class, 'sendMessage'])->name('messages.send');
    Route::get('/settings', [ConversationController::class, 'RenderSettingsPage'])->name('settings');
    Route::POST('/settings', [ProfileController::class, 'EditProfile'])->name('edit.profile');
    Route::post('/logout', [Authcontroller::class, 'Sign_Out'])->name('logout.submit');
});

Route::fallback(function () {
    abort(404);
});
