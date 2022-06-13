@extends('layouts.members')

@section('title', 'Dashboard | UTAG-UCC Welfare')

@section('content')
    <h1 class="page-header font-weight-bold mb-3">{{ $greeting }}, {{ Auth::user()->firstname }}</h1>

    <div class="fs-20 mb-5">
        Welcome to the UTAG-UCC Welfare Portal. Through the portal, you can apply for and track all your membership benefits.
    </div>

    <div>
        <h3 class="page-header mb-2">Guidelines For Applying For Benefits</h3>

        To complete an application for a benefit, you must submit some documentation that prove the occurence of the event.
        This is to certify that the incident happened, and when necessary, the provided documentation can be sent to all members
        as a way of notifying them of the incidence.
    </div>
@endsection
