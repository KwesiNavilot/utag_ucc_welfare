@extends('layouts.members')

@section('title', 'Request Death Of Parent Benefits | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Death Of Parent Benefit') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.deathofparent.store')}}" enctype="multipart/form-data" method="POST">
            @csrf

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
                <label for="parent_name">Name Of Parent</label>

                <input type="text" class="form-control @error('parent_name') is-invalid @enderror"
                       name="parent_name" value="{{ old('parent_name') }}"
                       placeholder="Enter your parent's name here..." required>

                @error('parent_name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="relation">Relation</label>

                <select class="form-control @error('relation') is-invalid @enderror" name="relation">
                    <option value="mother">Mother</option>
                    <option value="father">Father</option>
                </select>

                @error('relation')
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
@endsection
