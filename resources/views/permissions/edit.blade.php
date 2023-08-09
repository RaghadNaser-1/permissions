<!-- resources/views/permissions/edit.blade.php -->

@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Edit Permission</h1>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Permission Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Permission Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $permission->name }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required>{{ $permission->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Permission</button>
            </form>
        </div>
    </div>
@endsection
