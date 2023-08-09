<?php
// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    // Display all roles
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    // Show the role creation form
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    // Store a new role in the database
    public function store(Request $request)
    {
        // Validation rules for role creation form fields
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'array', // For assigning permissions (optional)
        ]);

        // Create a new role in the database
        $role = new Role();
        $role->name = $request->input('name');
        $role->save();

        // Assign permissions (if provided)
        $permissions = $request->input('permissions');
        if ($permissions) {
            $role->permissions()->attach($permissions);
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully!');
    }

    // Show the role edit form
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    // Update the role details in the database
    public function update(Request $request, Role $role)
    {
        // Validation rules for role edit form fields
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'array', // For assigning permissions (optional)
        ]);

        // Update the role details
        $role->name = $request->input('name');
        $role->save();

        // Assign permissions (if provided)
        $permissions = $request->input('permissions');
        if ($permissions) {
            $role->permissions()->sync($permissions);
        } else {
            $role->permissions()->detach(); // Remove all permissions if none selected
        }

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }

    // Delete a role from the database
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
