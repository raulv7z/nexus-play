<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Edition;
use App\Models\CartState;
use App\Models\Review;
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
            [
                'name' => 'Videogames',
                'table' => 'videogames',
                'description' => 'List of games currently registered',
                'route' => 'admin.videogames.manager'
            ],  
            [
                'name' => 'Platform Groups',
                'table' => 'platform_groups',
                'description' => 'List of platform groups currently registered',
                'route' => 'admin.platform-groups.manager'
            ],  
            [
                'name' => 'Platforms',
                'table' => 'platforms',
                'description' => 'List of platforms currently registered',
                'route' => 'admin.platforms.manager'
            ],  
            [
                'name' => 'Editions',
                'table' => 'editions',
                'description' => 'List of editions currently registered',
                'route' => 'admin.editions.manager'
            ],  
        ];

        return view('content.admin.dashboard', compact('tablesInfo'));
    }

    public function root()
    {
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

        $someReviews = Review::inRandomOrder()->take(6)->get();

        return view('content.root.home', compact('editionsMostRated', 'editionsBestSeller', 'someReviews'));
    }
}