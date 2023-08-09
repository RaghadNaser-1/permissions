<!-- resources/views/roles/create.blade.php -->

@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Create New Role</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Role Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Permissions (Optional)</label><br>
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}">
                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Create Role</button>
            </form>
        </div>
    </div>
@endsection
