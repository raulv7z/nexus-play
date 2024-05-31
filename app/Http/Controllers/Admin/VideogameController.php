<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreVideogameRequest;
use App\Http\Requests\UpdateVideogameRequest;
Use App\Models\Videogame;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VideogameController extends Controller
{
    public function create()
    {
        return view('content.admin.videogames.create');
    }

    public function store(StoreVideogameRequest $request)
    {
        $validated = $request->validated();
        $videogame = Videogame::create($validated);

        return redirect()->route('admin.videogames.manager')->with('success', 'Videogame created successfully.');
    }

    public function show($id)
    {
        $videogame = Videogame::withTrashed()->findOrFail($id);
        return view('content.admin.videogames.show', compact('videogame'));
    }

    public function edit($id)
    {
        $videogame = Videogame::withTrashed()->findOrFail($id);
        return view('content.admin.videogames.edit', compact('videogame'));
    }

    public function update(UpdateVideogameRequest $request, $id)
    {
        $videogame = Videogame::withTrashed()->findOrFail($id);
        $videogame->update($request->validated());

        if ($videogame->trashed() && $request->has('restore') && $request->restore) {
            $videogame->restore();
        }

        return redirect()->route('admin.videogames.manager')->with('success', 'Videogame updated successfully.');
    }

    public function delete($id)
    {
        $videogame = Videogame::withTrashed()->findOrFail($id);

        if ($videogame->trashed()) {
            return redirect()->route('admin.videogames.manager')->with('error', 'Videogame is already deleted. You have    been redirected to manager.');
        }

        return view('content.admin.videogames.delete', compact('videogame'));
    }

    public function destroy(Videogame $videogame)
    {
        $videogame->delete();
        return redirect()->route('admin.videogames.manager')->with('success', 'Videogame deleted successfully.');
    }
}
