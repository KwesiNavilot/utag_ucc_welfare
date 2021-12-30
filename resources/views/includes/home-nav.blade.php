<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <h1 class="logo mr-auto"><a href="{{ route('home') }}">UTAG Welfare</a></h1>

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

    </div>
</header>
