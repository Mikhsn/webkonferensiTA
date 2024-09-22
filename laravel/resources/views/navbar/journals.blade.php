@extends('master.layout')
@section('section')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_2.jpg');"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <h1 class="mb-3 bread">Journals</h1>
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="/home">Home <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Journals <i class="ion-ios-arrow-forward"></i></span>
                </p>
            </div>
        </div>
    </div>
</section>

<div class="container my-5">
    <h2 class="text-center mb-4"><b>Our Journals</b></h2>
    <div class="row text-center">
        <!-- Jurnal 1 -->
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="https://joiv.org/index.php/joiv" class="journal-link">
                <div class="journal-card shadow-lg">
                    <img src="/images/joiv-jurnal.jpg" class="img-fluid journal-img rounded" alt="Journal 1">
                    <h5 class="mt-3 font-weight-bold">International Journal on Informatics Visualization</h5>
                    <p class="text-muted">Volume 23, Issue 4, 2024</p>
                </div>
            </a>
        </div>
        <!-- Jurnal 2 -->
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="https://jiptek.org/index.php/jiptek" class="journal-link">
                <div class="journal-card shadow-lg">
                    <img src="/images/jiptek-jurnal.jpg" class="img-fluid journal-img rounded" alt="Journal 2">
                    <h5 class="mt-3 font-weight-bold">Jurnal Pengabdian Ilmu Pengetahuan dan Teknologi</h5>
                    <p class="text-muted">Volume 7, Issue 2, 2024</p>
                </div>
            </a>
        </div>
        <!-- Jurnal 3 -->
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="https://ijasce.org/index.php/IJASCE" class="journal-link">
                <div class="journal-card shadow-lg">
                    <img src="/images/jitsi-jurnal.jpg" class="img-fluid journal-img rounded" alt="Journal 3">
                    <h5 class="mt-3 font-weight-bold">Jurnal Ilmiah Teknologi Sistem Informasi</h5>
                    <p class="text-muted">Volume 12, Issue 3, 2024</p>
                </div>
            </a>
        </div>
        <!-- Jurnal 4 -->
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="https://submitin.org/index.php/submiten" class="journal-link">
                <div class="journal-card shadow-lg">
                    <img src="/images/submit-jurnal.jpg" class="img-fluid journal-img rounded" alt="Journal 4">
                    <h5 class="mt-3 font-weight-bold">International Journal of Sustainable Business Management and Information Technology</h5>
                    <p class="text-muted">Volume 7, Issue 2, 2024</p>
                </div>
            </a>
        </div>
        <!-- Jurnal 5 -->
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="https://comien.org/i" class="journal-link">
                <div class="journal-card shadow-lg">
                    <img src="/images/compu-jurnal.png" class="img-fluid journal-img rounded" alt="Journal 5">
                    <h5 class="mt-3 font-weight-bold">International Journal on Computational Engineering</h5>
                    <p class="text-muted">Volume 7, Issue 2, 2024</p>
                </div>
            </a>
        </div>
        <!-- Jurnal 6 -->
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="https://jakia.org/index.php/jakia" class="journal-link">
                <div class="journal-card shadow-lg">
                    <img src="/images/jakia-jurnal.png" class="img-fluid journal-img rounded" alt="Journal 6">
                    <h5 class="mt-3 font-weight-bold">Jurnal Kesehatan Ibu dan Anak</h5>
                    <p class="text-muted">Volume 7, Issue 2, 2024</p>
                </div>
            </a>
        </div>
    </div>
</div>

<style>
    .journal-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        padding: 15px;
        background-color: #fff;
        border-radius: 10px;
        text-align: center;
        height: 100%;
    }

    .journal-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .journal-img {
        border-radius: 10px;
        height: 200px;
        object-fit: cover;
    }

    .journal-link {
        text-decoration: none;
        color: inherit;
    }

    .journal-link:hover .journal-card {
        background-color: #f7f7f7;
    }

    .hero-wrap {
        position: relative;
        height: 50vh;
    }

    .hero-wrap .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }

    .hero-wrap h1 {
        color: #fff;
        font-size: 3rem;
        font-weight: bold;
    }

    .breadcrumbs {
        color: #fff;
    }

    .breadcrumbs a {
        color: #ffc107;
        text-decoration: none;
    }

    .breadcrumbs a:hover {
        text-decoration: underline;
    }
</style>

@endSection
