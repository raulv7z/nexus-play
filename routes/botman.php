<?php

//! Config
///////////////////////////////////////////////////////////////////

// BotMan Controller



// Other includes

use Illuminate\Support\Facades\Route;

//! Routes
///////////////////////////////////////////////////////////////////

Route::get('/botman/chat-widget', function () {
    return view('partials.botman.chat-widget');
});

Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');
