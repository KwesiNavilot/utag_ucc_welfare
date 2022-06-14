@extends('layouts.members')

@section('title', "Update Child's Details | UTAG-UCC Welfare")

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-5">
        {{ __("Update Child's Details") }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('members.children.update', $child)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="firstname">First Name<span style="color: red">*</span></label>
                    <input class="form-control @error('firstname') is-invalid @enderror"
                           placeholder="{{ __('Eg; Nana Aba') }}" required autofocus name="firstname"
                           type="text" value="{{ old('firstname') ?? $child->firstname }}">

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="lastname">Last Name<span style="color: red">*</span></label>
                    <input class="form-control @error('lastname') is-invalid @enderror"
                           placeholder="{{ __('Eg; Amoako') }}" required name="lastname"
                           type="text" value="{{ old('lastname') ?? $child->lastname }}">

                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="date_of_birth">Date of Birth<span style="color: red">*</span></label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                           name="date_of_birth" value="{{ old('date_of_birth') ?? $child->date_of_birth }}" required>

                    @error('date_of_birth')
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
                        <option value="male" @if($child->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if($child->gender == 'female') selected @endif>Female</option>
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
                        <option value="alive" @if($child->status == 'alive') selected @endif>Alive</option>
                        <option value="deceased" @if($child->status == 'deceased') selected @endif>Deceased</option>
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
                            value="{{ old('phonenumber') ?? $child->phonenumber }}">

                    @error('phonenumber')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit">Update Child Details</button>
            </div>
        </form>
    </div>
@endsection
