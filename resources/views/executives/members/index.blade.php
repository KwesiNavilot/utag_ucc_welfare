@extends('layouts.execs')

@section('title', 'Association Members | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Members') }}

        @can('add-members')
            <a href="{{ route('execs.members.create') }}" class="util-btn float-right">Add Member</a>
        @endcan
    </h2>

    {{--    <section class="mb-2 d-flex col">--}}
    {{--        <div class="search-filter">--}}

    {{--        </div>--}}

    {{--        <a href="{{ route('execs.members.create') }}" class="util-btn float-right">Add Member</a>--}}
    {{--    </section>--}}

    <section class="bg-white shade w-100 p-0">
        {{--                @dd($members)--}}
        @empty($members->all())
            <div class="p-3">
                <p class="m-0 text-center">You haven't added any members yet.</p>
            </div>
        @endempty

        @if(!empty($members->all()))
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="px-lg-4" scope="col">Name</th>
                    <th class="px-lg-4" scope="col">Department</th>
                    <th class="px-lg-4" scope="col" colspan="2">Phone Number</th>
                </tr>
                </thead>

                <tbody>
                @foreach($members as $key=>$member)
                    <tr>
                        <td class="p-0">
                            <a href="{{ route('execs.members.show', $member->staff_id) }}"
                               class="d-flex text-decoration-none">
                                {{ $member->firstname . " " . $member->lastname }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ route('execs.members.show', $member->staff_id) }}"
                               class="d-flex text-decoration-none">
                                {{ $member->department }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ route('execs.members.show', $member->staff_id) }}"
                               class="d-flex text-decoration-none">
                                {{ $member->phonenumber }}
                            </a>
                        </td>
                        <td class="p-0 align-middle">
                            <a href="{{ route('execs.members.show', $member->staff_id) }}"
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

    <div class="paginator float-lg-right mt-4">
        {{ $members->links() }}
    </div>
@endsection
