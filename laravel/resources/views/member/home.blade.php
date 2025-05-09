@extends('master.member')
@section('page')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Welcome, {{ Auth::user()->name }} You Are Member Now</h2>
        @if (auth()->user()->role_id === 3)
        {{-- <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center" style="height: 200px;">
                            <h5 class="card-title text-center">Please Download</h5>
                            <p class="card-text text-center">
                                <strong>Your Member ID:</strong> {{ auth()->user()->member_id }}
                            </p>
                            <a href="{{ route('member.download', auth()->user()->id) }}"  class="btn btn-primary">
                                <i class="fas fa-download"></i> Download Member Card
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        @endif
        <!-- User Profile Section -->
        <div class="row mb-4">
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Your Profile</h5>
                        <p class="card-text">Name: {{ Auth::user()->name }}</p>
                        <p class="card-text">Email: {{ Auth::user()->email }}</p>
                        <a href="/member/edit" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div> --}}
            <!-- Recent Conference Purchase -->
            {{-- <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recently Purchased Conference</h5>
                        <p class="card-text">You have not purchased any conferences yet.</p>
                        <a href="/member/member" class="btn btn-success">Browse Conferences</a>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- Available Conferences Section -->
        {{-- <h3 class="text-center mb-4">Available Conferences</h3> --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($conferences as $conference)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/conference/' . $conference->image) }}" class="card-img-top"
                            alt="{{ $conference->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <p class="card-text">{{ Str::limit($conference->description, 100) }}</p>
                            <a href="{{ route('conferences.showForMember', $conference->id) }}" class="btn btn-primary">View
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
