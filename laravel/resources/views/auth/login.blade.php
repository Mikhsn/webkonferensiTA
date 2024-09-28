<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sotvi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('/images/logo.png') }}" type="icon">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
          .login-container {
                transition: all 0.3s ease;
            }

            .login-container:hover {
                transform: translateY(-5px);
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            }
    </style>
</head>
<body>

    <a class="navbar-brand" href="/home"> <img src="/images/logo-sotvi.png" alt="Sotvi Logo"
            style="height: 40px;"></a>
    <div class="login-container">
        <h2>Login</h2>
        <hr>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('login.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    name="email" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <i class="fas fa-envelope input-icon"></i>
            </div>
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <i class="fas fa-lock input-icon"></i>
            </div>
            <div class="form-group">
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-custom">Login</button>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
    @include('include.script')
</body>

</html>
