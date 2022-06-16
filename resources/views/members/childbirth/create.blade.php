@extends('layouts.members')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Child Birth Benefit') }}
    </h2>

    @empty($children)
        <div class="alert alert-warning p-4" role="alert">
            <p style="color: black;">
                You can't apply for any childbirth benefits because <strong>you either haven't added any child or you
                    have already exhausted</strong> all your childbirth benefits.
                Please add a child or update your children's Status in order to apply for this type of benefit.
            </p>

            <div class="pt-3">
                <a href="{{ route('members.children.index') }}" class="util-btn blu-util border-0">Add Or Update Children Details</a>
            </div>
        </div>
    @endempty

    @isset($children)
    <div class="shade col-lg-12">
        <form action="{{route('members.childbirth.store')}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for="child_name">Name Of Child</label>
                <select class="form-control @error('child') is-invalid @enderror" name="child" required>
                    @foreach($children as $child)
                        <option value="{{ $child->child_id }}">{{ $child->firstname . " " . $child->lastname }}</option>
                    @endforeach
                </select>

                @error('child_name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

{{--            <div class="form-group">--}}
{{--                <label for="child_dob">Child's Date Of Birth</label>--}}

{{--                <input type="date" class="form-control @error('child_dob') is-invalid @enderror"--}}
{{--                       name="child_dob" value="{{ old('child_dob') }}" placeholder="Enter your child's date of birth here..." required>--}}

{{--                @error('child_dob')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <div class="form-group">
                <label for="publish-to-members">Birth Certificate</label>

                <input type="file" accept="image/*,.pdf" class="form-control @error('birth_certificate') is-invalid @enderror" name="birth_certificate" required>

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
    @endisset
@endsection
