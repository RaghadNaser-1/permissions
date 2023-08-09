<!-- resources/views/roles/edit.blade.php -->

@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Edit Role</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Role Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" required>
                </div>

                <div class="form-group">
                    <label>Permissions (Optional)</label><br>
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" @if ($role->permissions->contains($permission->id)) checked @endif>
                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Update Role</button>
            </form>
        </div>
    </div>
@endsection
