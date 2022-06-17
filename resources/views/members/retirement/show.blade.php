@extends('layouts.members', ['trigger' => 'fotorama'])

@section('title', 'Retirement Benefit Request Information | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Information') }}

        @if($request->status == "Pending")
            <div class="float-right">
                <a href="{{ route('members.retirement.edit', $request->request_id) }}"
                   class="util-btn blu-util">Edit Request</a>

                <form class="float-right pl-lg-3 pl-md-3 pl-sm-3 pl-xs-3"
                      action="{{ route('members.retirement.destroy', $request->request_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="util-btn red-util">Delete Request</button>
                </form>
            </div>
        @endif
    </h2>

    <section class="w-100">
        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-100">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Date of Retirement</medium>
                    <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($request->child_dob)->format('jS F, Y') }}</p>
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
        </div>
    </section>
@endsection
