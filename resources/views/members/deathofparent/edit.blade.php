@extends('layouts.members')

@section('title', 'Edit Death Of Parent Benefit Request | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Edit Request') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.deathofparent.update', $request->request_id)}}" enctype="multipart/form-data"
              method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="parent_name">Name Of Parent</label>

                <select class="form-control @error('parent') is-invalid @enderror" name="parent" required>
                    <option value="{{ $parent->parent_id }}" selected>
                        {{ $parent->firstname . " " . $parent->lastname }}
                    </option>
                </select>

                @error('parent')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="funeral_date">Date of Funeral</label>

                <input type="date" class="form-control @error('funeral_date') is-invalid @enderror"
                       name="funeral_date" value="{{ old('funeral_date') ?? $request->funeral_date }}"
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
                    <option value="yes" @if($request->publish == 'yes')selected @endif>Yes</option>
                    <option value="no" @if($request->publish == 'no')selected @endif>No</option>
                </select>

                @error('publish')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-check-label pr-4" for="type">Do You Want To Upload A New Image?</label>

                <div class="form-check-inline">
                    <label class="form-check-label pr-4">
                        <input value="yes" id="yesUploadImage" type="radio" class="form-check-input" name="uploadNewImage" {{ old('uploadNewImages') == 'yes' ? 'checked' : '' }}>Yes
                    </label>

                    <label class="form-check-label pr-4">
                        <input value="no" id="noImageUpload" type="radio" class="form-check-input" name="uploadNewImage" {{ old('uploadNewImages') == 'no' ? 'checked' : '' }}>No
                    </label>
                </div>
            </div>

            <div class="form-group" id="upload" @if(old('uploadNewImages') == 'yes') style='display: block; !important' @endif>
                <label for="publish-to-members">Funeral Poster/Invitation</label>

                <input type="file" accept="image/*,.pdf" class="form-control @error('poster') is-invalid @enderror"
                       name="poster" value="{{ $request->media }}">

                @error('poster')
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
