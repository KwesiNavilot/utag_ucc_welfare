@extends('layouts.members')

@section('title', 'Request Death Of Parent Benefits | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __('Request Death Of Parent Benefit') }}
    </h2>

    @if($parents->isEmpty())
        <div class="alert alert-warning p-4" role="alert">
            <p style="color: black;">
                You can't apply for any Death of Parent benefits because <strong>you either haven't added any parent or you
                    have already exhausted</strong> all your parent benefits.
                Please add a parent or update your parent's Status in order to apply for this type of benefit.
            </p>

            <div class="pt-3">
                <a href="{{ route('members.parents.index') }}" class="util-btn blu-util border-0">Add Or Update Parents Details</a>
            </div>
        </div>
    @endempty

    @if($parents->isNotEmpty())
        <div class="shade col-lg-12">
            <form action="{{route('members.deathofparent.store')}}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="form-group">
                    <label for="parent">Name Of Parent</label>
                    <select class="form-control @error('parent') is-invalid @enderror" name="parent" required>
                        @foreach($parents as $parent)
                            <option
                                value="{{ $parent->parent_id }}">{{ $parent->firstname . " " . $parent->lastname }}</option>
                        @endforeach
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
    @endif
@endsection
