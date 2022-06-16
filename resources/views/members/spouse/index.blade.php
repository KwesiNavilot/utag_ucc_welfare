@extends('layouts.members')

@section('title', 'My Spouse | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('My Spouse') }}

        @empty($spouse)
            <a href="{{ route('members.spouse.create') }}" class="util-btn blu-util float-right">Add Spouse</a>
        @endempty
    </h2>

    @empty($spouse)
        <div class="w-100 bg-white shade">
            <div>
                <p class="m-0 text-center">You haven't added your spouse yet.</p>
            </div>
        </div>
    @endempty

    @isset($spouse)
        <div class="w-100">
            <div class="shade card cardinal p-0">
                <div class="img-hover-zoom">
                    <img class="card-img-top" src="{{url('/img/system/shield.jpg')}}" alt="Service Image">
                </div>

                <div class="card-body">
                    <h4 class="card-title m-0 text-truncate">{{ $spouse->firstname . " " . $spouse->lastname }}</h4>
                    <p class="card-sub m-0 text-truncate">{{ $spouse->phonenumber }}</p>
                    <a href="{{ route('members.spouse.show', $spouse) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @endisset

@endsection
