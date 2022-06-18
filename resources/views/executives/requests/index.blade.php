@extends('layouts.execs', ['trigger' => 'livewire'])

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Requests') }}

        <div class="float-right">
            <a href="{{ route('execs.requests.create') }}" class="util-btn blu-util">Mark Demise of Member</a>
        </div>
    </h2>

    @if(empty($requests_count))
        <section class="bg-white shade w-100 p-0">
            <div class="p-3">
                <p class="m-0 text-center">There are no requests yet</p>
            </div>
        </section>
    @endif

    @if(!empty($requests_count))
        <livewire:requests-table/>
    @endif
@endsection
