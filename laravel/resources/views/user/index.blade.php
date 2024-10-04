@extends('master.user')
@section('main')
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
            <div class="container mt-3">
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
                                            <p><strong>Date:</strong>
                                                {{ \Carbon\Carbon::parse($conference->date)->format('d-m-Y') }}</p>
                                            <p><strong>Location:</strong> {{ $conference->location }}</p>

                                            <!-- Harga conference -->
                                            <p><strong>Price:</strong> Rp.{{ $conference->price }}</p>

                                            <!-- Tombol untuk melihat detail dan membeli conference -->
                                            <div class="d-flex justify-content-start mt-3">
                                                <a href="{{ route('conferences.showForUser', $conference->id) }}"
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
