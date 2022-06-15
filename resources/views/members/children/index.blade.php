@extends('layouts.members')

@section('title', 'My Children | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('My Children') }}

        <a href="{{ route('members.children.create') }}" class="util-btn blu-util float-right">Add A Child</a>
    </h2>

    @empty($children)
        <section class="w-100 bg-white shade">
            <div>
                <p class="m-0 text-center">You haven't added any child yet.</p>
            </div>
        </section>
    @endempty

    @isset($children)
        <section class="w-100">
            @foreach($children as $child)
                <div class="shade float-left align-items-stretch card mb-5 p-0 @if($loop->index % 3 == 0)alpha @elseif($loop->index % 3 == 2)omega @else midla @endif">
                    <div class="img-hover-zoom">
                        <img class="card-img-top" src="{{url('/img/system/shield.jpg')}}" alt="Service Image">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title m-0 text-truncate">{{ $child->firstname . " " . $child->lastname }}</h4>
                        <p class="card-sub m-0 text-truncate">{{ \Carbon\Carbon::parse($child->date_of_birth)->format('jS F, Y') }}</p>
                        <a href="{{ route('members.children.show', $child) }}" class="stretched-link"></a>
                    </div>
                </div>
            @endforeach
        </section>
    @endisset

@endsection
