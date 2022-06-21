@extends('layouts.members')

@section('title', 'My Profile | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Update Information') }}
    </h2>

    <div data-purpose="account_details">
        <div class="shade col-lg-12">
            <form action="{{route('members.profile.update', Auth::user())}}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6 pl-0">
                        <label for="staff_id">Staff ID<span style="color: red">*</span></label>
                        <input class="form-control @error('staff_id') is-invalid @enderror"
                               placeholder="{{ __('Enter your Staff ID') }}" required autofocus name="staff_id"
                               type="text" value="{{ old('staff_id') ?? $member->staff_id }}">

                        @error('staff_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6 pr-0">
                        <label for="title">Title<span style="color: red">*</span></label>
                        <select class="form-control @error('title') is-invalid @enderror" required name="title">
                            <option value="Mr." @if($member->title == 'Mr.') selected @endif>Mr.</option>
                            <option value="Mrs." @if($member->title == 'Mrs.') selected @endif>Mrs.</option>
                            <option value="Ing." @if($member->title == 'Ing.') selected @endif>Ing.</option>
                            <option value="Dr." @if($member->title == 'Dr.') selected @endif>Dr.</option>
                            <option value="Prof." @if($member->title == 'Prof.') selected @endif>Prof.</option>
                        </select>

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                               name="firstname" value="{{ old('firstname') ?? $member->firstname }}"
                               placeholder="First Name" required>

                        @error('firstname')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name<span style="color: red">*</span></label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                               value="{{ old('lastname') ?? $member->lastname }}" placeholder="Last Name" required>
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 pl-0">
                        <label for="date_of_birth">Date of Birth<span style="color: red">*</span></label>
                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                               name="date_of_birth" value="{{ old('date_of_birth') ?? $member->date_of_birth }}" required>

                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 pr-0">
                        <label for="date_of_birth">Date of Joining Association<span style="color: red">*</span></label>
                        <input type="date" class="form-control @error('date_joined') is-invalid @enderror"
                               name="date_joined" value="{{ old('date_joined') ?? $member->date_joined }}" required>

                        @error('date_joined')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">Email<span style="color: red">*</span></label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                               value="{{old('email') ?? $member->email}}" placeholder="Eg: kwekumanu@gmail.com"
                               required>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phonenumber">Phone Number<span style="color: red">*</span></label>
                        <input type="text" class="form-control @error('phonenumber') is-invalid @enderror"
                               name="phonenumber" value="{{old('phonenumber') ?? $member->phonenumber}}"
                               placeholder="Eg: 0212345678" required>

                        @error('phonenumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="alt_phonenumber">Alternate Phone Number</label>
                        <input type="text" class="form-control @error('alt_phonenumber') is-invalid @enderror"
                               name="alt_phonenumber" value="{{old('alt_phonenumber') ?? $member->alt_phonenumber}}"
                               placeholder="Eg: 0212345678">

                        @error('alt_phonenumber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="department">Department<span style="color: red">*</span></label>
                    <select class="form-control @error('department') is-invalid @enderror" name="department">
                        @foreach($departments as $department)
                            <option value="{{ $department->short }}"
                                    @if($member->department == $department->short)selected @endif>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('department')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

{{--                <div class="form-row">--}}
{{--                    <div class="col-md-12 form-group px-0">--}}
{{--                        <label for="dept_position">Position In Department</label>--}}
{{--                        <input class="form-control @error('dept_position') is-invalid @enderror"--}}
{{--                               placeholder="{{ __('E.g: Registrar') }}" name="dept_position"--}}
{{--                               type="text" value="{{ old('dept_position') ?? $member->dept_position }}">--}}

{{--                        @error('dept_position')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="text-center">
                    <button type="submit">Update Details</button>
                </div>
            </form>
        </div>
    </div>
@endsection
