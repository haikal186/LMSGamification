@extends('layouts.question.template')

@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('question.update', $question->id) }}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <input class="form-control form-control-lg" name="question_name" value=" {{ $question_find->name }}" type="text" placeholder="Put Question Here...">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-xl-6 ">
                    <div class="card ">
                        <img class="card-img-top img-fluid" src="{{ asset('/images/card/2.png') }}" alt="Card image cap">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="text-black font-w600 form-label">Upload Image<span class="required">*</span></label>
                                    <div class="input-group mb-9">
                                        <span class="input-group-text">Upload</span>
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control">
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-primary me-3 btn-sm float-end">Remove</a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- @foreach ($question_find->answers as $answer) --}}
            @foreach ($question_find->answers as $key => $answer)
            <div class="col-xl-6">
                <div class="card text">
                    <div class="card-body mb-0">
                        <div class="input-group mb-3">
                            <input class="form-control form-control-lg" name="answer_name[]" type="text" value="{{ $answer->name }}" placeholder="Put Answer here...">
                            <div class="input-group-text">
                                <input type="checkbox" name="is_true[]" value="{{ $key }}" {{ $answer->is_true ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer text-end">
            <div>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection