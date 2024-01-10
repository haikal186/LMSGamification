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
                            <p class="mb-1">{{ $course->name }}</p>
                            <h3 class="text-white">{{ $quiz->name }}</h3>
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
                    <form method="POST" action="{{ route('quiz.update',  $quiz->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Quiz Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" value="{{ $quiz->name }}" name="name" placeholder="Quiz name..." aria-label="name">
                                {{-- <input type="text" class="form-control solid js-example-disabled" placeholder="Name" aria-label="name"> --}}
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Quiz Difficulty<span class="text-danger scale5 ms-2">*</span></label>
                                <select class ="form-select form-control solid" name="level">
                                    <option selected>Choose...</option>
                                    <option value="Easy" {{ $quiz->level === 'Easy' ? 'selected' : '' }}>Easy</option>
                                    <option value="Medium" {{ $quiz->level === 'Medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="Hard" {{ $quiz->level === 'Hard' ? 'selected' : '' }}>Hard</option>
                                </select>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Quiz Duration (Seconds)<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input type="text" name="quiz_duration" class="form-control" value="{{ $quiz->quiz_duration }}">
                                </div>
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
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
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
            <a href="{{ route('question.create', $quiz->id) }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add Question</a>
        </div>
    </div>
    <div class="row">
        @foreach($questions as $question)
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Question {{ $question->id }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <div class="card-text"><b>Q: {{ $question->name }}</b></div>
                            <br>
                            <div class="card-text mt-6">Answer Choice:</div>
                            <div class="basic-form mt-2">
                                <div class="col-xl-6 col-sm-6">
                                    @foreach ($question->answers as $answer)
                                        <div class="radio">
                                            <input type="radio" name="optradio_{{ $question->id }}" {{ $answer->is_true ? 'checked' : '' }}> {{ $answer->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('question.show', $question->id) }}" class="btn btn-primary me-3 btn-sm">Update</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection