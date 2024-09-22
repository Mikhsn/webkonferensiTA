<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/home"> <img src="/images/logo-sotvi.png" alt="Sotvi Logo"
                style="height: 40px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a href="/home" class="nav-link">Home</a></li>
                <li class="nav-item {{ Request::is('home/journals') ? 'active' : '' }}"><a href="/home/journals"
                        class="nav-link">Journals</a></li>
                <li class="nav-item {{ Request::is('home/conferences') ? 'active' : '' }}"><a href="/home/conferences"
                        class="nav-link">Conferences</a></li>
                <li class="nav-item {{ Request::is('home/news') ? 'active' : '' }}"><a href="/home/news"
                        class="nav-link">News</a></li>
                <li class="nav-item {{ Request::is('home/ourteam') ? 'active' : '' }}"><a href="/home/ourteam"
                        class="nav-link">Ourteam</a></li>
                {{-- <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="contact.html"
                        class="nav-link">Project</a></li> --}}

                @if (!Request::is('home','login'))
                <li class="nav-item cta mr-md-2"><a href="/login" class="nav-link">Login</a></li>
                <li class="nav-item cta mr-md-2"><a href="/register" class="nav-link">Register</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
