@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="widget-stat card bg-secondary">
                <div class="card-body p-4">
                    <div class="media">
                        <span class="me-3">
                            <i class="la la-graduation-cap"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">{{ $course->title }}</p>
                            <h3 class="text-white">{{ $quiz->title }}</h3>
                            <div class="progress mb-2 bg-primary">
                                <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                            </div>
                            <small>{{ $quiz->description }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Quiz Detail</h4>
            <div>
                <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"> <i class="fas fa-envelope"></i></a>
                <a href="javascript:void(0);" class="btn btn-secondary btn-sm me-3"><i class="fas fa-phone-alt"></i></a>
                <a href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fas fa-info"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.updateQuiz', $quiz->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Quiz Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" value="{{ $quiz->title }}" name="title" placeholder="Quiz name..." aria-label="name">
                                {{-- <input type="text" class="form-control solid js-example-disabled" placeholder="Name" aria-label="name"> --}}
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Image<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group mb-9">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                    <input type="file" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Created Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" type="text" value="{{ $quiz->created_at }}" readonly class="form-control form_datetime solid">
                                </div>
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid js-example-disabled" name="description" aria-label="With textarea">{{ $quiz->description }}</textarea>
                                {{-- <textarea class="form-control solid js-example-disabled" aria-label="With textarea"></textarea> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            {{-- <button class="btn btn-primary me-2" id="js-programmatic-enable">Enable</button>
                            <button class="btn btn-primary" id="js-programmatic-disable">Disable</button> --}}
                            <button class="btn btn-secondary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">Question Preview</h4>
        <div>
            <a href="javascript:void(0);" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add Question</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Question 1</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Q: Some quick example text to build on the card title and make up the bulk of the card's content.?</p>
                </div>
                <div class="card-footer">
                    <div class="card-footer-link mb-4 mb-sm-0">
                        <p class="card-text text-dark d-inline">Answer Choice:</p>
                        <div class="basic-form mt-4">
                            <div class="col-xl-4 col-xxl-6 col-6">
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 2</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 3</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 4</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Question 1</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Q: Some quick example text to build on the card title and make up the bulk of the card's content.?</p>
                </div>
                <div class="card-footer">
                    <div class="card-footer-link mb-4 mb-sm-0">
                        <p class="card-text text-dark d-inline">Answer Choice:</p>
                        <div class="basic-form mt-4">
                            <div class="col-xl-4 col-xxl-6 col-6">
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 2</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 3</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="optradio"> Option 4</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection