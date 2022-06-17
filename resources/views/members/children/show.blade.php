@extends('layouts.members')

@section('title', 'Child Details | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Child Details') }}

        <div class="float-right">
            <a href="{{ route('members.children.edit', $child) }}" class="util-btn blu-util">Edit Details</a>

            <form class="float-right pl-lg-3 pl-md-3 pl-sm-3 pl-xs-3" action="{{ route('members.children.destroy', $child) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="util-btn red-util">Delete Child</button>
            </form>
        </div>
    </h2>

    <section class="w-100 marg">
        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Full Name</medium>
                    <p class="mb-0 mt-1">{{$child->firstname . " " . $child->lastname}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Date of Birth</medium>
                    <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($child->date_of_birth)->format('jS F, Y') }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Gender</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($child->gender) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Status</medium>
                    <p class="mb-0 mt-1">{{ Str::ucfirst($child->status) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Phone Number</medium>
                    <p class="mb-0 mt-1">
                        @if(isset($child->phonenumber))
                            {{ $child->phonenumber }}
                        @else
                            None Provided
                        @endif
                    </p>
                </li>
            </ul>
        </div>
    </section>
@endsection
