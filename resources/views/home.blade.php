@extends('layouts.app')
@section('content')

  <!-- Hero Section -->
  <section class="jumbotron text-center">
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('switch.language', 'en') }}" class="btn btn-primary btn-sm">English</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('switch.language', 'ar') }}" class="btn btn-primary btn-sm">العربية</a>
            </div>
        </div>
    </div> --}}

    <div class="container">


      <h1 class="display-4">Welcome to the Permission Management System</h1>
      {{-- <h1>{{ __('messages.welcome') }}</h1> --}}

      <p class="lead">Efficiently Manage User Access and Permissions</p>
      <a href="{{ route('signup') }}" class="btn btn-light btn-lg">Get Started</a>

    </div>
  </section>

  <!-- Key Features -->
  <section class="key-features-section">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3>Role-Based Access Control</h3>
          <p>Define roles and assign permissions groups to efficiently manage user access.</p>
        </div>
        <div class="col-md-4">
          <h3>Dynamic Permissions</h3>
          <p>Implement dynamic permissions that adapt based on user attributes and behavior.</p>
        </div>
        <div class="col-md-4">
          <h3>Permission Groups</h3>
          <p>Organize related permissions into groups for easier management.</p>
        </div>
      </div>
      
    </div>
  </section>

  <!-- How it Works -->
  <section class="how-it-works-section">
    <div class="container">
      <h2 class="text-center mb-4">How It Works</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="text-center">
            <i class="fas fa-users fa-3x how-it-works-icon"></i>
            <h4>Create Permissions Groups</h4>
            <p>Admins can create permissions groups and define related permissions.</p>
          </div>

        </div>
        <div class="col-md-4">
          <div class="text-center">
            <i class="fas fa-user-cog fa-3x how-it-works-icon"></i>
            <h4>Create Roles</h4>
            <p>Create roles and associate them with specific permissions groups.</p>
          </div>

        </div>
        <div class="col-md-4">
          <div class="text-center">
            <i class="fas fa-user-plus fa-3x how-it-works-icon"></i>
            <h4>Assign Roles to Users</h4>
            <p>Admins can assign roles to individual users, granting them the associated permissions.</p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- Call-to-Action -->
  <section class="cta-section text-center">
    <div class="container">
      <h2 class="display-4">Get Started with Our Permission Management System</h2>
      <p class="lead">Try it now and experience better control over user access.</p>
      <a href="{{ route('signup') }}" class="btn btn-light btn-lg">Get Started</a>
    </div>
  </section>

  @endsection
