@extends('layouts.execs')

@section('title', 'Add A New Member | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold mb-lg-4">
        {{ __('Add A Member') }}
    </h2>

    <div class="shade col-lg-12">
        <form action="{{route('execs.members.store')}}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Staff ID</label>
                <input type="text" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id"
                       value="{{ old('staff_id') }}" placeholder="Enter the member's staff ID..." required>
                @error('staff_id')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                           name="firstname" value="{{ old('firstname')}}"
                           placeholder="Enter the member's first name..." required>

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                           value="{{ old('lastname') }}" placeholder="Enter the member's last name..." required>
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
                       value="{{ old('email') }}" placeholder="Enter the member's email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phonenumber">Phone Number</label>
                <input type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber"
                       value="{{ old('phonenumber') }}" placeholder="Enter the member's phone number..." required>
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
                        <option value="{{ $department->short }}">{{ $department->name }}</option>
                    @endforeach
                </select>

                @error('department')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit">Add Member</button>
            </div>
        </form>
    </div>
@endsection
