<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RenderController extends Controller
{
    public function renderEditionSection(Request $request, $editions = null)
    {
        $editions = $editions ?? Edition::all();
        return view('content.platform-groups.partials.list-editions', compact('editions'))->render();
    }
}
