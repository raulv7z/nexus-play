<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Videogame;
use App\Models\Platform;
use App\Models\Edition;
use App\Models\Ticket;

class ManagerController extends Controller
{

    // Métodos adicionales para cada tipo de CRUD
    public function manageTickets()
    {
        $tickets = Ticket::withTrashed()->get();
        return view('content.admin.tickets.manager', compact('tickets'));
    }

    public function manageUsers()
    {
        $users = User::withTrashed()->get();
        return view('content.admin.users.manager', compact('users'));
    }

    public function manageVideogames()
    {
        $videogames = Videogame::withTrashed()->get();
        return view('content.admin.videogames.manager', compact('videogames'));
    }

    public function managePlatformGroups()
    {
        $platformGroups = Platform::withTrashed()->get();
        return view('content.admin.platform-groups.manager', compact('platformGroups'));
    }

    public function managePlatforms()
    {
        $platforms = Platform::withTrashed()->get();
        return view('content.admin.platforms.manager', compact('platforms'));
    }

    public function manageEditions()
    {
        $editions = Edition::withTrashed()->get();
        return view('content.admin.editions.manager', compact('editions'));
    }

}
