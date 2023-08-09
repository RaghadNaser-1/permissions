<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the user creation form
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        // Validation rules for user creation form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'array', // For assigning roles (optional)
        ]);

        // Create a new user in the database
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Assign roles (if provided)
        $roles = $request->input('roles');
        if ($roles) {
            $user->roles()->sync($roles);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Show the user edit form
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    // Update the user details in the database
    public function update(Request $request, User $user)
    {
        // Validation rules for user edit form fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'array', // For assigning roles (optional)
        ]);

        // Update the user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        // Assign roles (if provided)
        $roles = $request->input('roles');
        if ($roles) {
            $user->roles()->sync($roles);
        } else {
            $user->roles()->detach(); // Remove all roles if none selected
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Delete a user from the database
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    // public function search(Request $request)
    // {
    //     $searchTerm = $request->input('term');

    //     $users = User::where('name', 'like', '%' . $searchTerm . '%')
    //         ->select('id', 'name as text') // Select the id and name for use in Select2
    //         ->get();

    //     return response()->json($users);
    // }

public function show($id)
{
    $user = User::findOrFail($id);
    return view('users.show', ['user' => $user]);
}
public function search(Request $request)
{
    $query = $request->input('q');
    $users = User::where('name', 'like', "%{$query}%")->get();

    $results = [];
    foreach ($users as $user) {
        $results[] = [
            'id' => $user->id,
            'text' => $user->name,
        ];
    }

    return response()->json($results);
}

}
