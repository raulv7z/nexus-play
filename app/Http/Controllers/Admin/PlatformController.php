<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;
Use App\Models\Platform;
use App\Models\PlatformGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlatformController extends Controller
{
    public function create()
    {
        $allPlatformGroups = PlatformGroup::all();
        return view('content.admin.platforms.create', compact('allPlatformGroups'));
    }

    public function store(StorePlatformRequest $request)
    {
        $validated = $request->validated();
        $platform = Platform::create($validated);

        return redirect()->route('admin.platforms.manager')->with('success', 'Record created successfully.');
    }

    public function show($id)
    {
        $platform = Platform::withTrashed()->findOrFail($id);
        $allPlatformGroups = PlatformGroup::all();
        return view('content.admin.platforms.show', compact('platform', 'allPlatformGroups'));
    }

    public function edit($id)
    {
        $platform = Platform::withTrashed()->findOrFail($id);
        $allPlatformGroups = PlatformGroup::all();
        return view('content.admin.platforms.edit', compact('platform', 'allPlatformGroups'));
    }

    public function update(UpdatePlatformRequest $request, $id)
    {
        $platform = Platform::withTrashed()->findOrFail($id);
        $validated = $request->validated();
        $platform->update($validated);

        if ($platform->trashed() && $request->has('restore') && $request->restore) {
            $platform->restore();
        }

        return redirect()->route('admin.platforms.manager')->with('success', 'Record updated successfully.');
    }

    public function delete($id)
    {
        $platform = Platform::withTrashed()->findOrFail($id);

        if ($platform->trashed()) {
            return redirect()->route('admin.platforms.manager')->with('error', 'This record is already deleted. You have been redirected to manager.');
        }

        $allPlatformGroups = PlatformGroup::all();

        return view('content.admin.platforms.delete', compact('platform', 'allPlatformGroups'));
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();
        return redirect()->route('admin.platforms.manager')->with('success', 'Record deleted successfully.');
    }
}
