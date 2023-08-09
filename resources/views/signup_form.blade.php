@extends('layouts.app')
@section('content')

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Sign Up</h4>
            <form action="{{ route('processSignUp') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Sign Up</button>
              </div>
            </form>
            <div class="text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

