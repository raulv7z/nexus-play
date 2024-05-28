<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RenderController extends Controller
{    
    protected $services = [];

    public function __construct(CartService $cartService) {
        $this->services['cartService'] = $cartService;
    }

    public function renderEditionSection(Request $request, $editions = null)
    {
        $editions = $editions ?? Edition::all();
        return view('partials.editions.list', compact('editions'))->render();
    }

    public function renderCartIconLink(Request $request)
    {
        $user = $request->user();
        $cart = $this->services['cartService']->getOrCreatePendingCart($user);
        $cartEntries = $cart->entries;
        $quantity = count($cartEntries) ?? 0;
        return view('partials.carts.icon-link', compact('quantity'))->render();
    }
}