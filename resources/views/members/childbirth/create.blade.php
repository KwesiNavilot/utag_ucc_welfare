@extends('layouts.members')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Child Birth Benefit') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('childbirth.store')}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for="child_dob">Child's Date Of Birth</label>

                <input type="date" class="form-control @error('child_dob') is-invalid @enderror"
                       name="child_dob" value="{{ old('child_dob') }}" placeholder="Enter your child's date of birth here..." required>

                @error('child_dob')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="child_name">Name Of Child</label>

                <input type="text" class="form-control @error('child_name') is-invalid @enderror"
                       name="child_name" value="{{ old('child_name') }}" placeholder="Enter your child's full name here..." required>

                @error('child_name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="publish-to-members">Birth Certificate</label>

                <input type="file" accept="image/*,.pdf" class="form-control @error('birth_certificate') is-invalid @enderror" name="birth_certificate">

                @error('birth_certificate')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit">Request Benefit</button>
            </div>
        </form>
    </div>
@endsection
