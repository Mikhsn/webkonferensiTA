@extends('master.member')
@section('page')
<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Profile</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Update Your Profile Information</h5>
                </div>
                <div class="card-body">
                    <form action="/member/update" method="POST" enctype="multipart/form-data">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <!-- Password Update -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password (Optional)</label>
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Leave blank if not changing">
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter password">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Update Profile</button>
                        </div>
                        <div class="d-grid mt-2">
                        <a href="{{ route('member.home') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
