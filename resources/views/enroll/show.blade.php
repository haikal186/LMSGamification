@extends('layouts.course.template')

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Course</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Overview</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="profile-back">
                    @if($file_course->isNotEmpty())
                        @foreach($file_course as $fileItem)
                            @if($fileItem->file_path)
                                <img src="{{ asset($fileItem->file_path) }}" alt="">
                                @break 
                            @endif
                        @endforeach
                    @else
                        <img src="{{ asset('images/profile1.jpg') }}" alt="">
                    @endif
                    <div class="social-btn">
                        <a href="#" class="btn btn-light social">{{ $total_students }} Students</a>
                        <button type="button" class="btn btn-primary">{{ $course->name }}</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Course Details</h4>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $course->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="nav flex-column nav-pills mb-3">
                                <a href="#v-pills-home" data-bs-toggle="pill" class="nav-link active show">Course Description</a>
                                <a href="#v-pills-messages" data-bs-toggle="pill" class="nav-link">Course Content</a>
                                <a href="#v-pills-profile" data-bs-toggle="pill" class="nav-link">Assignments</a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="v-pills-home" class="tab-pane fade active show">
                                    <p>
                                        {{ $course->description }}
                                    </p>
                                </div>
                                <div id="v-pills-messages" class="tab-pane fade">
                                    <p>
                                        <b>Course Content</b>
                                    </p>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>File Name</th>
                                                            <th>Date Uploaded</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($file_course)
                                                            @foreach ($file_course->where('file_type', 'application/pdf') as $key => $file)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td><a href="{{ $file->file_path }}" target="_blank">{{ $file->original_name }}</a></td>
                                                                    <td>{{ $file->created_at->format('d-m-Y') }}</td>
                                                                    <td>
                                                                        <div class="action-buttons d-flex">
                                                                            <a href="{{ $file->file_path }}" class="btn btn-success" download>
                                                                                <i class="fas fa-download"></i> Download
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="v-pills-profile" class="tab-pane fade">
                                    <p>
                                        <b>Assignment List</b>
                                    </p>
                                    <div class="row mt-4">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Assignment Name</th>
                                                                <th>Status</th>
                                                                <th>File Name</th>
                                                                <th>Date Submit</th>
                                                                <th>Upload</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($assignments as $key => $assignment)
                                                            <tr>
                                                                <td>{{  $key + 1 }}</td>
                                                                <td>{{ $assignment->name }}</td>
                                                                <td>{{ $status[$assignment->id] }}</td>
                                                                <td>
                                                                    @if ($assignment->files)
                                                                        <a href="{{ $assignment->files->file_path }}" target="_blank">{{ $assignment->files->original_name }}</a>
                                                                    @else
                                                                        No file uploaded 
                                                                    @endif  
                                                                </td>                                         
                                                                <td>{{ $assignment->created_at }}</td>
                                                                <td>
                                                                    <div class="action-buttons d-flex">
                                                                        <button class="btn btn-secondary me-3 btn-sm" data-bs-toggle="modal" data-bs-target="#upload_file{{ $assignment->id }}"><i class="fa fa-upload"></i>Upload File</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- Upload File Modal -->
                                                            <div class="modal fade" id="upload_file{{ $assignment->id }}">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Upload File</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form method="POST" action="{{ route('enroll.storeFile', $assignment->id) }}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <div class="col-xl-12">
                                                                                    <label class="text-black font-w600 form-label">Upload File<span class="required">*</span></label>
                                                                                    <div class="input-group mb-9">
                                                                                        <span class="input-group-text">Upload</span>
                                                                                        <div class="form-file">
                                                                                            <input type="file" name="file" value="" class="form-file-input form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
