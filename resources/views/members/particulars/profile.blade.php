<?php

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

        <div class="form-group">
            <label for="date_of_birth">Date of Birth: {{ \Carbon\Carbon::parse($member->date_of_birth)->format('jS F, Y') }}</label>
            {{--                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"--}}
            {{--                           name="date_of_birth" value="{{ $member->date_of_birth }}"--}}
            {{--                           placeholder="Enter your date of birth..." required>--}}

            {{--                    @error('date_of_birth')--}}
            {{--                    <span class="invalid-feedback" role="alert">--}}
            {{--                                    <strong>{{ $message }}</strong>--}}
            {{--                                </span>--}}
            {{--                    @enderror--}}
        </div>

        <div class="text-center">
            <button type="submit">Update Details</button>
        </div>
    </form>
</div>
</div>
