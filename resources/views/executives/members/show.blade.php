@extends('layouts.execs')

@section('title', 'Member Information | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Member Information') }}
    </h2>

    <section class="bg-white marg">
        <ul class="shade w-100 list-group list-group-flush">
            <li class="list-group-item">
                <medium class="card-sub">Full Name</medium>
                <p class="mb-0 mt-1">{{ $member->title . " " .$member->firstname . " " . $member->lastname}}</p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Department</medium>
                <p class="mb-0 mt-1">{{ $member->departments->name }}</p>
            </li>

{{--            <li class="list-group-item">--}}
{{--                <medium class="card-sub">Department Position</medium>--}}
{{--                <p class="mb-0 mt-1">--}}
{{--                    @if(isset($member->dept_position))--}}
{{--                        {{ $member->dept_position }}--}}
{{--                    @else--}}
{{--                        None Provided--}}
{{--                    @endif--}}
{{--                </p>--}}
{{--            </li>--}}

            <li class="list-group-item">
                <medium class="card-sub">Email</medium>
                <p class="mb-0 mt-1">{{ $member->email }}</p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Phone Number</medium>
                <p class="mb-0 mt-1">{{ $member->phonenumber }}</p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Alternate Phone Number</medium>
                <p class="mb-0 mt-1">
                    @if(isset($member->alt_phonenumber))
                        {{ $member->alt_phonenumber }}
                    @else
                        None Provided
                    @endif
                </p>
            </li>

            <li class="list-group-item">
                <medium class="card-sub">Date of Joining</medium>
                <p class="mb-0 mt-1">
                    {{ \Carbon\Carbon::parse($member->date_joined)->format('jS F, Y') }}
                    ({{ \Carbon\Carbon::parse($member->date_joined)->diffForHumans() }})
                </p>
            </li>
        </ul>
    </section>

    <section class="clearfix card-sub-mt">
        <h4 class="card-sub">{{__("Member's Requests")}}</h4>

        <div class="w-100 bg-white shade p-0">
            @empty($member->benefits)
                <div>
                    <p class="m-0 text-center">This member hasn't made any benefit requests yet.</p>
                </div>
            @endempty

            @if(!empty($member->benefits))
                <table class="table table-hover table-responsive-sm table-responsive-md">
                    <thead>
                    <tr>
                        <th class="px-lg-4" scope="col">#</th>
                        <th class="px-lg-4 text-truncate" scope="col">Benefit Type</th>
                        <th class="px-lg-4 text-truncate" scope="col">Request Date</th>
                        <th class="px-lg-4" scope="col" colspan="2">Status</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($member->benefits as $key => $request)
                        <tr>
                            <th class="p-0" scope="row">
                                <a href="{{ route('execs.requests.show', $request) }}" class="d-flex text-decoration-none">
                                    {{ $key+1 }}
                                </a>
                            </th>
                            <td class="p-0 text-truncate">
                                <a href="{{ route('execs.requests.show', $request) }}" class="d-flex text-decoration-none">
                                    {{ $request->request_type }}
                                </a>
                            </td>
                            <td class="p-0 text-truncate">
                                <a href="{{ route('execs.requests.show', $request) }}" class="d-flex text-decoration-none">
                                    {{ $request->created_at->format('jS F, Y') }}
                                </a>
                            </td>
                            <td class="p-0">
                                <a href="{{ route('execs.requests.show', $request) }}" class="d-flex text-decoration-none
                                badge badge-pill @if($request->status == "Approved")badge-success @else badge-danger @endif">
                                    {{ $request->status }}
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
        </div>
    </section>
@endsection
