<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center p-0">
        <div class="col-lg-1 logo mr-auto">
            <a href="{{ route('home') }}" class="d-flex w-auto">
                <img src="{{ asset('/images/utag-ucc-logo.png') }}" alt="UTAG-UCC Logo">
            </a>
        </div>

        <nav id="navigation" class="nav-menu d-lg-block list-unstyled">
            <ul class="list-unstyled d-flex m-lg-0">
                <li class="active position-relative">
                    <a href="{{ route('home') }}">Home</a>
                </li>

                <li class="position-relative">
                    <a href="#about">About</a>
                </li>

                <li class="position-relative">
                    <a href="#claims">Benefit Types</a>
                </li>

                <li class="position-relative">
                    <a href="#contact">Contact Us</a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

        <a href="{{ route('login') }}" class="rounded-button">Login</a>

        <button id="sidebar-toggle" class="hide-hidden-nav navbar-toggler navbar-light bg-light" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>

<div id="hidden-nav" class="hidden-nav col-lg-12 col-md-12 col-sm-12 col p-0">
    <a href="javascript:void(0)" id="hide-nav" class="closebtn">&times;</a>

    <nav class="navbar hid col-lg-12 col-md-12 col-sm-12 col mt-5 text-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item">
                <a id="about-h" class="nav-link" href="#about">About</a>
            </li>

            <li class="nav-item">
                <a id="claims-h" class="nav-link" href="#claims">Benefit Types</a>
            </li>

            <li class="nav-item">
                <a id="contact-h" class="nav-link" href="#contact">Contact Us</a>
            </li>

            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
        </ul>
    </nav>
</div>
