@extends('layouts.members')

@section('title', "Parent's Details | UTAG-UCC Welfare")

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __("Parent's Details") }}

        <div class="float-right">
            <a href="{{ route('members.parents.edit', $parent) }}" class="util-btn blu-util">Edit Details</a>

            <form class="float-right pl-lg-3 pl-md-3 pl-sm-3 pl-xs-3" action="{{ route('members.parents.destroy', $parent) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="util-btn red-util">Delete Parent</button>
            </form>
        </div>
    </h2>

    <section class="w-100 marg">
        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Full Name</medium>
                    <p class="mb-0 mt-1">{{$parent->firstname . " " . $parent->lastname}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Relation</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($parent->relation) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Gender</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($parent->gender) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Status</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($parent->status) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Phone Number</medium>
                    <p class="mb-0 mt-1">
                        @if(isset($parent->phonenumber))
                            {{ $parent->phonenumber }}
                        @else
                            None Provided
                        @endif
                    </p>
                </li>
            </ul>
        </div>
    </section>
@endsection
