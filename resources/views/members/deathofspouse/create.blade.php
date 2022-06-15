@extends('layouts.members')

@section('title', 'Request Death Of Spouse Benefits | UTAG-UCC Welfare')

@section('content')
    {{--    @dd($spouse_id)--}}
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Death Of Spouse Benefit') }}
    </h2>

    @isset($spouse_id)
        <div class="shade col-lg-12">
            <form action="{{route('members.deathofspouse.store')}}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="form-group">
                    <label for="spouse">Name Of Spouse</label>
                    <select class="form-control @error('spouse') is-invalid @enderror" name="spouse">
                        <option value="{{ $spouse_id }}">{{ $name }}</option>
                    </select>

                    @error('spouse')
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
    @endisset
@endsection
