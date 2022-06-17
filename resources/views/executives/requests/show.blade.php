@extends('layouts.execs', ['trigger' => 'fotorama'])

@section('title', 'Benefit Request Information | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Request Information') }}

        @can('approve-request')
            @if($request->status == "Pending")
                <a href="{{ route('execs.requests.update', $request) }}"
                   class="util-btn blu-util float-right ml-lg-3"
                   onclick="event.preventDefault(); document.getElementById('update-status').submit();">
                    Approve Request
                </a>

                <form id="update-status" action="{{ route('execs.requests.update', $request) }}" method="POST"
                      class="d-none">
                    @csrf
                    @method('PUT')
                </form>
            @endif
        @endcan

        @can('create-broadcast')
            @if($request->request_type != "Child Birth" && $request->published == "no")
                <a href="{{ route('execs.publish.create', $request) }}" class="util-btn blu-util float-right">
                    Create Broadcast
                </a>
            @endif
        @endcan
    </h2>

    <section class="w-100 marg card-sub-o-mt">
        <h4 class="card-sub">{{__('Request Details')}}</h4>

        <div class="bg-white float-lg-none mb-lg-0 mb-md-5 mb-sm-5 shade w-65">
            <ul class="list-group list-group-flush">
                @if(isset($request->child_name))
                    <li class="list-group-item">
                        <medium class="card-sub">Name of Child</medium>
                        <p class="mb-0 mt-1">{{$request->child_name}}</p>
                    </li>
                @endif

                @if(isset($request->parent_name))
                    <li class="list-group-item">
                        <medium class="card-sub">Name of Parent</medium>
                        <p class="mb-0 mt-1">{{$request->parent_name}}</p>
                    </li>
                @endif

                @if(isset($request->spouse_name))
                    <li class="list-group-item">
                        <medium class="card-sub">Name of Spouse</medium>
                        <p class="mb-0 mt-1">{{$request->spouse_name}}</p>
                    </li>
                @endif

                @if(isset($request->relation))
                    <li class="list-group-item">
                        <medium class="card-sub">Relation</medium>
                        <p class="mb-0 mt-1">{{ \Illuminate\Support\Str::ucfirst($request->relation) }}</p>
                    </li>
                @endif

                @if(isset($request->child_dob))
                    <li class="list-group-item">
                        <medium class="card-sub">Child Date of Birth</medium>
                        <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($request->child_dob)->format('jS F, Y') }}</p>
                    </li>
                @endif

                @if(isset($request->funeral_date))
                    <li class="list-group-item">
                        <medium class="card-sub">Date of Funeral</medium>
                        <p class="mb-0 mt-1">{{ \Carbon\Carbon::parse($request->funeral_date)->format('jS F, Y') }}</p>
                    </li>
                @endif

                @if(isset($request->publish) && $request->request_type != "Child Birth")
                    <li class="list-group-item">
                        <medium class="card-sub">Publish To Members</medium>
                        <p class="mb-0 mt-1">{{ \Illuminate\Support\Str::ucfirst($request->publish) }}</p>
                    </li>
                @endif

                <li class="list-group-item">
                    <medium class="card-sub">Date of Request</medium>
                    <p class="mb-0 mt-1">
                        {{ $request->created_at->format('jS F, Y') }}
                        @if($request->status == "Pending")
                            ({{ \Carbon\Carbon::parse($request->created_at)->diffForHumans() }})
                        @endif
                    </p>
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

                 @if($request->request_type == "Child Birth")
                 data-height="46%">
                @elseif($request->request_type == "Death of Spouse")
                    data-height="57%">
                @elseif($request->request_type == "Death of Parent")
                    data-height="69%">
                @else
                    data-height="46%"
                @endif>

                @if(\Illuminate\Support\Str::endsWith($request->media, 'pdf'))
                    <div class="text-center">
                        <strong>
                            There are no uploaded images. Please check the PDF section
                        </strong>
                    </div>
                @endif

                @if(isset($request->media))
                    <img src="{{ asset('/storage/' . $request->media) }}">
                @endif
            </div>
        </div>
    </section>

    @if(\Illuminate\Support\Str::endsWith($request->media, 'pdf'))
        <section class="clearfix card-sub-mt marg">
            <embed
                src="{{ asset('/storage/' . $request->media) }}#view=Fit&zoom=scale&toolbar=1&navpanes=1&scrollbar=1&statusbar=1"
                type="application/pdf" width="100%" height="600px"/>
        </section>
    @endif

    <section class="clearfix card-sub-mt">
        <h4 class="card-sub">{{__("Member's Details")}}</h4>

        <div class="w-100 bg-white shade">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <medium class="card-sub">Full Name</medium>
                    <p class="mb-0 mt-1">{{ $request->user->firstname . " " . $request->user->lastname}}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Department</medium>
                    <p class="mb-0 mt-1">
                        {{ $department[0]['name'] }}
                    </p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Email</medium>
                    <p class="mb-0 mt-1">{{ $request->user->email }}</p>
                </li>

                <li class="list-group-item">
                    <medium class="card-sub">Phone Number</medium>
                    <p class="mb-0 mt-1">{{ $request->user->phonenumber }}</p>
                </li>
            </ul>
        </div>
    </section>
@endsection
