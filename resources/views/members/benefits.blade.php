@extends('layouts.members')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('Benefit Requests') }}
    </h2>

    <section id="claims" class="section mb-lg-4">
        <div class="row icon-boxes">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="{{ route('childbirth.create') }}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-stack-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Birth of Child</span>
                        </h4>

                        <p class="description">
                            Voluptatum deleniti atque corrupti quos dolores et quas molestias
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="{{ route('deathofspouse.create') }}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-palette-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Death of Spouse</span>
                        </h4>

                        <p class="description">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                <a href="{{ route('deathofparent.create') }}">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-command-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Death of Parent</span>
                        </h4>

                        <p class="description">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white shade w-100 p-0">
        {{--        @dd($requests)--}}
        @empty($requests->all())
            <div class="p-3">
                <p class="m-0 text-center">You haven't made any benefit requests yet.</p>
            </div>
        @endempty

        @if(!empty($requests->all()))
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="px-lg-4" scope="col">#</th>
                    <th class="px-lg-4" scope="col">Benefit Type</th>
                    <th class="px-lg-4" scope="col">Request Date</th>
                    <th class="px-lg-4" scope="col" colspan="2">Status</th>
                </tr>
                </thead>

                <tbody>
                @foreach($requests as $key=>$request)
                    <tr>
                        @switch($request->request_type)
                            @case('Child Birth')
                            @php $link = url('/childbirth/' . $request->request_id) @endphp
                            @break
                            @case('Death of Parent')
                            @php $link = url('/deathofparent/' . $request->request_id) @endphp
                            @break
                            @case('Death of Spouse')
                            @php $link = url('/deathofspouse/' . $request->request_id) @endphp
                            @break
                        @endswitch

                        <th class="p-0" scope="row">
                            <a href="{{ $link }}" class="d-flex text-decoration-none">
                                {{ $key+1 }}
                            </a>
                        </th>
                        <td class="p-0">
                            <a href="{{ $link }}" class="d-flex text-decoration-none">
                                {{ $request->request_type }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ $link }}" class="d-flex text-decoration-none">
                                {{ $request->created_at->format('jS F, Y') }}
                            </a>
                        </td>
                        <td class="p-0">
                            <a href="{{ $link }}" class="d-flex text-decoration-none">
                                {{ $request->status }}
                            </a>
                        </td>
                        <td class="p-0 align-middle">
                            <a href="{{ $link }}"
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

    <div class="paginator float-lg-right mt-2">
        {{ $requests->links() }}
    </div>
@endsection
