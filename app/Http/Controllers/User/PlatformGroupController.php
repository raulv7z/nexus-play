<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\PlatformGroup;
use App\Http\Requests\StorePlatformGroupRequest;
use App\Http\Requests\UpdatePlatformGroupRequest;
use App\Models\Edition;
use Illuminate\Http\Request;

class PlatformGroupController extends Controller
{
    public function show(Request $request, $id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);

        // Obtener las ediciones del platformGroup solicitado
        $editions = Edition::whereHas('platform', function ($query) use ($platformGroup) {
            $query->where('platform_group_id', $platformGroup->id);
        })->get();

        // Agrupar las ediciones por cada Platform del platformGroup
        $editionsByPlatform = $editions->groupBy('platform_id');

        return view('content.platform-groups.show', compact('platformGroup', 'editionsByPlatform'));
    }
}