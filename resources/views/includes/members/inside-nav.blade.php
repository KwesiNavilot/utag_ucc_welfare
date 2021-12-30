<nav class="top-nav navbar navbar-expand-sm bg-white navbar-white fixed-top @auth contact @endauth">
    <div class="container-fluid">
        <div class="left-header">
        </div>

        <ul class="navbar-nav .justify-content-end">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <div class="user-opts-a">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __(Auth::user()->firstname . " " . Auth::user()->lastname) }}
{{--                            <img src="{{ Avatar::create(Auth::user()->username)->setDimension(35)->setFontSize(25)->toBase64() }}"/>--}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('members.account') }}">{{ __('My Account') }}</a>
{{--                            <a class="dropdown-item" href="{{ route('showimport') }}">{{ __('Import Services') }}</a>--}}
{{--                            <a class="dropdown-item" href="{{ route('showexport') }}">{{ __('Export Services') }}</a>--}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

{{--                    <div class="user-opts-b">--}}
{{--                        <button id="i-sidebar-toggle" class="hide-hidden-nav navbar-toggler navbar-light bg-light" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                            <span class="navbar-toggler-icon"></span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
                </li>
            @endguest
        </ul>
    </div>
</nav>

<!-- Responsive Navbar -->
{{--<section class="i-hidden-nav col-lg-12 col-md-12 col-sm-12 col">--}}
{{--    <div class="i-hidden-sidebar" duty="sidebar">--}}
{{--        <div class="upper-belt pt-3 p-2">--}}
{{--            <ul class="upper-list-group d-flex flex-row justify-content-between">--}}
{{--                <li class="col-sm-2 p-0 pic">--}}
{{--                    <img src="{{ Avatar::create(Auth::user()->username)->setDimension(35)->setFontSize(25)->toBase64() }}"/>--}}
{{--                </li>--}}

{{--                <li class="col-sm-8 p-0 name-opts ">--}}
{{--                    <h4 class="text-truncate text-center">{{Auth::user()->username}}</h4>--}}
{{--                </li>--}}

{{--                <li class="button-close col-sm-2 p-0">--}}
{{--                    <a href="javascript:void(0)" id="i-hide-nav" class="close closebtn">&times;</a>--}}
{{--                </li>--}}
{{--            </ul>--}}

{{--            <p class="text-center col m-0">--}}
{{--                <a href="{{ route('account.index') }}">{{ __('My Account') }}</a> |--}}

{{--                <a href="{{ route('logout') }}"--}}
{{--                   onclick="event.preventDefault();--}}
{{--                            document.getElementById('logout-form').submit();">--}}
{{--                    {{ __('Logout') }}--}}
{{--                </a>--}}
{{--            </p>--}}
{{--        </div>--}}

{{--        <div id="menus" class="col-lg-12 col-md-12 col-sm-12 col" duty="profile">--}}
{{--            <nav class="nav col-lg-12 col-md-12 col-sm-12 col" style="padding-right: 0px;">--}}
{{--                <ul class="navbar-nav">--}}
{{--                    <li class="nav-divider">--}}
{{--                        Menu--}}
{{--                    </li>--}}

{{--                    @foreach ($navs as $index => $value)--}}
{{--                        @switch($index)--}}
{{--                            @case('passwords')--}}
{{--                            @php $tips = "Anything passwords; websites, social media, wifi, etc"; @endphp--}}
{{--                            @break--}}
{{--                            @case('identifications')--}}
{{--                            @php $tips = "National IDs, student IDs, club or society ID, etc"; @endphp--}}
{{--                            @break--}}
{{--                            @case('accounts-and-payments')--}}
{{--                            @php $tips = "Bank accounts, digital wallets, payment cards, etc"; @endphp--}}
{{--                            @break--}}
{{--                            @case('notes')--}}
{{--                            @php $tips = "Secured notes for anything extra; addresses, numbers etc"; @endphp--}}
{{--                            @break--}}
{{--                        @endswitch--}}

{{--                        <li class='nav-item'>--}}
{{--                            <a id='{{$index}}' class='nav-link' target='_self' href="{{url($index)}}" data-toggle="tooltip" data-placement="top" title="{{$tips}}">{{$value}}</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}

{{--        <div class="footer container">--}}
{{--            <div class="ult-navs mb-4">--}}
{{--                <ul class="nav flex-column">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="/contact-us">Contact Us</a>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="/about">About</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <div class="parent">--}}
{{--                <p class="text-center">© 2020 SERVICESKEEP<br>--}}
{{--                    DESIGNED BY <a href="" class="navi">NAVIWARE</a></p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
