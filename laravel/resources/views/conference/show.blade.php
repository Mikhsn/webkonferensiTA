@extends('master.member')
@section('page')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/conference/' . $conference->image) }}" class="card-img-top" alt="{{ $conference->title }}" style="height: 400px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title">{{ $conference->title }}</h2>
                    <p class="card-text">{{ $conference->description }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($conference->date) }}</p>
                    <p><strong>Location:</strong> {{ $conference->location }}</p>

                    @if ($conference->discount)
                        <p>
                            <strong>Original Price:</strong> <del>Rp{{  number_format($conference->price, 2, ',', '.') }}</del><br>
                            <strong>Discounted Price:</strong>Rp{{ number_format($conference->price - ($conference->price * $conference->discount) / 100, 2, ',', '.') }}
                            <br>
                            <span class="badge bg-success">{{ $conference->discount }}% off</span>
                        </p>
                    @else
                        <p><strong>Price:</strong> Rp{{ number_format($conference->price, 2, ',', '.') }}</p>
                    @endif

                    <div class="mt-4">
                        <form action="{{ route('conference.buy', $conference->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Info -->
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Event Details</h5>
                    <p><strong>Title:</strong> {{ $conference->title }}</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($conference->date) }}</p>
                    <p><strong>Location:</strong> {{ $conference->location }}</p>
                    <p><strong>Price:</strong>Rp{{ number_format($conference->price, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
