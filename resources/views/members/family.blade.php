@extends('layouts.members')

@section('title', 'My Family | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('My Family') }}
    </h2>

    <section class="w-100 marg">
        <h4 class="card-sub">{{__('Spouse')}}</h4>

        <div class="w-100 bg-white shade">
            <p class="m-0 text-center">You haven't added your spouse yet.</p>
        </div>
    </section>

    <section class="w-100 marg">
        <h4 class="card-sub">{{__('Children')}}</h4>

        <div class="w-100 bg-white shade">
            <p class="m-0 text-center">You haven't added your children yet.</p>
        </div>
    </section>

    <section class="w-100 marg">
        <h4 class="card-sub">{{__('Parents')}}</h4>

        <div class="w-100 bg-white shade">
            <p class="m-0 text-center">You haven't added your parents yet.</p>
        </div>
    </section>
@endsection
