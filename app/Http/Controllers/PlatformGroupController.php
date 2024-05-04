<?php

namespace App\Http\Controllers;

use App\Models\PlatformGroup;
use Illuminate\Http\Request;

class PlatformGroupController extends Controller
{
    //
    public function show(Request $request, $id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);
    
        if ($request->ajax()) {
            return response()->json($platformGroup);
        }
    
        return view('platform-groups.show', compact('platformGroup'));
    }

}
