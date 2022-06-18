@extends('layouts.execs')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Requests') }}

        <div class="float-right">
            <a href="#" class="toolbar-btn util-btn blu-util dropdown-toggle" type="button"
               id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false" title="Filter products">
                <i class="icofont-filter"></i>
                Filter By
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <h6 class="dropdown-header">Request Status</h6>
                <a class="dropdown-item" href="#">Approved</a>
                <a class="dropdown-item" href="#">Pending</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">Request Type</h6>
                <a class="dropdown-item" href="#">Childbirth</a>
                <a class="dropdown-item" href="#">Death of Spouse</a>
                <a class="dropdown-item" href="#">Death of Parent</a>
                <a class="dropdown-item" href="#">Death of Member</a>
                <a class="dropdown-item" href="#">Retirement</a>
            </div>

            <a href="{{ route('execs.requests.create') }}" class="util-btn blu-util">Mark Demise of Member</a>
        </div>
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
