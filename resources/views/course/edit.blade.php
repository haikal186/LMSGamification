@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">{{ $course->name }}</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updates --}}
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="form-label font-w600">Course Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="name"  placeholder="Name" value="{{ $course->name }}" aria-label="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="form-label font-w600">Created Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" type="text" value="{{ $course->created_at}}" readonly class="form-control form_datetime solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="text-black font-w600 form-label">Upload Image<span class="required">*</span></label>
                                <div class="input-group mb-9">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                        <input type="file" name="file" value="{{ $file->original_name }}"class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <label class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea">{{ $course->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary me-3">Back</a>
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
