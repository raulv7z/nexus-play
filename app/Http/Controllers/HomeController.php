<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Mail;    //!
use App\Mail\InvoiceEmail;              //!

class HomeController extends Controller
{
    //

    public function dashboard()
    {
        $title = 'Home';
        $breadcrumbs = [];

        Mail::raw('Esto es una prueba de correo electrónico', function ($message) {
            $message->to('raulzks0@gmail.com')
                ->subject('Correo de prueba');
        });

        return view('content.home.dashboard', compact('title', 'breadcrumbs'));
    }

    public function welcome()
    {
        $title = 'Welcome';
        $breadcrumbs = [];

        return view('content.home.welcome', compact('title', 'breadcrumbs'));
    }
}
