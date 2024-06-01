<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Videogame;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ChartController extends Controller
{
    //

    public function usersRegistrationByDate()
    {
        $startDate = now()->subYear();
        $endDate = now();

        $users = User::selectRaw("DATE_FORMAT(created_at, '%Y-%m-%d') as date, count(*) as count")
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $data = $users->map(function ($user) {
            return [
                'date' => $user->date,
                'count' => $user->count
            ];
        });

        return response()->json($data);
    }

    public function videogamesEditionsCount()
    {
        $videogames = Videogame::withCount('editions')
            ->get()
            ->map(function ($videogame) {
                return [
                    'name' => $videogame->name,
                    'editions_count' => $videogame->editions_count
                ];
            });

        return response()->json($videogames);
    }
}
