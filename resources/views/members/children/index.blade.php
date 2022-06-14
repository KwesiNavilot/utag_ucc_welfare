@extends('layouts.members')

@section('title', 'My Children | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('My Children') }}

        @empty($child)
            <a href="{{ route('members.children.create') }}" class="util-btn blu-util float-right">Add A Child</a>
        @endempty
    </h2>

    @empty($child)
        <div class="w-100 bg-white shade">
            <div>
                <p class="m-0 text-center">You haven't added any child yet.</p>
            </div>
        </div>
    @endempty

    @isset($child)
        <div class="w-100">
            <div class="shade col-lg-4 p-0">
                <div class="img-hover-zoom">
                    <img class="card-img-top" src="{{url('/img/system/shield.jpg')}}" alt="Service Image">
                </div>

                <div class="card-body">
                    <h4 class="card-title m-0 text-truncate">{{ $child->firstname . " " . $child->lastname }}</h4>
                    <p class="card-sub m-0 text-truncate">{{ $child->phonenumber }}</p>
                    <a href="{{ route('members.children.show', $child) }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    @endisset

@endsection
