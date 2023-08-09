@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Create New User Group</h1>

        <form action="{{ route('user_groups.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">User Group Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Role (Optional)</label>
                <select id="role" name="role" class="form-control">
                    <option value="">Select a role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Add any other fields for user groups as needed -->

            <button type="submit" class="btn btn-primary">Create User Group</button>
        </form>
    </div>
@endsection
