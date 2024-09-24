@extends('master.layout')
@section('section')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_2.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread">Conference Details</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/home">Home <i class="ion-ios-arrow-forward"></i></a></span>
                        <span class="mr-2"><a href="/home/conferences">Upcoming <i
                                    class="ion-ios-arrow-forward"></i></a></span>
                        <span>Detail <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $conference->title }}</h1>
                <img src="{{ asset('storage/conference/' . $conference->image) }}" alt="{{ $conference->title }}"
                    class="img-fluid mb-4">
                <p class="text-muted"><strong>Date:</strong> {{ $conference->date }}</p>
                <p class="text-muted"><strong>Location:</strong> {{ $conference->location }}</p>
                <p class="lead">{{ $conference->description }}</p>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Conference Details</h5>
                        <p><strong>Date:</strong> {{ $conference->date }}</p>
                        <p><strong>Location:</strong> {{ $conference->location }}</p>
                        <p><strong>Price:</strong> ${{ $conference->price }}</p>
                        <p><strong>Discount:</strong> {{ $conference->discount }}% for member</p>
                        <a href="/register" class="btn btn-success w-100">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="#" class="p-5 bg-light">
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="url" class="form-control" id="website">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                </div>

            </form>
        </div>
    </div>
@endsection
