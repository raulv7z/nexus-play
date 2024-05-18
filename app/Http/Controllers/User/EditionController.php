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
        $title = 'Show Edition';
        $edition = Edition::findOrFail($id);
        return view('content.editions.show', compact('title', 'edition'));
    }
}
