<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Edition;
use App\Models\InvoiceEntry;
use App\Models\Platform;
use App\Models\PlatformGroup;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Videogame;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
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

    public function platformGroupSales()
    {
        $platformGroups = PlatformGroup::with(['platforms.editions.invoiceEntries'])
            ->get()
            ->map(function ($platformGroup) {
                $salesCount = $platformGroup->platforms->flatMap(function ($platform) {
                    return $platform->editions->flatMap(function ($edition) {
                        return $edition->invoiceEntries;
                    });
                })->count();

                return [
                    'name' => $platformGroup->name,
                    'sales_count' => $salesCount
                ];
            });

        return response()->json($platformGroups);
    }

    public function platformsEditionsCount()
    {
        $platforms = Platform::withCount('editions')
            ->get()
            ->map(function ($platform) {
                return [
                    'name' => $platform->name,
                    'editions_count' => $platform->editions_count
                ];
            });

        return response()->json($platforms);
    }

    public function editionsBestSeller()
    {
        $editions = Edition::with('videogame') // Cargar la relación 'videogame'
            ->withCount('invoiceEntries')
            ->orderBy('invoice_entries_count', 'desc')
            ->take(15) // Limitar a las 15 ediciones más vendidas
            ->get();

        // Depurar para verificar si se está obteniendo el nombre del videojuego correctamente
        $data = $editions->map(function ($edition) {
            return [
                'name' => $edition->videogame->name,
                'platform_name' => $edition->platform->name,
                'sales_count' => $edition->invoice_entries_count
            ];
        });

        return response()->json($data);
    }
}
