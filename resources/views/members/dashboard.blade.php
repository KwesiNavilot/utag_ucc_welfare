@extends('layouts.members')

@section('title', 'Dashboard | UTAG-UCC Welfare')

@section('content')
    <h1 class="page-header font-weight-bold mb-3">{{ $greeting }}, {{ Auth::user()->firstname }}</h1>

    <div class="fs-20 mb-4">
        Welcome to the UTAG-UCC Welfare Portal. Through the portal, you can apply for and track all your membership benefits.
    </div>
@endsection
