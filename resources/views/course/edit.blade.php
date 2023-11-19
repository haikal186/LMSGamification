@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">{{ $course->title }}</h4>
        <div>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"> <i class="fas fa-envelope"></i></a>
            <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"><i class="fas fa-phone-alt"></i></a>
            <a href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fas fa-info"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.update', $course->id) }}">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updates --}}
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="form-label font-w600">Course Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="title"  placeholder="Name" value="{{ $course->title }}" aria-label="name">
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
                        <div class="row">
                            <div class="col-xl-12">
                                <label class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea">{{ $course->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <a href="{{ route('course.detail', $course->id) }}" class="btn btn-primary me-3">Back</a>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
