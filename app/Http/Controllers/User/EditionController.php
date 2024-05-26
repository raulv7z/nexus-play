<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    //

    public function show(Request $request, $id)
    {
        $edition = Edition::findOrFail($id);
        $reviews = $edition->reviews()->orderBy('created_at', 'desc')->paginate(5);
        return view('content.editions.show', compact('edition', 'reviews'));
    }
}
