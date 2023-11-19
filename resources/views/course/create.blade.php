@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">New Course</h4>
        {{-- <div>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"> <i class="fas fa-envelope"></i></a>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"><i class="fas fa-phone-alt"></i></a>
            <a href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fas fa-info"></i></a>
        
        </div> --}}
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Course Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" name="name" class="form-control solid" placeholder="Course name" aria-label="name">
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            {{-- <a href="javascript:void(0);" class="btn btn-primary me-3">Close</a> --}}
                            {{-- <a href="javascript:void(0);" class="btn btn-secondary">Submit</a> --}}
                            <button type="submit" class="btn btn-secondary">Submit</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection