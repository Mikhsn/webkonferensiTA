@extends('master.layout')
@section('section')
    <style>
        .team-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .team-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .team-heading h2 {
            font-size: 36px;
            font-weight: 700;
            color: #333;
        }

        .team-member {
            display: flex;
            align-items: center;
            background: #fff;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .team-member img {
            border-radius: 15px 0 0 15px;
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .team-info {
            padding: 20px;
        }

        .team-info h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .team-info span {
            display: block;
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .team-info p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .team-info ul {
            display: flex;
            gap: 10px;
        }

        .team-info ul li {
            list-style: none;
        }

        .team-info ul li a {
            color: #007bff;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .team-info ul li a:hover {
            color: #0056b3;
        }
    </style>
    <style>
        .sponsor-section {
            padding: 60px 0;
            background-color: #f9f9f9;
        }

        .sponsor-section h2 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 50px;
        }

        .sponsor-img {
            max-width: 100%;
            height: auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
        }

        .sponsor-img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .sponsor-wrapper {
            padding: 20px;
        }
    </style>

    <div>
        <div class="hero-wrap" style="background-image: url('/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-lg-6 col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Conference 2024
                            <br><span>We help surface innovations in Tech</span>
                        </h1>
                        <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                                class="icon-globe mr-2"></span><b>SOTVI</b> is changing the way people and university work.
                        </p>
                        <p><a href="/login" class="btn btn-primary">Join now</a></p>
                        {{-- <div id="timer" class="d-flex">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div> --}}
                    </div>
                </div>
                <div class="col-lg-2 col"></div>

            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4"><b>Our Sponsors</b></h2>
        <div class="row text-center">
            <div class="col-md-3 col-sm-6 sponsor-wrapper">
                <a href="#">
                    <img src="/images/sponsor1.jpg" class="img-fluid sponsor-img" alt="Sponsor 1">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 sponsor-wrapper">
                <a href="#">
                    <img src="/images/sponsor2.png" class="img-fluid sponsor-img" alt="Sponsor 2">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 sponsor-wrapper">
                <a href="#">
                    <img src="images/sponsor3.jpeg" class="img-fluid sponsor-img" alt="Sponsor 3">
                </a>
            </div>
            <div class="col-md-3 col-sm-6 sponsor-wrapper">
                <a href="#">
                    <img src="images/sponsor1.jpg" class="img-fluid sponsor-img" alt="Sponsor 4">
                </a>
            </div>
        </div>
    </div>

    <section class="ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row">
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center py-4 bg-primary mb-4">
                        <div class="text">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-guest"></span>
                            </div>
                            <strong class="number" data-number="3590">0</strong>
                            <span>Papers Pulished</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center py-4 bg-primary mb-4">
                        <div class="text">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-handshake"></span>
                            </div>
                            <strong class="number" data-number="9630">0</strong>
                            <span>Awards Winning</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center py-4 bg-primary mb-4">
                        <div class="text">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-chair"></span>
                            </div>
                            <strong class="number" data-number="8560">0</strong>
                            <span>Global Partners</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18 text-center py-4 bg-primary mb-4">
                        <div class="text">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="flaticon-idea"></span>
                            </div>
                            <strong class="number" data-number="4850">0</strong>
                            <span>Active Author</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section ftco-no-pt mt-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Conference Upcoming</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        @foreach ($conferences as $conference)
                            <div class="item">
                                <div class="testimony-wrap text-center py-4 pb-5">
                                    <div class="user-img mb-4"
                                        style="background-image: url('{{ asset('storage/conference/' . $conference->image) }}')">
                                    </div>
                                    <div class="text pt-4">
                                        <p class="mb-4">{{ $conference->title }}.<br>{{ $conference->date }}</p>
                                        <p class="name">{{ $conference->short_title }}</p>
                                        <span class="position">{{ $conference->location }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="ftco-section ftco-gallery ftco-no-pt">
        <div class="container-fluid px-4">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">Conference Gallery</h2>
                </div>
            </div>
            <div class="row">
                @foreach($conferences as $conference)
                <div class="col-md-3 ftco-animate">
                    <a href="{{ asset ('storage/conference/'. $conference->image ) }}" class="gallery image-popup img d-flex align-items-center"
                    style="background-image: url('{{ asset('storage/conference/' . $conference->image) }}')">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-globe"></span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    {{ $news->links('vendor.pagination.bootstrap-4') }} <!-- Ganti 'default' dengan nama file view pagination yang diinginkan -->
                </div>
            </div>
        </div>
    </section>


    <section class="team-section">
        <div class="container">
            <div class="team-heading">
                <h2>Our Team</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <img src="/images/alde.jpg" alt="Robert Bonner">
                        <div class="team-info">
                            <h3>Alde Alanda</h3>
                            <span>Founder</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <ul>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <img src="/images/rahmat.jpg" alt="Rahmat Hidayat">
                        <div class="team-info">
                            <h3>Rahmat Hidayat</h3>
                            <span>Founder</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <ul>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <img src="/images/hidra.png" alt="Hidra Amnur">
                        <div class="team-info">
                            <h3>Hidra Amnur</h3>
                            <span>Founder</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <ul>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <img src="/images/rasyidah.jpeg" alt="Alde Alanda">
                        <div class="team-info">
                            <h3>Rasyidah</h3>
                            <span>Researcher</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <ul>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <img src="/images/rita.jpg" alt="Rita Afriyeni">
                        <div class="team-info">
                            <h3>Rita Afriyeni</h3>
                            <span>Researcher</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            </p>
                            <ul>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <h2 class="text-center mb-5">Latest News</h2>
            <div class="row d-flex justify-content-center">
                @foreach ($news as $item)
                    <!-- Looping data dari database -->
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
                                <p class="card-text">{{ Str::limit($item->content, 100) }}</p>
                                <!-- Potong konten menjadi 100 karakter -->
                                <a href="/home/news/{{ $item->id }}" class="btn btn-outline-primary btn-sm">Read
                                    more</a>
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
