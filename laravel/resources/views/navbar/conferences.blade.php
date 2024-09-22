@extends('master.layout')
@section('section')
<style>
    .conference-section {
        padding: 60px 0;
        background-color: #f9f9f9;
    }

    .conference-section h2 {
        font-size: 38px;
        font-weight: bold;
        color: #333;
        margin-bottom: 50px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
        height: 220px;
        object-fit: cover;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
        text-align: center;
    }

    .card-text {
        font-size: 16px;
        color: #555;
        margin-bottom: 20px;
        height: 60px;
        line-height: 1.5;
        overflow: hidden;
    }

    .btn-primary {
        background-color: #ff6f61;
        border: none;
        border-radius: 30px;
        padding: 10px 30px;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #e65550;
    }

    .card-footer {
        background-color: #f8f8f8;
        border-top: none;
        padding: 10px 20px;
    }

    .row-cols-1 .col {
        margin-bottom: 30px;
    }

    @media (min-width: 768px) {
        .card-body {
            min-height: 200px;
        }
    }
</style>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/about.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread">Conference Upcoming</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/home">Home <i class="ion-ios-arrow-forward"></i></a></span>
                        <span>Upcoming <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Upcoming Conferences</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($conferences as $conference)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/conference/' . $conference->image) }}" class="card-img-top" alt="{{ $conference->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $conference->title }}</h5>
                            <p class="card-text">{{ Str::limit($conference->description, 100) }}</p>
                            <a href="{{ route('conference.detail', $conference->id) }}" class="btn btn-primary">View >></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <br>


@endsection
