<!-- resources/views/permissions/create.blade.php -->

@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Create New Permission</h1>

    <div class="card">
        <div class="card-header ">
            <h5 class="mb-0">Permission Information</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Permission Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Permission</button>
            </form>
        </div>
    </div>
@endsection
