<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <link rel="icon" href="/images/logo.png" type="icon">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <style>
        /* Horizontal card layout */
        .horizontal-card {
            display: flex;
            flex-direction: row;
            border: none;
        }

        .horizontal-card .card-img {
            width: 100%;
            height: auto;
        }

        .horizontal-card .card-body {
            padding: 20px;
        }

        .horizontal-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .horizontal-card .card-text {
            font-size: 1rem;
            color: #555;
        }

        .horizontal-card .btn {
            padding: 10px 20px;
        }

        .btn-outline-primary {
            border: 2px solid #007bff;
            color: #007bff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

         /* Global styles */
         .card {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Button styles */
        .btn-view {
            background-color: #007bff;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-view:hover {
            background-color: #0056b3;
        }

        /* Hover effect for card */
        .hover-card:hover {
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
        }

        /* Adjusting card image */
        .card-img-top {
            border-radius: 10px 10px 0 0;
            transition: opacity 0.3s ease;
        }

        .card-img-top:hover {
            opacity: 0.9;
        }
    </style>

</head>


<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="#"><img src="/images/logo-sotvi.png" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">

                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="{{ asset ('assets/images/faces/2.jpg') }}" alt="Avatar">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ Auth::user()->name }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">User Biasa</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg">
                                    <li>
                                        <form action="/user/profile" method="#" class="dropdown-item">

                                            <button type="submit" class="btn btn-link dropdown-item">My
                                                Profile</button>
                                        </form>
                                    </li>
                                    <li>
                                        <form action="/logout" method="post" class="dropdown-item">
                                            @csrf
                                            <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>

                            </div>

                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item  ">
                                <a href="/user" class='menu-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <li class="menu-item  ">
                                <a href="/user/user" class='menu-link'>
                                    <i class="bi bi-journal-check"></i>
                                    <span>Conference</span>
                                </a>
                            </li>

                            <li class="menu-item  ">
                                <a href="/myconference" class='menu-link'>
                                    <i class="bi bi-stack"></i>
                                    <span>My Conference</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </header>

            <div class="content-wrapper container">


                @yield('main')

            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2025 &copy; Sotvi</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="#">Sotvi</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/pages/horizontal-layout.js') }}"></script>
    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

</body>

</html>
