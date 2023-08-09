@extends('layouts.app')
@section('content')

  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Login</h4>
            <form action="{{ route('login.process') }}" method="POST">
              @csrf
              @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
            <div class="text-center">
              <p>Don't have an account? <a href="{{ route('signup') }}">Sign up</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection

