@extends('layouts.execs')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Requests') }}

        <a href="{{ route('execs.requests.create') }}" class="util-btn blu-util float-right">Mark Demise of Member</a>
    </h2>

    <section class="bg-white shade w-100 p-0">
        @if(empty($requests->all()))
            <div class="p-3">
                <p class="m-0 text-center">There are no requests for benefits yet.</p>
            </div>
        @endif

        @if(!empty($requests->all()))
            <table class="table table-hover table-responsive-sm table-responsive-lg table-responsive-md">
                <thead>
                <tr class="rqs-table">
                    <th class="px-lg-4 text-truncate" scope="col">Request Type</th>
                    <th class="px-lg-4 text-truncate" scope="col">Requested By</th>
                    <th class="px-lg-4" scope="col">Status</th>
                    <th class="px-lg-4 text-truncate" scope="col" colspan="2">Request Date</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $key=>$request)
                    <tr>
                        <td class="p-0 text-truncate">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                {{ $request->request_type }}
                            </a>
                        </td>
                        <td class="p-0 text-truncate">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                {{ $request->user->firstname . " " . $request->user->lastname }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none badge badge-pill @if($request->status == "Approved")badge-success @else badge-danger @endif">
                                {{ $request->status }}
                            </a>
                        </td>
                        <td class="p-0 text-truncate">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                {{ $request->created_at->format('jS F, Y') }}
{{--                                ({{ \Carbon\Carbon::parse($request->created_at)->diffForHumans() }})--}}
                            </a>
                        </td>
                        <td class="p-0 align-middle">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                <i class="icofont-rounded-right"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </section>

    <div class="paginator float-lg-right mt-2">
        {{ $requests->links() }}
    </div>
@endsection
