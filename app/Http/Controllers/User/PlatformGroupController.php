<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\PlatformGroup;
use App\Http\Requests\StorePlatformGroupRequest;
use App\Http\Requests\UpdatePlatformGroupRequest;
use Illuminate\Http\Request;

class PlatformGroupController extends Controller
{
    public function show(Request $request, $id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);
        return view('content.platform-groups.show', compact('platformGroup'));
    }
}
