@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">Create New Course</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12  col-md-6 mb-4">
                                <label  class="form-label font-w600">Course Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="name" class="form-control solid" placeholder="Course name" aria-label="name">
                            </div>
                            <div class="col-xl-12  col-md-6 mb-4">
                                <label class="text-black font-w600 form-label">Upload Image<span class="required">*</span></label>
                                <div class="input-group mb-9">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                        <input type="file" name="file" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <button type="submit" class="btn btn-secondary">Create</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection