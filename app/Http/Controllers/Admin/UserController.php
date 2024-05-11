<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(Request $request) {

        if ($request->ajax()) {
            $users = User::all();
            return response()->json($users);
        }

        return abort(404);
    }
    
}
