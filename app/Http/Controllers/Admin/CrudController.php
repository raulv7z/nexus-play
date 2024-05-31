<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Videogame;
use Carbon\Carbon;

class CrudController extends Controller
{
    //

    public function users(Request $request) {
        if ($request->ajax()) {
            $users = User::withTrashed()->get();
            return response()->json($users);
        }
    
        abort(404);
    }

    public function videogames(Request $request) {

        if ($request->ajax()) {
            $videogames = Videogame::withTrashed()->get();
            return response()->json($videogames);
        }
    
        abort(404);
    }

}
