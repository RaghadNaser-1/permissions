@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">User Group: {{ $group->name }}</h1>
    <p>Role: {{ $group->role->name ?? 'Not Assigned' }}</p>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Group Members</h5>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($group->users as $user)
                    <li>{{ $user->name }} <a href="{{ route('user_groups.remove_user', ['groupId' => $group->id, 'userId' => $user->id]) }}" class="btn btn-sm btn-danger">Remove</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('user_groups.add_user_form', $group->id) }}" class="btn btn-primary">Add Users to Group</a>
    </div>
@endsection
