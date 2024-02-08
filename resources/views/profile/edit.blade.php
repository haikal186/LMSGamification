@extends('layouts.template')

@section('content')
<div class="d-flex align-items-center mb-4">
    <h4 class="fs-20 font-w600 mb-0 me-auto">Edit Instructor</h4>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('profile.update', $user->id) }}">
                    @csrf
                    @method('PUT')
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
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
