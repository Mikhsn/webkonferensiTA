@extends('master.member')
@section('page')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Browse Conferences</h2>
        @if ($conferences->isEmpty())
            <div class="alert alert-warning text-center">Tidak ada data conference.</div>
        @else
            <!-- Conference Filters (Optional) -->
            <div class="mb-3">
                <form action="{{ url()->current() }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search Conference..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>

            <!-- Conference Cards -->
            <div class="container mt-5">
                <div class="row">
                    @foreach ($conferences as $conference)
                        <div class="col-12 mb-4">
                            <div class="card horizontal-card shadow-sm">
                                <div class="row no-gutters">
                                    <!-- Gambar conference -->
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/conference/' . $conference->image) }}" class="card-img"
                                            alt="{{ $conference->title }}" style="height: 100%; object-fit: cover;">
                                    </div>

                                    <!-- Informasi conference -->
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <!-- Judul conference -->
                                            <h5 class="card-title">{{ $conference->title }}</h5>

                                            <!-- Deskripsi conference -->
                                            <p class="card-text">{{ $conference->description }}</p>

                                            <!-- Tanggal dan Lokasi conference -->
                                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($conference->date) }}</p>
                                            <p><strong>Location:</strong> {{ $conference->location }}</p>

                                            <!-- Harga conference dengan diskon untuk member -->
                                            @if ($isMember && $conference->discount)
                                                <p>
                                                    <strong>Original Price:</strong> <del>Rp{{  number_format($conference->price, 2, ',', '.') }}</del>
                                                    <br>
                                                    <strong>Discounted Price:</strong>
                                                    Rp{{ number_format($conference->price - ($conference->price * $conference->discount) / 100, 2, ',', '.') }}
                                                    <br>
                                                    <span class="badge bg-success">{{ $conference->discount }}% off</span>
                                                </p>
                                            @else
                                            <p><strong>Price:</strong> Rp{{ number_format($conference->price, 2, ',', '.') }}</p>
                                            @endif

                                            <!-- Tombol untuk melihat detail dan membeli conference -->
                                            <div class="d-flex justify-content-start mt-3">
                                                <a href="{{ route('conferences.showForMember', $conference->id) }}"
                                                    class="btn btn-outline-primary me-3">View More</a>
                                                <form action="{{ route('conference.buy', $conference->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Register</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
