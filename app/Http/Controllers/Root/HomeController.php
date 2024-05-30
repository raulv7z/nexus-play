<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Edition;
use App\Models\CartState;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request)
    {
        if ($request->user() && $request->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('root.dashboard');
        }
    }
}
