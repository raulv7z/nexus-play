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

    public function index()
    {
        $tablesInfo = [
            [
                'name' => 'Users',
                'table' => 'users',
                'description' => 'List of users currently registered',
                'route' => 'admin.users.manager'
            ],
        ];

        return view('admin.dashboard', compact('tablesInfo'));
    }

    // Métodos adicionales para cada tipo de CRUD

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users.manager', compact('users'));
    }

    public function managePlatformGroups()
    {
        $platformGroups = PlatformGroup::all();
        return view('admin.platform-groups.manager', compact('platformGroups'));
    }

    public function managePlatforms()
    {
        $platforms = Platform::all();
        return view('admin.platforms.manager', compact('platforms'));
    }

    public function manageEditions()
    {
        $editions = Edition::all();
        return view('admin.editions.manager', compact('editions'));
    }

    public function manageGames()
    {
        $games = Videogame::all();
        return view('admin.videogames.manager', compact('games'));
    }
}
