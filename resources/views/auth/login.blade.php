<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" @if(isset($_COOKIE["email"])) value ="{{ $_COOKIE["email"] }}" @endif required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" @if(isset($_COOKIE["password"])) value ="{{ $_COOKIE["password"] }}" @endif required>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            
                            
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('images/google_logo.png')}}" alt="Google Logo" width="120" height="100%" class="mr-2" style="padding-top:20px; padding-left:20px;"> 
                                <a href="{{ route('googleLogin') }}" class="text-decoration-none text-sky-blue">Continue with Google</a>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
