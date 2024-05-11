<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Edition;
use App\Models\Platform;
use App\Models\PlatformGroup;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        $cruds = [
            ['name' => 'Users', 'table' => 'users', 'description' => 'List of users currently registered', 'route' => 'admin.users.crud'],
            ['name' => 'Games', 'table' => 'videogames', 'description' => 'List of games currently registered', 'route' => 'admin.videogames.crud'],
            ['name' => 'Game Editions', 'table' => 'editions', 'description' => 'List of editions registered for each game', 'route' => 'admin.editions.crud'],
            ['name' => 'Platforms', 'table' => 'platforms', 'description' => 'List of platforms currently registered', 'route' => 'admin.platforms.crud'],
            ['name' => 'Platform Groups', 'table' => 'platform_groups', 'description' => 'List of platform groups currently registered', 'route' => 'admin.platform-groups.crud'],
        ];
        return view('admin.dashboard', ['cruds' => $cruds]);
    }

    // Métodos adicionales para cada tipo de CRUD
    
    public function manageUsers()
    {
        return view('admin.users.crud');
    }

    public function managePlatformGroups()
    {
        $platformGroups = PlatformGroup::all();
        return view('admin.platform-groups.crud', compact('platformGroups'));
    }

    public function managePlatforms()
    {
        $platforms = Platform::all();
        return view('admin.platforms.crud', compact('platforms'));
    }

    public function manageEditions()
    {
        $editions = Edition::all();
        return view('admin.editions.crud', compact('editions'));
    }

    public function manageGames()
    {
        $games = Videogame::all();
        return view('admin.videogames.crud', compact('games'));
    }
}
