@extends('layouts.members')

@section('title', 'Spouse Details | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Spouse Details') }}

        <div class="float-right">
            <a href="{{ route('members.spouse.edit', $spouse) }}" class="util-btn blu-util">Edit Details</a>

            <form class="float-right pl-lg-3 pl-md-3 pl-sm-3 pl-xs-3" action="{{ route('members.spouse.destroy', $spouse) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="util-btn red-util">Delete Spouse</button>
            </form>
        </div>
    </h2>

    <section class="w-100 marg">
        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Full Name</medium>
                    <p class="mb-0 mt-1">{{$spouse->firstname . " " . $spouse->lastname}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Gender</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($spouse->gender) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Status</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($spouse->status) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Primary Phone Number</medium>
                    <p class="mb-0 mt-1">{{ $spouse->phonenumber }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Alternate Phone Number</medium>
                    <p class="mb-0 mt-1">
                        @isset($spouse->alt_phonenumber)
                            {{ $spouse->alt_phonenumber }}
                        @else
                            None Provided
                        @endif
                    </p>
                </li>
            </ul>
        </div>
    </section>
@endsection
