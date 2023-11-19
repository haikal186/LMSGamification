@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('question.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-8  col-md-6 mb-4">
                                <label  class="form-label font-w600">Question<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="name" placeholder="Quiz name..." aria-label="name">
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
                    <div class="card-footer text-end">
                        <div>
                            <button class="btn btn-secondary" type="submit">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection