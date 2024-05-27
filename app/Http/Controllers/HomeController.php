<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Edition;
use App\Models\CartState;

class HomeController extends Controller
{
    //

    public function dashboard()
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

        // mysql
        // $stmt = "SELECT
        //             editions.id,
        //             editions.platform_id,
        //             editions.videogame_id,
        //             editions.amount,
        //             editions.stock,
        //             SUM(cart_entries.quantity) as total_sales
        //         FROM
        //             editions
        //         JOIN
        //             cart_entries ON editions.id = cart_entries.edition_id
        //         JOIN
        //             carts ON cart_entries.cart_id = carts.id
        //         JOIN
        //             cart_states ON carts.cart_state_id = cart_states.id
        //         WHERE
        //             cart_states.state = 'Completed'
        //         GROUP BY
        //             editions.id,
        //             editions.platform_id,
        //             editions.videogame_id,
        //             editions.amount,
        //             editions.stock
        //         ORDER BY
        //             total_sales DESC
        //         LIMIT 6";

        return view('content.home.dashboard', compact('editionsAll', 'editionsMostRated', 'editionsBestSeller'));
    }

    public function welcome()
    {
        return view('content.home.welcome');
    }
}
