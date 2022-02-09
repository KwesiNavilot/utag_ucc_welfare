<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Log Into Your Account | Executives | UTAG-UCC Welfare') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gateways.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shredder.css') }}" rel="stylesheet">
</head>

<body class="bg-indigo">
<div id="app">
    <div class="gateway container">
        <div class="justify-content-center row">
            <div class="col-lg-5 gateway-inner p-0">
                <div class="logo">
                    <a href="{{ route('home') }}" class="d-flex w-auto justify-content-center">
                        <img src="{{ asset('/images/ucc_logo.png') }}" alt="UCC Logo">
                        <img src="{{ asset('/images/utag-logo.png') }}" alt="UTAG Logo">
                    </a>
                </div>

                <div class="card p-5 mt-lg-3">
                    <h1 class="text-center text-gray font-weight-bold text-3xl">
                        @if(session('relog') != null)
                        Please Log In Again
                        @else
                        Welcome Back, Admin!
                        @endif
                    </h1>

                    <div class="mx-8 mt-2 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('execs.login') }}" accept-charset="UTF-8" class="gateway-form">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input class="form-control @error('email') is-invalid @enderror"
                                       placeholder="{{ __('Email') }}" required autofocus name="email"
                                       type="email" value="{{ old('email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-12 form-group  mb-0 ">
                                <input class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ __('Password') }}" required id="password"
                                       name="password" type="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                        </div>

                        <div class="terms-and-conditions form-row mt-4 mb-4 px-2">
                            <div class="col-md-6 col-sm-12 p-0 text-center text-lg-left text-sm-center">
                                <label class="check-container">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Remember Me
                                </label>
                            </div>

                            <div class="col-md-6 col-sm-12 p-0 text-center text-lg-right text-sm-center">
                            <span class="">
                                <label class="tc-check">
                                    <a href="{{ route('execs.password.forgot') }}" target="_self">Forgotten Your Password?</a>
                                </label>
                            </span>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="rounded-button" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
