@extends('layouts.execs')

@section('title', "Request For A Member's Demise Benefit | UTAG-UCC Welfare")

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('Demise Of A Member') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{ route('execs.requests.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Staff ID</label>
                <input type="text" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id"
                       value="{{ old('staff_id') }}" placeholder="Enter the member's staff ID..." required>
                @error('staff_id')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="funeral_date">Date of Funeral</label>

                <input type="date" class="form-control @error('funeral_date') is-invalid @enderror"
                       name="funeral_date" value="{{ old('funeral_date') }}"
                       placeholder="Enter the date of the funeral..." required>

                @error('funeral_date')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="publish-to-members">Funeral Poster/Invitation</label>

                <input type="file" accept="image/*,.pdf" class="form-control @error('poster') is-invalid @enderror"
                       name="poster">

                @error('poster')
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
