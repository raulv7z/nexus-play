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

    public function userRegistrationsPerMonth()
    {
        $usersPerMonth = User::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $formatted = $usersPerMonth->map(function ($item) {
            $monthName = Carbon::createFromDate($item->year, $item->month, 1)->format('F');
            return [
                'month' => $monthName . ' ' . $item->year,
                'count' => $item->count
            ];
        });

        return response()->json($formatted);
    }

    public function userRolesDistribution()
    {
        // Asumimos que los roles están definidos como 'admin' y 'user' en tu sistema
        $roles = Role::withCount('users')->get();

        // Formatear la salida para el gráfico
        $roleDistributions = $roles->map(function ($role) {
            return [
                'role' => $role->name,
                'count' => $role->users_count
            ];
        });

        return response()->json($roleDistributions);
    }


}
