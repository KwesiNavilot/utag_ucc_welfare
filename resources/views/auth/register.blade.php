<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Create An Account | UTAG-UCC Welfare') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gateways.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shredder.css') }}" rel="stylesheet">
</head>

<body class="bg-indigo">
<div id="app">
    <div class="gateway container">
        <div class="justify-content-center row">
            <div class="w-65 gateway-inner p-0">
                <div class="logo">
                    <a href="{{ route('home') }}" class="d-flex w-auto justify-content-center">
                        <img src="{{ asset('/images/utag-ucc-logo.png') }}" alt="UTAG-UCC Logo" style="width: 35%;">
                    </a>
                </div>

                <div class="card p-5 mt-lg-3">
                    <h1 class="text-center text-gray font-weight-bold text-3xl">
                        Create An Account
                    </h1>

                    <div class="mx-8 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('register') }}" accept-charset="UTF-8" class="gateway-form">
                        @csrf

                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input class="form-control @error('firstname') is-invalid @enderror"
                                       placeholder="{{ __('First Name') }}" required autofocus name="firstname"
                                       type="text" value="{{ old('firstname') }}">

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <input class="form-control @error('lastname') is-invalid @enderror"
                                       placeholder="{{ __('Last Name') }}" required autofocus name="lastname"
                                       type="text" value="{{ old('lastname') }}">

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

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
                            <div class="col-md-6 form-group mb-0">
                                <input class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ __('Password') }}" required id="password"
                                       name="password" type="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-0">
                                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                       placeholder="{{ __('Confirm Password') }}" required id="password_confirmation"
                                       name="password_confirmation" type="password">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            @if(!$errors->has('password') && !$errors->has('password_confirmation'))
                                <span class="mb-1 pl-1" role="alert">
                                    <medium>{{ __("Passwords must be at least 8 characters long with a combination of letters and numbers")}}</medium>
                                </span>
                            @endif
                        </div>

                        <div class="text-center mt-2">
                            <input type="submit" class="rounded-button" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
