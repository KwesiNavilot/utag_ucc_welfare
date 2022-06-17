@extends('layouts.execs', ['trigger' => 'editor'])

@section('title', 'Create An Announcement For The Benefit Request | UTAG-UCC Welfare')

@section('content')
    <h2 class="page-header font-weight-bold">
        {{ __('Create Announcement For The Request') }}
    </h2>

    @include('includes.messages')

    <section class="shade col-lg-12">
        <form action="{{ route('execs.publish.store') }}" method="POST">
            @csrf

            <input type="hidden" name="request_id" value="{{ $request->request_id }}">

            <div class="form-group">
                <label for="title">Announcement Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       value="{{old('title')}}" placeholder="Example: The Demise of Prof. John Doe's Mother" required>
                @error('title')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="attach">Attach Request Media</label>
                <select class="form-control @error('attach') is-invalid @enderror" name="attach">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                </select>

                @error('attach')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="message">Message</label>
                <textarea type="text" id="editor" class="form-control @error('message') is-invalid @enderror"
                          name="message">{{old('message')}}</textarea>

                @error('message')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit">Send Announcement</button>
            </div>
        </form>
    </section>
@endsection
