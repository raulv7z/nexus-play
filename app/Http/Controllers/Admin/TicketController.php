<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('content.admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']); // encrypt password

        $user = User::create($validated);
        $user->assignRole('user');

        return redirect()->route('admin.users.manager')->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('content.admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('content.admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->update($request->validated());

        if ($user->trashed() && $request->has('restore') && $request->restore) {
            $user->restore();
        }

        return redirect()->route('admin.users.manager')->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        if ($user->trashed()) {
            return redirect()->route('admin.users.manager')->with('error', 'User is already deleted. You have been redirected to manager.');
        }

        return view('content.admin.users.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.manager')->with('success', 'User deleted successfully.');
    }
}
