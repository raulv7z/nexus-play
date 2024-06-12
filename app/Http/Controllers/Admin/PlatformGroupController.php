<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StorePlatformGroupRequest;
use App\Http\Requests\UpdatePlatformGroupRequest;
Use App\Models\Platform;
use App\Models\PlatformGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlatformGroupController extends Controller
{
    public function create()
    {
        return view('content.admin.platform-groups.create');
    }

    public function store(StorePlatformGroupRequest $request)
    {
        $validated = $request->validated();
        $platformGroup = PlatformGroup::create($validated);

        return redirect()->route('admin.platform-groups.manager')->with('success', 'Record created successfully.');
    }

    public function show($id)
    {
        $platformGroup = PlatformGroup::withTrashed()->findOrFail($id);
        return view('content.admin.platform-groups.show', compact('platformGroup'));
    }

    public function edit($id)
    {
        $platformGroup = PlatformGroup::withTrashed()->findOrFail($id);
        return view('content.admin.platform-groups.edit', compact('platformGroup'));
    }

    public function update(UpdatePlatformGroupRequest $request, $id)
    {
        $platformGroup = PlatformGroup::withTrashed()->findOrFail($id);
        $validated = $request->validated();
        $platformGroup->update($validated);

        if ($platformGroup->trashed() && $request->has('restore') && $request->restore) {
            $platformGroup->restore();
        }

        return redirect()->route('admin.platform-groups.manager')->with('success', 'Record updated successfully.');
    }

    public function delete($id)
    {
        $platformGroup = PlatformGroup::withTrashed()->findOrFail($id);

        if ($platformGroup->trashed()) {
            return redirect()->route('admin.platform-groups.manager')->with('error', 'This record is already deleted. You have been redirected to manager.');
        }

        return view('content.admin.platform-groups.delete', compact('platformGroup'));
    }

    public function destroy(PlatformGroup $platformGroup)
    {
        $platformGroup->delete();
        return redirect()->route('admin.platform-groups.manager')->with('success', 'Record deleted successfully.');
    }
}
