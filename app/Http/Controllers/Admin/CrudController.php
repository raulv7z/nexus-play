<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Edition;
use App\Models\Platform;
use App\Models\PlatformGroup;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Videogame;
use Carbon\Carbon;

class CrudController extends Controller
{
    //

    public function tickets(Request $request) {
        
        if ($request->ajax()) {
            $tickets = Ticket::withTrashed()->with('ticketState')->get();
            return response()->json($tickets);
        }
    
        abort(404);
    }

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

    public function platformGroups(Request $request) { 

        if ($request->ajax()) {
            $platforms = PlatformGroup::withTrashed()->get();
            return response()->json($platforms);
        }
    
        abort(404);
    }

    public function platforms(Request $request) {
        if ($request->ajax()) {
            $platforms = Platform::withTrashed()->with('group')->get();

            return response()->json($platforms);
        }
    
        abort(404);
    }

    public function editions(Request $request) {
        if ($request->ajax()) {
            $editions = Edition::withTrashed()->with(['videogame', 'platform'])->get();
            return response()->json($editions);
        }
        abort(404);
    }
}
