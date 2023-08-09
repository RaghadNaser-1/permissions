<?php
namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\PermissionsGroup;
use Illuminate\Http\Request;

class PermissionGroupController extends Controller
{
    public function index()
    {
        $permissionGroups = PermissionsGroup::all();
        return view('permission_groups.index', compact('permissionGroups'));
    }

    public function create()
    {
        return view('permission_groups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PermissionsGroup::create($data);

        return redirect()->route('permission_groups.index')
            ->with('success', 'Permission group created successfully.');
    }

    public function edit(PermissionsGroup $permissionGroup)
    {
        return view('permission_groups.edit', compact('permissionGroup'));
    }

    public function update(Request $request, PermissionsGroup $permissionGroup)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permissionGroup->update($data);

        return redirect()->route('permission_groups.index')
            ->with('success', 'Permission group updated successfully.');
    }

    public function destroy(PermissionsGroup $permissionGroup)
    {
        $permissionGroup->delete();

        return redirect()->route('permission_groups.index')
            ->with('success', 'Permission group deleted successfully.');
    }


public function show($id)
{
    $group = PermissionsGroup::findOrFail($id);
    $permissions = $group->permissions;

    return view('permission_groups.show', compact('group', 'permissions'));
}
public function addPermissions($groupId)
{
    // Find the group by its ID
    $group = PermissionsGroup::findOrFail($groupId);

    // Get all permissions that are not currently associated with the group
    $availablePermissions = Permission::whereNotIn('id', $group->permissions()->pluck('id'))->get();

    return view('permission_groups.add_permissions', compact('group', 'availablePermissions'));
}

public function storePermissions(Request $request, $groupId)
{
    $group = PermissionsGroup::findOrFail($groupId);

    // Get the selected permission IDs from the form submission
    $selectedPermissionIds = $request->input('permissions', []);

    // Associate the selected permissions with the group
    $group->permissions()->attach($selectedPermissionIds);

    return redirect()->route('permission_groups.show', $group->id)
        ->with('success', 'Permissions added successfully.');
}
public function removePermission(Request $request, $groupId, $permissionId)
{
    $group = PermissionsGroup::findOrFail($groupId);
    $group->permissions()->detach($permissionId);

    return redirect()->route('permission_groups.show', $group->id)
        ->with('success', 'Permission removed successfully from the group.');
}
}
