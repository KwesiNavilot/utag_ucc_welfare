@extends('layouts.members', ['trigger' => 'fotorama'])

@section('title', 'Death Of Spouse Benefit Request Information | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Information') }}

        @if($request->status == "Pending")
        <a href="{{ route('deathofspouse.edit', $request->request_id) }}"
           class="util-btn float-right">Edit Request</a>
        @endif
    </h2>

    <section class="bg-white shade w-75 float-lg-left w-65">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <medium class="card-sub">Name of Spouse</medium>
                <p class="mb-0 mt-1">{{$request->spouse_name}}</p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Date of Funeral</medium>
                <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($request->funeral_date)->format('jS F, Y') }}</p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Publish To Members</medium>
                <p class="mb-0 mt-1">{{ \Illuminate\Support\Str::ucfirst($request->publish) }}</p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Status of Request</medium>
                <p class="mb-0 mt-1">
                    {{ $request->status }}
                    @if($request->status == "Approved")
                        (Approved on {{ \Carbon\Carbon::parse($request->updated_at)->format('jS F, Y') }})
                    @endif
                </p>
            </li>
        </ul>
    </section>

    <section class="bg-white shade w-25 float-lg-right w-30">
        <div class="fotorama"
             data-allowfullscreen="true"
             data-click="false"
             data-swipe="true"
             data-width="100%"
             data-height="46%">

            <img src="{{ asset('/storage/' . $request->media) }}">
        </div>
    </section>
@endsection
