<?php

namespace App\Http\Controllers;

use App\Models\PlatformGroup;
use Illuminate\Http\Request;

class PlatformGroupController extends Controller
{
    //
    public function show($id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);
        return view('platform-groups.show', compact('platformGroup'));
    }
}
