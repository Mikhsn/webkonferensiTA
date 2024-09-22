@extends('master.layout')
@section('section')

<style>
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

</style>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_4.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread">Ourteam</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/home">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Ourteam <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <section class="team-section">
        <div class="container mt-5">
            <div class="team-heading">
                <h2>Our Team</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="team-member">
                        <img src="/images/alde.jpg" alt="Robert Bonner">
                        <div class="team-info">
                            <h3>Alde alanda</h3>
                            <span>Founder</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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
                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
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

@endSection
