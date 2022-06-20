@extends('layouts.execs', ['trigger' => 'livewire'])

@section('title', 'Association Members | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Members') }}
    </h2>

    @if(empty($members_count))
        <section class="bg-white shade w-100 p-0">
            <div class="p-3">
                <p class="m-0 text-center">There are no members yet</p>
            </div>
        </section>
    @endif

    @if(!empty($members_count))
        <livewire:members-table/>
    @endif
@endsection
