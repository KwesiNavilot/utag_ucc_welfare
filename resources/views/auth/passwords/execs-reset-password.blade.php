<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Reset Your Account Password | UTAG-UCC Welfare') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gateways.css') }}" rel="stylesheet">
</head>

<body class="bg-indigo">
{{--@dd(request())--}}
<div id="app">
    <div class="gateway container">
        <div class="justify-content-center row">
            <div class="gateway-inner p-0">
                <div class="logo">
                    <h1 class="mr-auto text-center">
                        <a href="{{ route('home') }}">UTAG-UCC Welfare</a>
                    </h1>
                </div>

                <div class="card p-5 mt-lg-3">
                    <h1 class="text-center text-gray font-weight-bold text-3xl">
                        Reset Your Password
                    </h1>

                    <div class="mx-8 mt-2 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('execs.password.update') }}" accept-charset="UTF-8"
                          class="gateway-form">
                        @csrf

                        <input type="hidden" name="token" value="{{ request()->route('token') }}">

                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input class="form-control @error('email') is-invalid @enderror"
                                       placeholder="{{ __('Email') }}" name="email" type="email"
                                       value="{{ request()->email ?? old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ __('Password') }}" required name="password"
                                       type="password" value="{{ old('password') }}" autofocus>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                                @if(!$errors->has('password') && !$errors->has('password_confirmation'))
                                    <span role="alert">
                                        <small
                                            class="col-lg-12 p-0">{{ __("Passwords must be at least 8 characters long with a combination of letters and numbers")}}</small>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                       placeholder="{{ __('Confirm New Password') }}" required
                                       id="password_confirmation"
                                       name="password_confirmation" type="password">

                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="rounded-button" value="Reset Password">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
