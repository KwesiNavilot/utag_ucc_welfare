@extends('layouts.members')

@section('title', 'Update Spouse Details | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Update Spouse Details') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.spouse.update', $spouse)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="firstname">First Name<span style="color: red">*</span></label>
                    <input class="form-control @error('firstname') is-invalid @enderror"
                           placeholder="{{ __('Eg; Dzifa') }}" required autofocus name="firstname"
                           type="text" value="{{ old('firstname') ?? $spouse->firstname }}">

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="lastname">Last Name<span style="color: red">*</span></label>
                    <input class="form-control @error('lastname') is-invalid @enderror"
                           placeholder="{{ __('Eg; Mensah') }}" required name="lastname"
                           type="text" value="{{ old('lastname') ?? $spouse->lastname }}">

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gender">Gender<span style="color: red">*</span></label>
                    <select class="form-control @error('gender') is-invalid @enderror" required name="gender">
                        <option value="male" @if($spouse->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if($spouse->gender == 'female') selected @endif>Female</option>
                    </select>

                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="status">Status<span style="color: red">*</span></label>
                    <select class="form-control @error('status') is-invalid @enderror" required name="status">
                        <option value="alive" @if($spouse->status == 'alive') selected @endif>Alive</option>
                        <option value="deceased" @if($spouse->status == 'deceased') selected @endif>Deceased</option>
                    </select>

                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="phonenumber">Phone Number<span style="color: red">*</span></label>
                    <input class="form-control @error('phonenumber') is-invalid @enderror"
                           placeholder="{{ __('E.g: 0212345678') }}" required name="phonenumber" type="text"
                            value="{{ old('phonenumber') ?? $spouse->phonenumber }}">

                    @error('phonenumber')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="alt_phonenumber">Alternate Phone Number</label>
                    <input class="form-control @error('alt_phonenumber') is-invalid @enderror"
                           placeholder="{{ __('E.g: 0212345678') }}" name="alt_phonenumber" type="text"
                           value="{{ old('alt_phonenumber') ?? $spouse->alt_phonenumber }}">

                    @error('alt_phonenumber')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit">Update Spouse Details</button>
            </div>
        </form>
    </div>
@endsection
