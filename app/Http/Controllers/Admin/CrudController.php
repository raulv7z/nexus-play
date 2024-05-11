<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class CrudController extends Controller
{
    //

    public function users(Request $request) {
        if ($request->ajax()) {
            $users = User::all();
            return response()->json($users);
        }
    
        abort(404);
    }



}
