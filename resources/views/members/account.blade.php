@extends('layouts.members')

@section('title', 'My Account | UTAG-UCC Welfare')

@section('content')
{{--    @dd($departments)--}}

    <div data-purpose="account_details">
        <h4 class="card-sub">{{__('Details')}}</h4>

        <div class="shade col-lg-12">
            <form action="{{route('members.updatedetails')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                               name="firstname"
                               value="{{ old('firstname') ?? $member->firstname }}" placeholder="First Name" required>

                        @error('firstname')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                               value="{{ old('lastname') ?? $member->lastname }}" placeholder="Last Name" required>
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{$member->email}}" placeholder="Example: kwekumanu@gmail.com" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phonenumber">Phone Number</label>
                    <input type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber"
                           value="{{$member->phonenumber}}" placeholder="Example: kwekumanu@gmail.com" required>
                    @error('phonenumber')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control @error('department') is-invalid @enderror" name="department">
                        @foreach($departments as $department)
                            <option value="{{ $department->short }}" @if($member->department == $department->short)selected @endif>
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

                <div class="text-center">
                    <button type="submit">Update Details</button>
                </div>
            </form>
        </div>
    </div>

    <div data-purpose="account_password" class="mt-5">
        <h4 class="card-sub">{{__('Password')}}</h4>

        <div class="shade col-lg-12">
            <form action="{{route('members.updatepassword', Auth::user())}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" class="form-control @error('current-password') is-invalid @enderror"
                           name="current-password" placeholder="Enter your current password here..." required>
                    @error('current-password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                           name="new_password" placeholder="Enter your new password here..." required>
                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Current Password</label>
                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror"
                           name="new_password_confirmation" placeholder="Re-enter your new password to confirm it..."
                           required>
                    @error('new_password_confirmation')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
