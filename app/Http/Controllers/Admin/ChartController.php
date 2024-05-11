<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

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
}
