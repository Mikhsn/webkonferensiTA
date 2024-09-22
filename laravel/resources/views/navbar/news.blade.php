@extends('master.layout')
@section('section')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/images/bg_3.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread text-white">News</h1>
                    <p class="breadcrumbs text-light">
                        <span class="mr-2"><a href="/home" class="text-light">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span>
                        <span>News <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <h2 class="text-center mb-5">Latest News</h2>
            <div class="row d-flex justify-content-center">
                @foreach($news as $item) <!-- Looping data dari database -->
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <a href="/home/news/{{ $item->id }}" class="block-20"
                            style="background-image: url('/images/{{ $item->image }}'); height: 200px; background-size: cover; background-position: center;">
                        </a>
                        <div class="card-body">
                            <div class="meta mb-2">
                                <small class="text-muted">{{ $item->created_at->format('F d, Y') }}</small>
                                <small class="ml-3 text-muted">Admin</small>
                            </div>
                            <h5 class="card-title">
                                <a href="/home/news/{{ $item->id }}">{{ $item->title }}</a>
                            </h5>
                            <p class="card-text">{{ Str::limit($item->content, 100) }}</p> <!-- Potong konten menjadi 100 karakter -->
                            <a href="/home/news/{{ $item->id }}" class="btn btn-outline-primary btn-sm">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    {{ $news->links('vendor.pagination.bootstrap-5') }} <!-- Ganti 'default' dengan nama file view pagination yang diinginkan -->
                </div>
            </div>
        </div>
    </section>

@endsection
