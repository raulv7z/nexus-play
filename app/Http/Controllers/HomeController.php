<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;

class HomeController extends Controller
{
    //

    public function dashboard()
    {
        $title = 'Home';
        $breadcrumbs = [];

        return view('content.home.dashboard', compact('title', 'breadcrumbs'));
    }

    public function welcome()
    {
        $title = 'Welcome';
        $breadcrumbs = [];

        return view('content.home.welcome', compact('title', 'breadcrumbs'));
    }
}
