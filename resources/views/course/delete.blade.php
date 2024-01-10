@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">Delete Course</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.destroy', $course->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Course Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="name" class="form-control solid" value="{{ $course->name }}" placeholder="Course name" aria-label="name">
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea" placeholder="Description">{{ $course->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection