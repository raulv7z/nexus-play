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
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {

        $action = route('admin.users.store');

        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text'],
            ['name' => 'password', 'label' => 'Password', 'type' => 'password']
        ];

        return view('admin.users.create', compact('action', 'fields'));
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']); // encrypt password

        $user = User::create($validated);
        $user->assignRole('user');

        return redirect()->route('admin.users.manager')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {

        $actions = [
            'edit' => 'admin.users.edit',
            'delete' => 'admin.users.delete',
        ];

        $fields = [
            'title' => 'name',
            'attributes' => [
                'Name' => 'name',
                'Email' => 'email',
            ],
        ];

        return view('admin.users.show', compact('user', 'actions', 'fields'));
    }

    public function edit(User $user)
    {
        $action = route('admin.users.update', $user->id);

        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text'],
            ['name' => 'password', 'label' => 'Password', 'type' => 'password']
        ];

        return view('admin.users.edit', compact('user', 'action', 'fields'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('admin.users.manager')->with('success', 'User updated successfully.');
    }

    public function delete(User $user)
    {
        $action = route('admin.users.destroy', $user->id);

        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text'],
            ['name' => 'password', 'label' => 'Password', 'type' => 'password']
        ];

        return view('admin.users.delete', compact('user', 'action', 'fields'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.manager')->with('success', 'User deleted successfully.');
    }
}
