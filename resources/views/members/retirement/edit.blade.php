@extends('layouts.members')

@section('title', 'Edit Retirement Benefit Request | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Edit Request') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('retirement.update', $request->request_id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="retirement_date">Date of Retirement</label>

                <input type="date" class="form-control @error('retirement_date') is-invalid @enderror"
                       name="retirement_date" value="{{ old('retirement_date') ?? $request->retirement_date }}"
                       placeholder="Enter the your child's date of birth..." required>

                @error('retirement_date')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit">Update Benefit Request</button>
            </div>
        </form>
    </div>
@endsection
