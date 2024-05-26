<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Edition;

class HomeController extends Controller
{
    //

    public function dashboard()
    {
        $editions = Edition::all();
        $editionsMostRated = Edition::orderBy('rating', 'desc')->take(6)->get();

        return view('content.home.dashboard', compact('editions', 'editionsMostRated'));
    }

    public function welcome()
    {
        return view('content.home.welcome');
    }
}
