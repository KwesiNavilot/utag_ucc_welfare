<nav class="top-nav navbar navbar-expand-sm bg-white navbar-white fixed-top @auth contact @endauth">
    <div class="container-fluid container-md container-sm">
        <div class="left-header">
            <div class="mobile-header logo">
                @guest
                    <a class="navbar-brand" href="/">{{ __('UTAG-UCC Welfare') }}</a>
                @else
                    <a class="navbar-brand"
                       href="{{ route('execs.dashboard') }}">{{ __('UTAG-UCC Welfare') }}</a>
                @endguest
            </div>
        </div>

        <ul class="navbar-nav .justify-content-end">
            @guest('execs')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('execs.login') }}">{{ __('Login') }}</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <div class="user-opts-a">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ __(Auth::guard('execs')->user()->firstname . " " . Auth::guard('execs')->user()->lastname) }}
{{--                            <img src="{{ Avatar::create(Auth::user()->username)->setDimension(35)->setFontSize(25)->toBase64() }}"/>--}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('execs.account') }}">{{ __('My Account') }}</a>
                            <a class="dropdown-item" href="{{ route('execs.logout') }}"
                               onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('execs.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                    <div class="user-opts-b">
                        <button id="inside-sidebar-toggle" class="hide-hidden-nav navbar-toggler navbar-light bg-light"
                                type="button" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<!-- Responsive Navbar -->
<section class="inside-hidden-nav col-lg-12 col-md-12 col-sm-12 col">
    <div class="inside-hidden-sidebar" duty="sidebar">
        <div class="col col-lg-12 col-md-12 col-sm-12 p-4 upper-belt">
            <div class="row upper-list-group">
                <div class="button-close col-md-12 col-sm-12 p-0">
                    <a href="javascript:void(0)" id="inside-hide-nav" class="close closebtn float-md-right float-sm-right">&times;</a>
                </div>

                <div class="clearfix col-md-12 col-sm-12 name-opts p-0">
                    <h4 class="text-truncate text-center text-white">{{__(Auth::user()->firstname . " " . Auth::user()->lastname)}}</h4>
                </div>
            </div>

            <p class="text-center col m-0 p-0">
                <a href="{{ route('execs.account') }}">{{ __('My Account') }}</a> |

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('execs.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </p>
        </div>

        <div id="menus" class="col-lg-12 col-md-12 col-sm-12 col" duty="profile">
            <nav class="nav col-lg-12 col-md-12 col-sm-12 col" style="padding-right: 0;">
                <ul class="navbar-nav">
                    @foreach ($navs as $index => $value)
                        @switch($index)
                            @case('dashboard')
                            @php $tips = "View a snapshot of your recent activity and some vital information too"; @endphp
                            @break
                            @case('requests.index')
                            @php $tips = "View and act on all submitted requests"; @endphp
                            @break
                            @case('members.index')
                            @php $tips = "Add, edit and view members of the association"; @endphp
                            @break
                            @default
                            @php $tips = "Default action"; @endphp
                            @break
                        @endswitch

                        <li class='nav-item'>
                            <a id='{{$index}}' class='nav-link' target='_self' href="{{route('execs.' . $index)}}"
                               data-toggle="tooltip" data-placement="top" title="{{$tips}}">{{$value}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</section>
