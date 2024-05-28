<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\RenderController;
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

        return view('content.platform-groups.show', compact('platformGroup', 'editions'));
    }

    public function renderFilteredEditions(Request $request)
    {
        $query = Edition::query();

        // Filtrar por platform_group_id si se proporciona
        if ($request->has('platform_group_id')) {
            $platformGroupId = decrypt($request->input('platform_group_id'));
            $query->whereHas('platform', function ($query) use ($platformGroupId) {
                $query->where('platform_group_id', $platformGroupId);
            });
        }

        // Filtrar por nombre de videojuego si se proporciona
        if ($request->has('videogame_name')) {
            $videogameName = $request->input('videogame_name');
            $query->whereHas('videogame', function ($query) use ($videogameName) {
                $query->where('name', 'like', '%' . $videogameName . '%');
            });
        }

        // Filtrar por plataforma si se proporciona
        if ($request->has('platform_id') && !empty($request->input('platform_id'))) {
            $platformId = decrypt($request->input('platform_id'));
            $query->where('platform_id', $platformId);
        }

        // Agregar otros filtros aquí según sea necesario...

        $editions = $query->get();

        // Usar el método renderEditionSection para renderizar las ediciones filtradas
        return app('App\Http\Controllers\RenderController')->renderEditionSection($request, $editions);
    }
}
