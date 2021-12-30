@extends('layouts.execs')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
{{--    @dd($requests->all())--}}
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('Requests') }}
    </h2>

    {{--    <section class="mb-2 d-flex col">--}}
    {{--        <div class="search-filter">--}}

    {{--        </div>--}}

    {{--        <a href="{{ route('execs.members.create') }}" class="util-btn float-right">Add Member</a>--}}
    {{--    </section>--}}

    <section class="bg-white shade w-100 p-0 table-responsive">
        @if(empty($requests->all()))
            <div class="p-3">
                <p class="m-0 text-center">There are no requests for benefits yet.</p>
            </div>
        @endif

        @if(!empty($requests->all()))
            <table class="table table-hover">
                <thead>
                <tr class="rqs-table">
                    <th class="px-lg-4" scope="col">Request Type</th>
                    <th class="px-lg-4" scope="col">Requested By</th>
                    <th class="px-lg-4" scope="col">Status</th>
                    <th class="px-lg-4" scope="col" colspan="2">Request Date</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $key=>$request)
                    <tr>
                        <td class="p-0">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                {{ $request->request_type }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                {{ $request->user->firstname . " " . $request->user->lastname }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ route('execs.requests.show', $request) }}"
                               class="d-flex text-decoration-none">
                                {{ $request->status }}
                            </a>
                        </td>
                        <td class="p-0">
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
