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
                        <img src="{{ asset('/images/utag-ucc-logo.png') }}" alt="UTAG-UCC Logo">
                    </a>
                </div>

                <div class="card p-5">
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
                            <div class="col-md-6 form-group">
                                <input class="form-control @error('staff_id') is-invalid @enderror"
                                       placeholder="{{ __('Staff ID') }}" required autofocus name="staff_id"
                                       type="text" value="{{ old('staff_id') }}">

                                @error('staff_id')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
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

{{--                        <div class="terms-and-conditions form-row mt-4 mb-4 px-2">--}}
{{--                            <div class="col-md-6 col-sm-12 p-0 text-center text-lg-left text-sm-center">--}}
{{--                                <label class="check-container">--}}
{{--                                    <input type="checkbox" id="remember"--}}
{{--                                           name="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                    <span class="checkmark"></span>--}}
{{--                                    Remember Me--}}
{{--                                </label>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6 col-sm-12 p-0 text-center text-lg-right text-sm-center">--}}
{{--                            <span class="">--}}
{{--                                <label class="tc-check">--}}
{{--                                    <a href="{{ route('password.request') }}" target="_self">Forgotten Your Password?</a>--}}
{{--                                </label>--}}
{{--                            </span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

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
