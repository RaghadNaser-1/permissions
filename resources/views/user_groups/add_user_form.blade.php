@extends('layouts.dash')

@section('content')
    <h1 class="mt-4">Add Users to {{ $group->name }}</h1>

    <form action="{{ route('user_groups.add_user', $group->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="users">Select Users</label>
            <select multiple class="form-control" id="users" name="users[]">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Users</button>
    </form>
@endsection
