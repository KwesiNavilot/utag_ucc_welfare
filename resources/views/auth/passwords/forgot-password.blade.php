<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Find Your Account And Reset Your Password | UTAG-UCC Welfare') }}</title>

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
                        @if(session('status') != null)
                            Check Your Email!
                        @else
                            Get Password Reset Link
                        @endif
                    </h1>

                    <div class="mx-8 mt-2 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('password.request') }}" accept-charset="UTF-8"
                          class="gateway-form">
                        @csrf

                        @if (session('status'))
                            <div class="text-center font-medium text-sm text-green-600">
                                <p>
                                    {{ __('We\'ve sent a password reset link to your provided email address. Please check your inbox
                                        and follow the instructions to finish resetting your account.')}}
                                </p>

                                <p>
                                    {{ __("If you don't see the email, check other places it might be, link your junk, spam, social or other folders.")}}
                                </p>
                            </div>
                        @else
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <input class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Enter your email here...') }}" required autofocus
                                           name="email"
                                           type="email" value="{{ old('email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="text-center">
                                <input type="submit" class="rounded-button" value="Login">
                            </div>

                            <div class="terms-and-conditions form-row mt-4 px-2">
                                <div class="col-lg-12 p-0 text-center">
                                                    <span class="">
                                                        <label class="tc-check">
                                                            <a href="{{ route('login') }}" id="logout">
                                                                {{ __('Remembered Your Password?') }}
                                                            </a>
                                                        </label>
                                                    </span>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
