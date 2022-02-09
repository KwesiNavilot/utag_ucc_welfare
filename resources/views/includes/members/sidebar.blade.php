            <section class="sidebar" duty="sidebar">
                <div class="left-header p-lg-1 text-center bg-info">
                    @guest
                        <a class="navbar-brand p-0 text-white" href="/">
                            <img src="{{ asset('/images/ucc_logo.png') }}" alt="UCC Logo">
                            <img src="{{ asset('/images/utag-logo.png') }}" alt="UTAG Logo">
                        </a>
                    @else
                        <a class="navbar-brand p-0 text-white" href="{{ route('members.dashboard') }}">
                            <img src="{{ asset('/images/ucc_logo.png') }}" alt="UCC Logo">
                            <img src="{{ asset('/images/utag-logo.png') }}" alt="UTAG Logo">
                        </a>
                    @endguest
                </div>

                <div id="menus" class="col-lg-12 col-md-12 col-sm-12 col pt-lg-5" duty="navigation">
                    <nav class="nav col-lg-12 col-md-12 col-sm-12 col pr-lg-0">
                        <ul class="navbar-nav w-100">
                            @foreach ($navs as $index => $value)
                                @switch($index)
                                    @case('dashboard')
                                        @php $tips = "View a snapshot of your recent activity and some vital information too"; @endphp
                                        @break
                                    @case('requests')
                                        @php $tips = "Request and track the progress of benefits"; @endphp
                                        @break
                                @endswitch

                                <li class='nav-item'>
                                    <a id='{{$index}}' class='nav-link' target='_self' href="{{url($index)}}" data-toggle="tooltip" data-placement="top" title="{{$tips}}">{{$value}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </section>
