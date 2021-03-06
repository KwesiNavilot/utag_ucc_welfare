@extends('layouts.execs')

@section('title', 'Executive Dashboard | UTAG-UCC Welfare')

@section('content')
        <h1 class="page-header font-weight-bold">
            {{ $greeting }}, {{ Auth::guard('execs')->user()->firstname }}
        </h1>
{{--    <div class="row">--}}
        <div class='dash-lane marg m-0'>
            <div class='shade dash col-lg-3 col-md-5'>
                <span class='dash-figure'>{{ $pending_requests }}</span>
                <hr>
                <span class='dash-header'>Pending Requests</span>
            </div>

            <div class='shade dash col-lg-3 col-md-5 mt-sm mt-xs'>
                <span class='dash-figure'>{{ $approved_requests }}</span>
                <hr>
                <span class='dash-header'>Approved Requests</span>
            </div>

            <div class='shade dash col-lg-3 col-md-5 mt-md mt-sm mt-xs'>
                <span class='dash-figure'>{{ $total_requests }}</span>
                <hr>
                <span class='dash-header'>Total Requests</span>
            </div>

            <div class='shade dash col-lg-3 col-md-5 mt-md mt-sm mt-xs'>
                <span class='dash-figure'>{{ $members }}</span>
                <hr>
                <span class='dash-header'>Total Members</span>
            </div>
        </div>
@endsection
