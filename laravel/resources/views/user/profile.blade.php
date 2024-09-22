@extends('master.user')
@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 text-center">

                        <h5 class="card-title fw-bold mb-3">Your Profile</h5>

                        <!-- User Info in Two Columns -->
                        <div class="row">
                            <div class="col-md-6">
                                <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-user me-2 text-success"></i>
                                    <strong>Name:</strong>
                                    <span class="ms-2">{{ Auth::user()->name }}</span>
                                </p>
                                <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-envelope me-2 text-warning"></i>
                                    <strong>Email:</strong>
                                    <span class="ms-2">{{ Auth::user()->email }}</span>
                                </p>
                                <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-building me-2 text-primary"></i>
                                    <strong>Organization:</strong>
                                    <span class="ms-2">{{ Auth::user()->organization }}</span>
                                </p>
                                <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                    <strong>Address:</strong>
                                    <span class="ms-2">{{ Auth::user()->address }}</span>
                                </p>

                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                 <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-phone-alt me-2 text-success"></i>
                                    <strong>Phone:</strong>
                                    <span class="ms-2">{{ Auth::user()->phone }}</span>
                                </p>
                                <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-city me-2 text-info"></i>
                                    <strong>City:</strong>
                                    <span class="ms-2">{{ Auth::user()->city }}</span>
                                </p>
                                <p class="d-flex align-items-center mb-3">
                                    <i class="fas fa-flag me-2 text-warning"></i>
                                    <strong>Country:</strong>
                                    <span class="ms-2">{{ Auth::user()->country }}</span>
                                </p>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-center gap-2">
                            <a href="/user/edit" class="btn btn-primary">
                                <i class="fas fa-edit me-1"></i> Edit Profile
                            </a>
                            <a href="{{ route('user.home') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
