@extends('layouts.members')

@section('title', 'Benefit Requests | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Retirement Benefit') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.retirement.store')}}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for="retirement_date">Date Of Retirement</label>

                <input type="date" class="form-control @error('retirement_date') is-invalid @enderror"
                       name="retirement_date" value="{{ old('retirement_date') }}" placeholder="Enter your retirement date here..." required>

                @error('retirement_date')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="publish">Publish To Members</label>

                <select class="form-control @error('publish') is-invalid @enderror" name="publish">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

                @error('publish')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit">Request Benefit</button>
            </div>
        </form>
    </div>
@endsection
