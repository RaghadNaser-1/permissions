<!-- resources/views/roles/index.blade.php -->

@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Role Management</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">All Roles</h5>
            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">Add Role</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        {{ $permission->name }}@if (!$loop->last), @endif
                                    @endforeach
                                </td>
                                <td>
                                    <!-- Add edit and delete links for each role -->
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
