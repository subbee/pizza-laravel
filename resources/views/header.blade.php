<!-- Top info bar begins -->
<div class="top-info-section">
    <div class="top-info-bar-container w-container">
        <div class="w-row">
            <div class="top-info-info-column-first w-col w-col-4">
                <div class="top-info-info-text">
                    <img src="/assets/images/location.png" alt="N.Y. Pizza">
                    <strong>123 Broadway St., New York, NY 12345</strong>
                </div>
            </div>
            <div class="top-info-info-column-center w-col w-col-4">
                <div class="top-info-info-text">
                    <img src="/assets/images/ph.png" alt="N.Y. Pizza">
                    &nbsp;<strong>(123) 456 - 7890. Free delivery over $15!</strong>
                </div>
            </div>
            <div class="top-info-info-column-last w-col w-col-4">
                <div class="top-info-info-text">
                    <strong>We are social! Like & follow us.</strong>
                    <a href="http://www.facebook.com"><img src="/assets/images/nav-facebook.svg" alt="N.Y. Pizza"></a>
                    <a href="http://www.twitter.com"><img src="/assets/images/nav-twitter.svg" alt="N.Y. Pizza"></a>
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
                <img src="/assets/images/logo.png" alt="N.Y. Pizza">
            </a>
            <!-- Logo section ends -->

            <!-- Main navigation begins -->
            <nav class="nav-menu w-nav-menu">
                {{-- ✅ Laravel route-ok használata --}}
                <a class="main-link w-nav-link" href="{{ url('/') }}">home</a>
                <a class="main-link w-nav-link" href="{{ route('pizzak.index') }}">menu</a>
                <a class="main-link w-nav-link" href="#">specials</a>
                <a class="main-link w-nav-link" href="#">about</a>
                <a class="main-link w-nav-link" href="#">photos</a>
                <a class="main-link w-nav-link" href="#">catering</a>
                <a class="main-link w-nav-link" href="{{ route('contact.show') }}">contact</a>
            </nav>
            <!-- Main navigation ends -->
        </div>
    </div>
</header>
<!-- Header ends -->
