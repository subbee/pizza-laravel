<!-- Top info bar begins -->
<div class="top-info-section">
    <div class="top-info-bar-container w-container">
        <div class="w-row">
            <div class="top-info-info-column-first w-col w-col-4">
                <div class="top-info-info-text">
                    <img src="/assets/images/location.png" alt="Pizza Mester">
                    <strong>1234 Budapest, Pizza u. 123. </strong>
                </div>
            </div>
            <div class="top-info-info-column-center w-col w-col-4">
                <div class="top-info-info-text">
                    <img src="/assets/images/ph.png" alt="Pizza Mester">
                    &nbsp;<strong>INGYENES KISZÁLLÍTÁS 10.000 Ft felett</strong>
                </div>
            </div>
            <div class="top-info-info-column-last w-col w-col-4">
                <div class="top-info-info-text">
                    <strong>Közösségi oldalaink</strong>
                    <a href="http://www.facebook.com"><img src="/assets/images/nav-facebook.svg" alt="Pizza Mester"></a>
                    <a href="http://www.twitter.com"><img src="/assets/images/nav-twitter.svg" alt="Pizza Mester"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top info bar ends -->

<!-- Header begins -->
<header class="header">
    <div class="navbar w-nav" data-animation="default" data-collapse="medium" data-doc-height="1" data-duration="500" data-no-scroll="1">
        <div class="container w-container">
            <!-- Mobile nav section begins -->
            <div class="menu-button w-nav-button">
                <div class="menu-icon w-icon-nav-menu"></div>
            </div>
            <!-- Mobile nav section ends -->

            <!-- Logo section begins -->
            <a class="brand w-nav-brand" href="{{ url('/') }}">
                <img src="/assets/images/logo.png" alt="Pizza Mester">
            </a>
            <!-- Logo section ends -->

            <!-- Main navigation begins -->
            <nav class="nav-menu w-nav-menu">
                {{-- ✅ Laravel route-ok használata --}}
                <a class="main-link w-nav-link" href="{{ url('/') }}">Főoldal</a>
                <a class="main-link w-nav-link" href="{{ route('pizzak.index') }}">Menü</a>

                <a class="main-link w-nav-link" href="{{ route('contact.create') }}">Kapcsolat</a>

                @guest
                    <a class="main-link w-nav-link" href="{{ route('login') }}">Bejelentkezés</a>
                    @if (Route::has('register'))
                        <a class="main-link w-nav-link" href="{{ route('register') }}">Regisztráció</a>
                    @endif
                @endguest

                @auth
                    <a class="main-link w-nav-link" href="{{ route('dashboard') }}">dashboard</a>

                    @admin
                    <div class="dropdown">
                        <a class="main-link w-nav-link" href="#">Admin ▾</a>
                        <ul class="dropdown-menu">
                            <li><a class="w-nav-link" href="{{ route('admin.pizzak.index') }}">Pizzák</a></li>
                            <li><a class="w-nav-link" href="{{ route('admin.messages.index') }}">Üzenetek</a></li>
                            <li><a class="w-nav-link" href="{{ route('admin.orders.index') }}">Rendelések</a></li>
                        </ul>
                    </div>
                    @endadmin



                    <a class="main-link w-nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth

            </nav>
            <!-- Main navigation ends -->
        </div>
    </div>
</header>
<!-- Header ends -->
