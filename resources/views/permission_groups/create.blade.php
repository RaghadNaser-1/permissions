@extends('layouts.dash')

@section('content')
    <div class="container">
        <h1>Create New Permission Group</h1>

        <form action="{{ route('permission_groups.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Permission Group Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <!-- Add any other fields for permission groups as needed -->

            <button type="submit" class="btn btn-primary">Create Permission Group</button>
        </form>
    </div>
@endsection
