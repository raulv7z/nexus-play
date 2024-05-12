<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class ChartController extends Controller
{
    //

    public function userRolesDistribution()
    {
        // // Asumimos que los roles están definidos como 'admin' y 'user' en tu sistema
        // $roles = Role::withCount('users')->get();

        // // Formatear la salida para el gráfico
        // $roleDistributions = $roles->map(function ($role) {
        //     return [
        //         'role' => $role->name,
        //         'count' => $role->users_count
        //     ];
        // });

        // return response()->json($roleDistributions);

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
}
