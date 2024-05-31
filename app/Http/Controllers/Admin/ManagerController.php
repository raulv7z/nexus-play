<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Edition;
use App\Models\Platform;
use App\Models\PlatformGroup;
use App\Models\User;

class ManagerController extends Controller
{

    // Métodos adicionales para cada tipo de CRUD

    public function manageUsers()
    {
        $users = User::withTrashed()->get();
        return view('content.admin.users.manager', compact('users'));
    }

    public function manageVideogames()
    {
        $videogames = User::withTrashed()->get();
        return view('content.admin.videogames.manager', compact('videogames'));
    }

}
