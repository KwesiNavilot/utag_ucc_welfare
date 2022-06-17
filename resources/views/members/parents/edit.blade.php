@extends('layouts.members')

@section('title', "Update Parent's Details | UTAG-UCC Welfare")

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __("Update Parent's Details") }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.parents.update', $parent)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="firstname">First Name<span style="color: red">*</span></label>
                    <input class="form-control @error('firstname') is-invalid @enderror"
                           placeholder="{{ __('Eg; Azumah') }}" required autofocus name="firstname"
                           type="text" value="{{ old('firstname') ?? $parent->firstname }}">

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="lastname">Last Name<span style="color: red">*</span></label>
                    <input class="form-control @error('lastname') is-invalid @enderror"
                           placeholder="{{ __('Eg; Nelson') }}" required name="lastname"
                           type="text" value="{{ old('lastname') ?? $parent->lastname }}">

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="relation">Relation<span style="color: red">*</span></label>
                    <select class="form-control @error('relation') is-invalid @enderror" required name="relation">
                        <option value="mother" @if($parent->relation == 'mother') selected @endif>Mother</option>
                        <option value="father" @if($parent->relation == 'father') selected @endif>Father</option>
                    </select>

                    @error('relation')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-lg-6">
                    <label for="gender">Gender<span style="color: red">*</span></label>
                    <select class="form-control @error('gender') is-invalid @enderror" required name="gender">
                        <option value="male" @if($parent->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if($parent->gender == 'female') selected @endif>Female</option>
                    </select>

                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-lg-6">
                    <label for="status">Status<span style="color: red">*</span></label>
                    <select class="form-control @error('status') is-invalid @enderror" required name="status">
                        <option value="alive" @if($parent->status == 'alive') selected @endif>Alive</option>
                        <option value="deceased" @if($parent->status == 'deceased') selected @endif>Deceased</option>
                    </select>

                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input class="form-control @error('phonenumber') is-invalid @enderror"
                           placeholder="{{ __('E.g: 0212345678') }}" name="phonenumber" type="text"
                            value="{{ old('phonenumber') ?? $parent->phonenumber }}">

                    @error('phonenumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit">Update Parent Details</button>
            </div>
        </form>
    </div>
@endsection
