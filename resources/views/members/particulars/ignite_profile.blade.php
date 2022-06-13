<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Create Your Profile To Continue | UTAG-UCC Welfare') }}</title>

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

                <div class="card p-5 mt-lg-3">
                    <h1 class="text-center text-gray font-weight-bold text-3xl">
                        Create Your Profile
                    </h1>

                    <div class="mx-8 w-24 border-b-2"></div>

                    <form method="POST" action="{{ route('members.ignite') }}" accept-charset="UTF-8" class="gateway-form">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-6 pl-0">
                                <label for="staff_id">Staff ID<span style="color: red">*</span></label>
                                <input class="form-control @error('staff_id') is-invalid @enderror"
                                       placeholder="{{ __('Enter your Staff ID') }}" required autofocus name="staff_id"
                                       type="text" value="{{ old('staff_id') }}">

                                @error('staff_id')
                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6 pr-0">
                                <label for="title">Title<span style="color: red">*</span></label>
                                <select class="form-control @error('title') is-invalid @enderror" required name="title">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ing.">Ing.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                </select>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 pl-0">
                                <label for="date_of_birth">Date of Birth<span style="color: red">*</span></label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                       name="date_of_birth" value="{{ old('date_of_birth') }}" required>

                                @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 pr-0">
                                <label for="date_of_birth">Date of Joining Association<span style="color: red">*</span></label>
                                <input type="date" class="form-control @error('date_joined') is-invalid @enderror"
                                       name="date_joined" value="{{ old('date_joined') }}" required>

                                @error('date_joined')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 form-group px-0">
                                <label for="department">Department<span style="color: red">*</span></label>
                                <select class="form-control @error('department') is-invalid @enderror" name="department">
                                    @foreach($departments as $department)
                                        <option value="{{ $department->short }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 form-group px-0">
                                <label for="dept_position">Position In Department</label>
                                <input class="form-control @error('dept_position') is-invalid @enderror"
                                       placeholder="{{ __('E.g: Registrar') }}" name="dept_position"
                                       type="text" value="{{ old('dept_position') }}">

                                @error('dept_position')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6 form-group pl-0">
                                <label for="phonenumber">Phone Number<span style="color: red">*</span></label>
                                <input class="form-control @error('phonenumber') is-invalid @enderror"
                                       placeholder="{{ __('E.g: 0212345678') }}" required
                                       id="phonenumber" name="phonenumber" type="text">

                                @error('phonenumber')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group pr-0">
                                <label for="alt_phonenumber">Alternate Phone Number</label>
                                <input class="form-control @error('alt_phonenumber') is-invalid @enderror"
                                       placeholder="{{ __('E.g: 0212345678') }}" name="alt_phonenumber" type="text">

                                @error('alt_phonenumber')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="rounded-button" value="{{ __('Update Details') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
