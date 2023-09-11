<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS file if needed -->
    <link rel="stylesheet" href="path/to/your/styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">College Events</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
               
               
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only"></span></a>
                </li>
                <!-- Add more navigation items if needed -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('products') }}">Products <span class="sr-only"></span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
            <!-- Display the user's email address -->
            <span class="navbar-text">
                Welcome, {{ Auth::user()->email }}
            </span>
            <!-- Logout form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Welcome to the Home Page!</h1>
                <!-- Add your home page content here -->
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
