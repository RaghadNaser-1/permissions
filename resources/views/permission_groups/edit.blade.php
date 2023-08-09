@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Edit Permission Group</h1>

        <form action="{{ route('permission_groups.update', $permissionGroup->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Permission Group Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $permissionGroup->name }}" required>
            </div>

            <!-- Add any other fields for permission groups as needed -->

            <button type="submit" class="btn btn-primary">Update Permission Group</button>
        </form>
    </div>
@endsection
