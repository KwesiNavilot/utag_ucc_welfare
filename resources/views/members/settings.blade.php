@extends('layouts.members')

@section('title', 'Account Settings | UTAG-UCC Welfare')

@section('content')
{{--    @dd($departments)--}}

    <div data-purpose="account_password">
        <h4 class="card-sub">{{__('Change Password')}}</h4>

        <div class="shade col-lg-12">
            <form action="{{route('members.updatepassword', Auth::user())}}" method="POST">
                @csrf

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
