@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>User Groups Management</h1>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">All User Groups</h5>
                <a href="{{ route('user_groups.create') }}" class="btn btn-primary">Create New User Group</a>
            </div>
            <div class="card-body">


        @if (count($userGroups) > 0)
        <div class="table-responsive">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userGroups as $userGroup)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $userGroup->name }}</td>
                            <td>{{ $userGroup->role->name ?? 'Not Assigned'}}</td>
                            <td>
                                <a href="{{ route('user_groups.show', $userGroup->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('user_groups.edit', $userGroup->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('user_groups.destroy', $userGroup->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user group?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            </div>
        </div>
    

        @else
            <p>No user groups found.</p>
        @endif
    </div>
@endsection
