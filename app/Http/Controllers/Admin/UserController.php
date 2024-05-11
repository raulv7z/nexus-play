<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProfileStoreRequest; 
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(ProfileStoreRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']); // encrypt password
    
        $user = User::create($validated);
        $user->assignRole('user');
        
        return redirect()->route('users.manager')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.manager')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.manager')->with('success', 'User deleted successfully.');
    }
}

