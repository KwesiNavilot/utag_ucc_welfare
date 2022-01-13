{{--@dd(\Illuminate\Support\Facades\Auth::user())--}}
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Change Your Password To Continue | UTAG-UCC Welfare') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gateways.css') }}" rel="stylesheet">
</head>

<body class="bg-indigo">
<div id="app">
    <div class="gateway container">
        <div class="justify-content-center row">
            <div class="col-lg-6 gateway-inner p-0">
                <div class="logo">
                    <h1 class="mr-auto text-center">
                        <a href="{{ route('home') }}">UTAG-UCC Welfare</a>
                    </h1>
                </div>

                <div class="card p-5 mt-lg-3">
                    <h1 class="text-center text-gray font-weight-bold text-3xl">Change Your Password To Continue!</h1>
                    <div class="mx-8 mt-2 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('members.ignite') }}" accept-charset="UTF-8"
                          class="gateway-form" style="margin: 6% 0 0;">
                        @csrf
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                   name="date_of_birth" value="{{ old('date_of_birth') }}"
                                   placeholder="Enter your date of birth..." required>

                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <input class="form-control @error('password') is-invalid @enderror"
                                       placeholder="{{ __('New Password') }}" required autofocus name="password"
                                       type="password" value="{{ old('password') }}">

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
                            <div class="col-md-12 form-group  mb-0 ">
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

                        <div class="text-center mt-lg-4">
                            <input type="submit" class="rounded-button" value="{{ __('Update Password') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
