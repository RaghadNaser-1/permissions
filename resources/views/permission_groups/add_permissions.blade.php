@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Add Permissions to Group: {{ $group->name }}</h1>

        <form action="{{ route('permission_groups.store_permissions', $group->id) }}" method="POST">
            @csrf

            <h3>Available Permissions:</h3>
            <ul>
                @forelse ($availablePermissions as $permission)
                    <li>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                        {{ $permission->name }}
                    </li>
                @empty
                    <li>No available permissions to add.</li>
                @endforelse
            </ul>

            <button type="submit" class="btn btn-primary">Add Selected Permissions</button>
        </form>
    </div>
@endsection
