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
    <link rel="stylesheet" href="{{ asset('css/styless.css') }}">

</head>

<body>
    <a class="navbar-brand" href="/home"> <img src="/images/logo-sotvi.png" alt="Sotvi Logo"
            style="height: 40px;"></a>
    <div class="register-container">
        <h2>Register</h2>
        <hr>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('create') }}" method="POST">
            @csrf
            <!-- Baris Pertama: Nama Lengkap & Email -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                    <i class="fas fa-user input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <i class="fas fa-envelope input-icon"></i>
                </div>
            </div>
            <!-- Baris Kedua: Password & Konfirmasi Password -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password"
                        required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
            </div>
            <!-- Baris Ketiga: Tipe Pengguna & organisasi -->
            <div class="form-row">
                {{-- <div class="form-group col-md-6">
                    <select class="form-control" name="role_id" required>
                        <option value="" disabled selected>Select Role</option>
                        <option value="2">User</option>
                        <option value="3">Member (Get Discount)</option>
                    </select>
                    <i class="fas fa-user-tag input-icon"></i>
                </div> --}}
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Organization" name="organization" required>
                    <i class="fas fa-school input-icon"></i>
                </div>
            </div>
            <!-- Baris Keempat: Alamat & Telepon -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Address" name="address" required>
                    <i class="fas fa-home input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="tel" class="form-control" placeholder="Phone Number" name="phone" required>
                    <i class="fas fa-phone input-icon"></i>
                </div>
            </div>
            <!-- Baris Kelima: Kota & Negara -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="City" name="city" required>
                    <i class="fas fa-city input-icon"></i>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="country" name="country" required>
                    <i class="fas fa-globe input-icon"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-custom">Register</button>
        </form>
        <div class="login-link">
            <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
    @include('include.script')


</body>

</html>
