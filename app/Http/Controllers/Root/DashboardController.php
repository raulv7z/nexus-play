<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Edition;
use App\Models\CartState;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function admin() {
        $tablesInfo = [
            [
                'name' => 'Users',
                'table' => 'users',
                'description' => 'List of users currently registered',
                'route' => 'admin.users.manager'
            ],
        ];

        return view('content.admin.dashboard', compact('tablesInfo'));
    }

    public function root()
    {
        $editionsAll = Edition::inRandomOrder()->get();
        $editionsMostRated = Edition::orderBy('rating', 'desc')->take(6)->get();

        // Obtener el id del estado "Completed"
        $completedStateId = CartState::where('state', 'Completed')->first()->id;

        // Obtener las 6 ediciones más vendidas
        $editionsBestSeller = Edition::select('editions.id', 'editions.platform_id', 'editions.videogame_id', 'editions.amount', 'editions.stock')
            ->join('cart_entries', 'editions.id', '=', 'cart_entries.edition_id')
            ->join('carts', 'cart_entries.cart_id', '=', 'carts.id')
            ->where('carts.cart_state_id', $completedStateId)
            ->selectRaw('SUM(cart_entries.quantity) as total_sales')
            ->groupBy('editions.id', 'editions.platform_id', 'editions.videogame_id', 'editions.amount', 'editions.stock')
            ->orderBy('total_sales', 'desc')
            ->take(6)
            ->get();

        return view('content.root.home', compact('editionsAll', 'editionsMostRated', 'editionsBestSeller'));
    }
}