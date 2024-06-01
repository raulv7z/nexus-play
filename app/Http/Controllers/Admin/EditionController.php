<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreEditionRequest;
use App\Http\Requests\UpdateEditionRequest;
Use App\Models\Edition;
use App\Models\Platform;
use App\Models\User;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EditionController extends Controller
{
    public function create()
    {
        $allPlatforms = Platform::all();
        $allVideogames = Videogame::all();
        return view('content.admin.editions.create', compact('allPlatforms', 'allVideogames'));
    }

    public function store(StoreEditionRequest $request)
    {
        $validated = $request->validated();
        $edition = Edition::create($validated);

        return redirect()->route('admin.editions.manager')->with('success', 'Edition created successfully.');
    }

    public function show($id)
    {
        $edition = Edition::withTrashed()->findOrFail($id);
        $allPlatforms = Platform::all();
        $allVideogames = Videogame::all();
        
        return view('content.admin.editions.show', compact('edition', 'allPlatforms', 'allVideogames'));
    }

    public function edit($id)
    {
        $edition = Edition::withTrashed()->findOrFail($id);

        $allPlatforms = Platform::all();
        $allVideogames = Videogame::all();
        return view('content.admin.editions.edit', compact('edition', 'allPlatforms', 'allVideogames'));
    }

    public function update(UpdateEditionRequest $request, $id)
    {
        $edition = Edition::withTrashed()->findOrFail($id);
        $validated = $request->validated();
        $edition->update($validated);

        if ($edition->trashed() && $request->has('restore') && $request->restore) {
            $edition->restore();
        }

        return redirect()->route('admin.editions.manager')->with('success', 'Edition updated successfully.');
    }

    public function delete($id)
    {
        $edition = Edition::withTrashed()->findOrFail($id);
        
        if ($edition->trashed()) {
            return redirect()->route('admin.editions.manager')->with('error', 'Edition is already deleted. You have been redirected to manager.');
        }

        $allPlatforms = Platform::all();
        $allVideogames = Videogame::all();

        return view('content.admin.editions.delete', compact('edition', 'allPlatforms', 'allVideogames'));
    }

    public function destroy(Edition $edition)
    {
        $edition->delete();
        return redirect()->route('admin.editions.manager')->with('success', 'Edition deleted successfully.');
    }
}
