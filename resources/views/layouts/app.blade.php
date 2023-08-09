<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permission Management System</title>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- Custom CSS -->
  <style>
    /* Hero Section Styles */
    .jumbotron {
      background-color: #007bff;
      color: #fff;
    }

    /* Key Features Section Styles */
    .key-features-section {
      background-color: #f8f9fa;
      padding: 50px 0;
    }

    .key-features-section h3 {
      color: #007bff;
    }

    /* How It Works Section Styles */
    .how-it-works-section {
      padding: 50px 0;
    }

    .how-it-works-icon {
      color: #007bff;
    }

    /* Call-to-Action Section Styles */
    .cta-section {
      background-color: #007bff;
      color: #fff;
      padding: 50px 0;
    }

    /* Footer Styles */
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 15px 0;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">Permission Management System</a>

      <!-- Add navigation links here -->
      <ul class="navbar-nav ml-auto">
        @guest
          <!-- Show login button for guests (non-authenticated users) -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
        @endguest

        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
          </li>
        <!-- Show logout button for authenticated users -->
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
              @csrf
              <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
            </form>
          </li>
        @endauth
      </ul>
    </div>
  </nav>


  <!-- Main content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="py-4 bg-dark text-white text-center">
    <div class="container">
      <p>© 2023 Your Company. All rights reserved.</p>
    </div>
  </footer>

  <!-- Add Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
