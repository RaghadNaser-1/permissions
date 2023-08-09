<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index()
    {
        // Retrieve all user groups from the database
        $userGroups = UserGroup::all();

        // Pass the user groups data to the view
        return view('user_groups.index', compact('userGroups'));
    }

    public function create()
{
    $roles = Role::all();
    return view('user_groups.create', compact('roles'));
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'role' => 'nullable|exists:roles,id', // Validate the role input
    ]);

    // Create the user group with role_id if provided, or NULL if not provided
    $userGroup = UserGroup::create([
        'name' => $data['name'],
        'role_id' => $data['role'],
    ]);

    return redirect()->route('user_groups.index')->with('success', 'User group created successfully.');
}


    // public function show(UserGroup $userGroup)
    // {
    //     // Show the details of the specified user group
    //     return view('user_groups.show', compact('userGroup'));
    // }
    public function show($groupId)
{
    $group = UserGroup::findOrFail($groupId);

    return view('user_groups.show', compact('group'));
}

    public function edit(UserGroup $userGroup)
    {
        // Show the form to edit the specified user group
        return view('user_groups.edit', compact('userGroup'));
    }

    public function update(Request $request, $groupId)
{
    $group = UserGroup::findOrFail($groupId);

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'role_id' => 'nullable|exists:roles,id', // Add role_id validation
    ]);

    $group->update($data);

    return redirect()->route('user_groups.show', $groupId)->with('success', 'User group updated successfully.');
}

    public function destroy(UserGroup $userGroup)
    {
        // Delete the specified user group from the database
        $userGroup->delete();

        // Redirect back to the user groups index page with a success message
        return redirect()->route('user_groups.index')->with('success', 'User group deleted successfully.');
    }

    // public function addUser(Request $request, UserGroup $userGroup)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id'
    //     ]);

    //     $user = User::find($request->input('user_id'));
    //     $userGroup->users()->attach($user);

    //     return redirect()->route('user_groups.show', $userGroup->id)
    //         ->with('success', 'User added to user group successfully.');
    // }
    public function addUserForm($groupId)
{
    $group = UserGroup::findOrFail($groupId);
    $users = User::all(); // Retrieve all users from the database

    return view('user_groups.add_user_form', compact('group', 'users'));
}

public function addUser(Request $request, $groupId)
{
    $group = UserGroup::findOrFail($groupId);
    $selectedUsers = $request->input('users');

    // Associate the selected users with the group
    $group->users()->attach($selectedUsers);

    return redirect()->route('user_groups.show', $group->id)
                     ->with('success', 'Users added to the group successfully.');
}
public function removeUser($groupId, $userId)
{
    $group = UserGroup::findOrFail($groupId);
    $user = User::findOrFail($userId);

    // Detach the user from the group
    $group->users()->detach($user);

    return redirect()->route('user_groups.show', $group->id)
                     ->with('success', 'User removed from the group successfully.');
}

}
