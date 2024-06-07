<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $orders = Invoice::where('user_id', $user->id)->paginate(3);
        return view('content.auth.invoices.index', compact('user', 'orders'));
    }
}
