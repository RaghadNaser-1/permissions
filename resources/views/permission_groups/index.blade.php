@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Permission Groups Management</h1>

        <div class="mb-3">
            <a href="{{ route('permission_groups.create') }}" class="btn btn-primary">Create New Permission Group</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissionGroups as $group)
                    <tr>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a href="{{ route('permission_groups.show', $group->id) }}" class="btn btn-sm btn-secondary">View</a>

                            <a href="{{ route('permission_groups.edit', $group->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('permission_groups.destroy', $group->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this permission group?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No permission groups found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
