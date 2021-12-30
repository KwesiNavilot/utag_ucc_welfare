<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Find Your Account And Reset Your Password | UTAG-UCC Welfare') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gateways.css') }}" rel="stylesheet">
</head>

<body class="bg-indigo">
<div id="app">
    <div class="gateway container">
        <div class="justify-content-center row">
            <div class="col-lg-5 gateway-inner p-0">
                <div class="logo">
                    <h1 class="mr-auto text-center">
                        <a href="{{ route('home') }}">UTAG-UCC Welfare</a>
                    </h1>
                </div>

                <div class="card p-5 mt-lg-3">
                    <h1 class="text-center text-gray font-weight-bold text-3xl">
                        @if(session('relog') != null)
                            Please Log In Again
                        @else
                            Get Password Reset Link
                        @endif
                    </h1>
                    <div class="mx-8 mt-2 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('password.request') }}" accept-charset="UTF-8"
                          class="gateway-form">
                        @csrf

                        @if (session('status'))
                            
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
