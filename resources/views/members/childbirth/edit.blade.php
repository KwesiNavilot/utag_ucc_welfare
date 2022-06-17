@extends('layouts.members')

@section('title', 'Edit Childbirth Benefit Request | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Edit Request') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.childbirth.update', $request->request_id)}}" enctype="multipart/form-data"
              method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="child">Name Of Child</label>

                <select class="form-control @error('child') is-invalid @enderror" name="child" required>
                    <option value="{{ $child->child_id }}">
                        {{ $child->firstname . " " . $child->lastname }}
                    </option>
                </select>

                @error('child')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="child_dob">Child's Date of Birth</label>

                <input disabled type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                       name="date_of_birth" value="{{ old('date_of_birth') ?? $child->date_of_birth }}"
                       placeholder="Enter the your child's date of birth..." required>

                @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-check-label pr-4" for="type">Do You Want To Upload A New Birth Certificate?</label>

                <div class="form-check-inline">
                    <label class="form-check-label pr-4">
                        <input value="yes" id="yesUploadImage" type="radio" class="form-check-input"
                               name="uploadNewImage" {{ old('uploadNewImages') == 'yes' ? 'checked' : '' }}>Yes
                    </label>

                    <label class="form-check-label pr-4">
                        <input value="no" id="noImageUpload" type="radio" class="form-check-input"
                               name="uploadNewImage" {{ old('uploadNewImages') == 'no' ? 'checked' : '' }}>No
                    </label>
                </div>
            </div>

            <div class="form-group" id="upload"
                 @if(old('uploadNewImages') == 'yes') style='display: block; !important' @endif>
                <label for="publish-to-members">Birth Certificate</label>

                <input type="file" accept="image/*,.pdf" class="form-control @error('birth_certificate') is-invalid @enderror"
                       name="birth_certificate" value="{{ $request->media }}">

                @error('birth_certificate')
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
