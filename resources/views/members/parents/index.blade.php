@extends('layouts.members')

@section('title', 'My Parents | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('My Parents') }}

        <a href="{{ route('members.parents.create') }}" class="util-btn blu-util float-right">Add A Parent</a>
    </h2>

    @empty($parents)
        <section class="w-100 bg-white shade">
            <div>
                <p class="m-0 text-center">You haven't added any parent yet.</p>
            </div>
        </section>
    @endempty

    @isset($parents)
        <section class="w-100">
            @foreach($parents as $parent)
                <div class="shade float-left align-items-stretch card mb-5 p-0 @if($loop->index % 3 == 0)mr-lg-2 @elseif($loop->index % 3 == 2)ml-lg-2 @else mx-lg-2 @endif">
                    <div class="img-hover-zoom">
                        <img class="card-img-top" src="{{url('/img/system/shield.jpg')}}" alt="Service Image">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title m-0 text-truncate">{{ $parent->firstname . " " . $parent->lastname }}</h4>
                        <p class="card-sub m-0 text-truncate">{{ \Carbon\Carbon::parse($parent->date_of_birth)->format('jS F, Y') }}</p>
                        <a href="{{ route('members.parents.show', $parent) }}" class="stretched-link"></a>
                    </div>
                </div>
            @endforeach
        </section>
    @endisset

@endsection
