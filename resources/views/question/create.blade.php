@extends('layouts.question.template')

@section('content')
<div class="container-fluid">
        <form method="POST" action="{{ route('question.store', $quiz->id) }}" enctype="multipart/form-data">        
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <input class="form-control form-control-lg" name="question_name" type="text" placeholder="Put Question Here...">
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
                                            <input type="file" name="file" class="form-file-input form-control">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card text">
                    <div class="card-body mb-0">
                        <div class="input-group mb-3">
                            <input class="form-control form-control-lg" name="answer_name[]" type="text" placeholder="Put Answer here...">
                            <div class="input-group-text">
                                <input type="checkbox" name="is_true[]" value="0">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card text">
                    <div class="card-body mb-0">
                        <div class="input-group mb-3">
                            <input class="form-control form-control-lg" name="answer_name[]" type="text" placeholder="Put Answer here...">
                            <div class="input-group-text">
                                <input type="checkbox" name="is_true[]" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card text">
                    <div class="card-body mb-0">
                        <div class="input-group mb-3">
                            <input class="form-control form-control-lg" name="answer_name[]" type="text" placeholder="Put Answer here...">
                            <div class="input-group-text">
                                <input type="checkbox" name="is_true[]" value="2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card text">
                    <div class="card-body mb-0">
                        <div class="input-group mb-3">
                            <input class="form-control form-control-lg" name="answer_name[]" type="text" placeholder="Put Answer here...">
                            <div class="input-group-text">
                                <input type="checkbox" name="is_true[]" value="3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div>
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </div>
    </form>
    {{-- <form method="POST" action="{{ route('question.store', $quiz->id) }}">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Question<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="question_name" placeholder="Quiz name..." aria-label="name">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Answer 1<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="answer_name[]" placeholder="Quiz name..." aria-label="name">
                            </div>
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Answer 2<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="answer_name[]" placeholder="Quiz name..." aria-label="name">
                            </div>
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Answer 3<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="answer_name[]" placeholder="answer name..." aria-label="name">
                            </div>
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Answer 4<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="answer_name[]" placeholder="Quiz name..." aria-label="name">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <button class="btn btn-secondary" type="submit">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
</div>
@endsection