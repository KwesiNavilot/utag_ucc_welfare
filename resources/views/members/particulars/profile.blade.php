@extends('layouts.members')

@section('title', 'My Profile | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Personal Information') }}

        <a href="{{ route('profile.edit', Auth::user()) }}"
           class="util-btn float-right">Edit</a>
    </h2>

    <section class="w-100 marg">
        <h4 class="card-sub">{{__('Basic Info')}}</h4>

        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <div class="d-flex">
                    <li class="list-group-item border-left-0 border-right-0 border-top-0 col-lg-6 list-group-item">
                        <medium class="card-sub">Staff ID</medium>
                        <p class="mb-0 mt-1">{{$member->staff_id}}</p>
                    </li>

                    <li class="list-group-item border-left-0 border-right-0 border-top-0 col-lg-6 list-group-item">
                        <medium class="card-sub">Title</medium>
                        <p class="mb-0 mt-1">{{$member->title}}</p>
                    </li>
                </div>

                <li class="list-group-item">
                    <medium class="card-sub">Name</medium>
                    <p class="mb-0 mt-1">{{$member->firstname . " " . $member->lastname}}</p>
                </li>

                <div class="d-flex">
                    <li class="list-group-item border-0 col-lg-6 list-group-item">
                        <medium class="card-sub">Date of Birth</medium>
                        <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($member->date_of_birth)->format('jS F, Y') }}</p>
                    </li>

                    <li class="list-group-item border-0 col-lg-6 list-group-item">
                        <medium class="card-sub">Date of Joining Association</medium>
                        <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($member->date_joined)->format('jS F, Y') }}</p>
                    </li>
                </div>
            </ul>
        </div>
    </section>

    <section class="w-100 marg">
        <h4 class="card-sub">{{__('Contact Info')}}</h4>

        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Email</medium>
                    <p class="mb-0 mt-1">{{$member->email}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Primary Phone Number</medium>
                    <p class="mb-0 mt-1">{{ $member->phonenumber }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Alternate Phone Number</medium>
                    <p class="mb-0 mt-1">
                        @isset($member->alt_phonenumber)
                            {{ $member->alt_phonenumber }}
                        @else
                            None Provided
                        @endif
                    </p>
                </li>
            </ul>
        </div>
    </section>

    <section class="w-100">
        <h4 class="card-sub">{{__('Department Info')}}</h4>

        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Department</medium>
                    <p class="mb-0 mt-1">{{$department[0]['name']}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Position</medium>
                    <p class="mb-0 mt-1">
                        @isset($member->dept_position)
                            {{ $member->dept_position }}
                        @else
                            None Provided
                        @endif
                    </p>
                </li>
            </ul>
        </div>
    </section>
@endsection
