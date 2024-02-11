@extends('layouts.template')

@section('content')
<div class="d-flex align-items-center mb-4">
    <h4 class="fs-20 font-w600 mb-0 me-auto">Edit Profile</h4>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
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
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Upload Image<span class="text-danger scale5 ms-2">*</span></label>
                            <div class="input-group mb-9">
                                <span class="input-group-text">Upload</span>
                                <div class="form-file">
                                    <input type="file" name="file" class="form-file-input form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Created Date<span class="text-danger scale5 ms-2">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                <input size="16" type="text" value="{{ $user->created_at }}" readonly class="form-control form_datetime solid">
                            </div>
                        </div>
                        <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Last Update <span class="text-danger scale5 ms-2">*</span></label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                <input size="16" type="text" name="updated_at" value="{{ $user->updated_at }}" readonly class="form-control form_datetime solid">
                            </div>
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
