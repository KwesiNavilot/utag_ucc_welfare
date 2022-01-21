@extends('layouts.members', ['trigger' => 'fotorama'])

@section('title', 'Death Of Parent Benefit Request Information | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Information') }}

        @if($request->status == "Pending")
            <a href="{{ route('deathofparent.edit', $request->request_id) }}"
               class="util-btn float-right">Edit Request</a>
        @endif
    </h2>

    <section class="w-100">
        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-65">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Name of Parent</medium>
                    <p class="mb-0 mt-1">{{$request->parent_name}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Relation</medium>
                    <p class="mb-0 mt-1">{{ \Illuminate\Support\Str::ucfirst($request->relation) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Date of Funeral</medium>
                    <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($request->funeral_date)->format('jS F, Y') }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Publish To Members</medium>
                    <p class="mb-0 mt-1">{{ \Illuminate\Support\Str::ucfirst($request->publish) }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Status of Request</medium>
                    <p class="mb-0 mt-1">
                        {{ $request->status }}
                        @if($request->status == "Approved")
                            (Approved on {{ \Carbon\Carbon::parse($request->updated_at)->format('jS F, Y') }})
                        @endif
                    </p>
                </li>
            </ul>
        </div>

        <div class="bg-white shade w-25 float-lg-right w-30">
            <div class="fotorama"
                 data-allowfullscreen="true"
                 data-click="false"
                 data-swipe="true"
                 data-width="100%"
                 data-height="57%">

                @if(\Illuminate\Support\Str::endsWith($request->media, 'pdf'))
                    <div class="text-center">
                        <strong>
                            There are no uploaded images. Please check the PDF section
                        </strong>
                    </div>
                @endif

                @isset($request->media)
                    <img src="{{ asset('/storage/' . $request->media) }}">
                @endisset
            </div>
        </div>
    </section>

    @if(\Illuminate\Support\Str::endsWith($request->media, 'pdf'))
        <section class="clearfix">
            <embed
                src="{{ asset('/storage/' . $request->media) }}#view=Fit&zoom=scale&toolbar=1&navpanes=1&scrollbar=1&statusbar=1"
                type="application/pdf" width="100%" height="600px"/>
        </section>
    @endif
@endsection
