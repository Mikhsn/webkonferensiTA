@extends('master.user')
@section('main')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Browse Conferences</h2>

        <!-- Conference Filters (Optional) -->
        <div class="row mb-4">
            <div class="col-md-4">
                <select class="form-select" aria-label="Filter by Category">
                    <option selected>Filter by Category</option>
                    <option value="1">AI & Machine Learning</option>
                    <option value="2">Blockchain</option>
                    <option value="3">Cybersecurity</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" aria-label="Filter by Date">
                    <option selected>Filter by Date</option>
                    <option value="1">Upcoming</option>
                    <option value="2">Past</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search conferences..." aria-label="Search">
            </div>
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
                                        <p><strong>Price:</strong> ${{ $conference->price }}</p>

                                        <!-- Tombol untuk melihat detail dan membeli conference -->
                                        <div class="d-flex justify-content-start mt-3">
                                            <a href="{{ route('conferences.showForUser', $conference->id) }}" class="btn btn-outline-primary me-3">View More</a>
                                            <form action="{{ route('conference.buy', $conference->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Buy Conference</button>
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
    </div>
@endsection
