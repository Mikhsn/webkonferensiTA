@extends('master.user')
@section('main')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Welcome, {{ Auth::user()->name }}</h2>

        <!-- User Profile Section -->
        <div class="row mb-4">
            <div class="col-md-12 col-center">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Upgrade to Member</h5>
                        <p>Upgrade your account to enjoy discounts and access exclusive features!</p>
                        <form action="{{ route('upgrade.member') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Upgrade to Member</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Your Profile</h5>
                        <p class="card-text">Name: {{ Auth::user()->name }}</p>
                        <p class="card-text">Email: {{ Auth::user()->email }}</p>
                        <a href="/user/edit" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>

            <!-- Recent Conference Purchase -->

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Recently Purchased Conference</h5>
                        <p class="card-text">You have not purchased any conferences yet.</p>
                        <a href="/user/user" class="btn btn-success">Browse Conferences</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Available Conferences Section -->
        <h3 class="text-center mb-4">Available Conferences</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($conferences as $conference)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/conference/' . $conference->image) }}" class="card-img-top"
                            alt="{{ $conference->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($conference->description, 100) }}</p>
                            <a href="{{ route('conferences.showForUser', $conference->id) }}" class="btn btn-primary">View
                                >></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <!-- Menampilkan link pagination -->
                {{ $conferences->links('vendor.pagination.bootstrap-5') }}
            </ul>
        </nav>
    </div>
@endsection
