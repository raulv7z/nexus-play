<?php

//! Config
///////////////////////////////////////////////////////////////////

// BotMan Controller

use App\Http\Controllers\BotManController;

// Other includes

use Illuminate\Support\Facades\Route;

//! Routes
///////////////////////////////////////////////////////////////////

Route::get('/botman/chat-widget', function () {
    return view('partials.botman.chat-widget');
});

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
