<?php

namespace App\Http\Controllers;

use App\Models\PlatformGroup;
use App\Http\Requests\StorePlatformGroupRequest;
use App\Http\Requests\UpdatePlatformGroupRequest;
use Illuminate\Http\Request;

class PlatformGroupController extends Controller
{
    // Mostrar todos los grupos de plataformas
    public function index()
    {
        $platformGroups = PlatformGroup::all();
        return view('entities.platform-groups.index', compact('platformGroups'));
    }

    // Mostrar el formulario para crear un nuevo grupo
    public function create()
    {
        return view('entities.platform-groups.create');
    }

    // Almacenar un nuevo grupo en la base de datos
    public function store(StorePlatformGroupRequest $request)
    {
        $platformGroup = PlatformGroup::create($request->validated());
        return redirect()->route('entities.platform-groups.index')->with('success', 'Platform group created successfully.');
    }

    // Mostrar un grupo específico
    public function show(Request $request, $id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);

        if ($request->ajax()) {
            return response()->json($platformGroup);
        }

        return view('entities.platform-groups.show', compact('platformGroup'));
    }

    // Mostrar el formulario para editar un grupo existente
    public function edit($id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);
        return view('entities.platform-groups.edit', compact('platformGroup'));
    }

    // Actualizar un grupo en la base de datos
    public function update(UpdatePlatformGroupRequest $request, $id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);
        $platformGroup->update($request->validated());
        return redirect()->route('entities.platform-groups.index')->with('success', 'Platform group updated successfully.');
    }

    // Eliminar un grupo de la base de datos
    public function destroy($id)
    {
        $platformGroup = PlatformGroup::findOrFail($id);
        $platformGroup->delete();
        return redirect()->route('entities.platform-groups.index')->with('success', 'Platform group deleted successfully.');
    }
}
