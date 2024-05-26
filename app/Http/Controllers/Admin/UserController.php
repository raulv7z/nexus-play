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
        $title = 'Create User';

        $action = route('admin.users.store');

        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text'],
            ['name' => 'password', 'label' => 'Password', 'type' => 'password']
        ];

        return view('admin.users.create', compact('title', 'action', 'fields'));
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
        
        $title = 'View User';

        $actions = [
            'edit' => route('admin.users.edit', $user->id),
            'delete' => route('admin.users.delete', $user->id),
        ];

        $fields = [
            'title' => 'name',
            'attributes' => [
                'Name' => 'name',
                'Email' => 'email',
            ],
        ];

        return view('admin.users.show', compact('title', 'user', 'actions', 'fields'));
    }

    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);

        $title = 'Edit User';

        $action = route('admin.users.update', $user->id);

        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text'],
        ];

        return view('admin.users.edit', compact('title', 'user', 'action', 'fields'));
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

    public function delete(User $user)
    {
        $title = 'Delete User';

        $action = route('admin.users.destroy', $user->id);

        $fields = [
            ['name' => 'name', 'label' => 'Name', 'type' => 'text'],
            ['name' => 'email', 'label' => 'Email', 'type' => 'text'],
            ['name' => 'password', 'label' => 'Password', 'type' => 'password']
        ];

        return view('admin.users.delete', compact('title', 'user', 'action', 'fields'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.manager')->with('success', 'User deleted successfully.');
    }
}
