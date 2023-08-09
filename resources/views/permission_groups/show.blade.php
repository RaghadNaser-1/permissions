@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Permission Group Details: {{ $group->name }}</h1>
        <a href="{{ route('permission_groups.add_permissions', $group->id) }}" class="btn btn-primary">Add Permissions</a>

        <h3>Permissions:</h3>
        @if ($permissions->isEmpty())
            <p>No permissions found for this group.</p>
        @else
            <ul>
                @foreach ($permissions as $permission)
                    <li>
                        {{ $permission->name }}
                        <form action="{{ route('permission_groups.remove_permission', [$group->id, $permission->id]) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
