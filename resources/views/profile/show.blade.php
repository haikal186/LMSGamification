@extends('layouts.template')

@section('content')
<div class="d-flex align-items-center mb-4">
    <h4 class="fs-20 font-w600 mb-0 me-auto">New Profile</h4>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('profile.show', $user) }}">
                {{-- <form method="POST" action="{{ route('profile.store', $user) }}"> --}}
                    @csrf
                    <div class="row">
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Name<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" name="name" class="form-control solid" placeholder="name" value="{{ $user->name }}" aria-label="name">
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Email<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" name="email" class="form-control solid" placeholder="email" value="{{ $user->email }}" aria-label="name">
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Password<span class="text-danger scale5 ms-2">*</span></label>
                            <input type="text" name="password" class="form-control solid" placeholder="password" value="{{ $user->password }}" aria-label="name">
                        </div>
                        {{-- <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Role<span class="text-danger scale5 ms-2">*</span></label>
                            <select  class="form-select form-control solid" name="role">
                                <option selected>Choose...</option>
                                <option>QA Analyst</option>
                                <option>IT Manager</option>
                                <option>Systems Analyst</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            {{-- <a href="javascript:void(0);" class="btn btn-primary me-3">Close</a> --}}
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
