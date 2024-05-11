<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Edition;
use App\Models\Platform;
use App\Models\PlatformGroup;

class AdminController extends Controller
{

    public function index()
    {
        $cruds = [
            ['name' => 'Games', 'table' => 'videogames', 'description' => 'List of games currently registered', 'route' => 'admin.cruds.videogames'],
            ['name' => 'Game Editions', 'table' => 'editions', 'description' => 'List of editions registered for each game', 'route' => 'admin.cruds.editions'],
            ['name' => 'Platforms', 'table' => 'platforms', 'description' => 'List of platforms currently registered', 'route' => 'admin.cruds.platforms'],
            ['name' => 'Platform Groups', 'table' => 'platform_groups', 'description' => 'List of platform groups currently registered', 'route' => 'admin.cruds.platform-groups'],
        ];
        return view('admin.dashboard', ['cruds' => $cruds]);
    }

    // Métodos adicionales para cada tipo de CRUD

    public function managePlatformGroups()
    {
        $platformGroups = PlatformGroup::all();
        return view('admin.cruds.platform-groups', compact('platformGroups'));
    }

    public function managePlatforms()
    {
        $platforms = Platform::all();
        return view('admin.cruds.platforms', compact('platforms'));
    }

    public function manageEditions()
    {
        $editions = Edition::all();
        return view('admin.cruds.editions', compact('editions'));
    }

    public function manageGames()
    {
        $games = Videogame::all();
        return view('admin.cruds.videogames', compact('games'));
    }
}
