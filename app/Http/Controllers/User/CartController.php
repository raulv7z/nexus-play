<?php

namespace App\Http\Controllers\User;

use App\Exceptions\MaxAmountReachedException;
use App\Http\Controllers\Controller;
use App\Models\Edition;
use App\Services\CartService;
use Exception;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function show(Request $request)
    {
        $user = $request->user();

        // Get 'pending' cart or create a new one
        $cart = $this->cartService->getOrCreatePendingCart($user);

        return view('content.auth.carts.show', compact('cart'));
    }

    public function addToCart(Request $request, $editionId)
    {
        try {
            $user = $request->user();
            $quantity = $request->input('quantity', 1);
    
            // Encuentra la edición del videojuego
            $edition = Edition::findOrFail($editionId);
    
            // Añade la entrada al carrito
            $this->cartService->addToCart($user, $edition, $quantity);
    
            return back()->with('success', 'The item has been added to the cart successfully.');
        } catch(MaxAmountReachedException $e) {
            return back()->with('error', $e->getMessage());
        } catch(Exception $e) {
            return back()->with('error', '500:' + $e->getMessage());
        }
    }

    public function removeFromCart(Request $request, $editionId)
    {
        try {
            $user = $request->user();
            $edition = Edition::findOrFail($editionId);
            $this->cartService->removeFromCart($user, $edition);
    
            return redirect()->route('auth.carts.show')->with('success', 'The item has been deleted from the cart successfully.');
        } catch(Exception $e) {
            return back()->with('error', '500:' + $e->getMessage());
        }
    }

    public function increaseQuantity(Request $request, $editionId)
    {
        try {
            $user = $request->user();

            $edition = Edition::findOrFail($editionId);
            $this->cartService->increaseQuantity($user, $edition);

            return back();
        } catch(MaxAmountReachedException $e) {
            return back()->with('error', $e->getMessage());
        } catch(Exception $e) {
            return back()->with('error', '500:' + $e->getMessage());
        }
    }

    public function decreaseQuantity(Request $request, $editionId)
    {
        try {
            $user = $request->user();

            $edition = Edition::findOrFail($editionId);
            $this->cartService->decreaseQuantity($user, $edition);
    
            return back();
        } catch(Exception $e) {
            return back()->with('error', '500:' . $e->getMessage());
        }
    }

    public function proceedToCheckout(Request $request)
    {
        return view('content.payments.checkout');
    }
}
