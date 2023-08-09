<?php
// app/Http/Controllers/PermissionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    // Display all permissions
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    // Show the permission creation form
    public function create()
    {
        return view('permissions.create');
    }

    // Store a new permission in the database
    public function store(Request $request)
    {
        // Validation rules for permission creation form fields
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
            'description' => 'required|string',
        ]);

        // Create a new permission in the database
        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully!');
    }

    // Show the permission edit form
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    // Update the permission details in the database
    public function update(Request $request, Permission $permission)
    {
        // Validation rules for permission edit form fields
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $permission->id,
            'description' => 'required|string',
        ]);

        // Update the permission details
        $permission->name = $request->input('name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully!');
    }

    // Delete a permission from the database
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully!');
    }
}
