@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">Assignment</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('assignment.update', $assignment->id) }}">
                    @csrf
                    @method('PUT') 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6  col-md-6 mb-4">
                            <label  class="form-label font-w600">Assignment Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="name" value="{{ $assignment->name }}" placeholder="Name" aria-label="name">
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Status<span class="text-danger scale5 ms-2">*</span></label>
                                <select class="form-select form-control solid" name="status">
                                    <option value="Choose..." {{ is_null($assignment->status) ? 'selected' : '' }}>Choose...</option>
                                    <option value="Completed" {{ $assignment->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="In progress" {{ $assignment->status == 'In progress' ? 'selected' : '' }}>In progress</option>
                                </select>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Created Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" type="text" value="{{ $assignment->created_at }}" readonly class="form-control form_datetime solid">
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <label  class="form-label font-w600">Last Updated Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" type="text" value="{{ $assignment->updated_at }}" readonly class="form-control form_datetime solid">
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <div>
                                    <label class="form-label font-w600">Assigned Date : </label>
                                </div>
                                <label class="form-label font-w600">Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                        <input name="assign_date" class="datepicker-default form-control" value="{{ $assignment->assigned_date }}" id="datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <div style="height: 25px;"></div>
                                <label  class="form-label font-w600">Time<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group clockpicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input name="assign_time" type="text" class="form-control" value="{{ $assignment->assigned_time }}" readonly>
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <div>
                                    <label class="form-label font-w600">Deadline : </label>
                                </div>
                                <label class="form-label font-w600">Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                        <input name="deadline_date" class="datepicker-default form-control" id="datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6  col-md-6 mb-4">
                                <div style="height: 25px;"></div>
                                <label  class="form-label font-w600">Time<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group clockpicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input name="deadline_time" type="text" class="form-control" value="12:00 PM" readonly>
                                </div>
                            </div>
                            <div class="col-xl-12 mb-4">
                                <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea">{{ $assignment->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <a href="{{ route('assignment.show', $assignment->id) }}" class="btn btn-primary me-3">Back</a>
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
