@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Edit User Group</h1>

        <form action="{{ route('user_groups.update', $userGroup->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">User Group Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $userGroup->name }}" required>
            </div>

            <!-- Add any other fields for user groups as needed -->

            <button type="submit" class="btn btn-primary">Update User Group</button>
        </form>
    </div>
@endsection
