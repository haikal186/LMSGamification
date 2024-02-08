@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="profile-back">
                @if($file && $file->file_path)
                    <img src="{{ asset($file->file_path) }}" alt="">
                @else
                    <img src="{{ asset('images/profile1.jpg') }}" alt="">
                @endif
                <form method="POST" action="{{ route('enroll.store', $course->id) }}">
                    @csrf
                    <div class="social-btn">
                        <a href="javascript:void(0);" class="btn btn-light social">3 Students</a>
                        <button type="submit" class="btn btn-primary">Take Course</button>
                    </div>
                </form>
            </div>
            <div class="profile-pic d-flex">
                <img src="{{ asset('images/profile/pic1.jpg') }}" alt="">
                <div class="profile-info2">
                    <h2 class="mb-0">{{ $course->name }}</h2>
                    <h4>Muhammad Haikal Bin Abdul Hadi</h4>
                    <span class="d-block">haikal@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 font-w600">Course Detail</h4>
                </div>
                <div class="card-body">
                    <p class="fs-18">{{ $course->description }}</p>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between">
                    <div class="mb-md-2 mb-3">
                    </div>
                    <div>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning btn-md me-2 mb-2"><i class="fas fa-share-alt me-2"></i>Edit Course</a>
                        <a href="{{ route('course.delete', $course->id) }}" class="btn btn-primary btn-md me-2 mb-2"><i class="fas fa-download me-2"></i>Delete Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quiz & Assignment -->
    <div class="row mt-4">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 font-w600">Quiz List</h4>
                </div>
                <div class="row mt-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Quiz Name</th>
                                            <th>Total Taken</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $key => $quiz)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $quiz->name }}</td>
                                            <td class="wspace-no">2 students</td>
                                            <td>{{ $quiz->created_at }}</td>
                                            <td>
                                                <div class="action-buttons d-flex">
                                                    {{-- <a href="{{ route('quiz.show', ['course_id' => $course->id, 'quiz_id' => $quiz->id]) }}" class="btn btn-success light mr-2"> --}}
                                                        <a href="{{ route('quiz.show', $course->id) }}" class="btn btn-success light mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-danger light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div>
                        <a class="btn btn-primary me-3 btn-sm" data-bs-toggle="modal" data-bs-target="#addQuizModal"><i class="fas fa-plus me-2"></i>Add New Quiz</a>        
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 font-w600">Assignment List</h4>
                </div>
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
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assignments as $key => $assignment)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $assignment->name }}</td>
                                            <td class="wspace-no">{{ $assignment->status }}</td>
                                            <td>{{ $assignment->created_at }}</td>
                                            <td>
                                                <div class="action-buttons d-flex">
                                                    <a href="{{ route('assignment.show', $assignment->id) }}" class="btn btn-success light mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-danger light">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div>
                        <a class="btn btn-primary me-3 btn-sm" data-bs-toggle="modal" data-bs-target="#addAssignmentModal"><i class="fas fa-plus me-2"></i>Add Assignment</a>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  Quiz Modal -->
    <div class="modal fade" id="addQuizModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quiz Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" method="POST" action="{{ route('quiz.store', $course->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="text-black font-w600 form-label">Quiz Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Quiz name...">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="text-black font-w600 form-label">Upload Image<span class="required">*</span></label>
                                    <div class="input-group mb-9">
                                        <span class="input-group-text">Upload</span>
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-12">
                                <div class="mb-6">
                                    <label class="text-black font-w600 form-label">Description*</label>
                                    <textarea rows="8" class="form-control" name="description" placeholder="Description..."></textarea>
                                </div>
                            </div>
                            <!-- Hidden input for course ID -->
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="row mt-4">
                                <div class="col-lg-12 text-end">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary me-3 btn-sm">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    
     <!--  Assignment Modal -->
    <div class="modal fade" id="addAssignmentModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assignment Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" method="POST" action="{{ route('assignment.store', $course->id) }}">
                        @csrf
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="text-black font-w600 form-label">Assignment Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder="Assignment name...">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="text-black font-w600 form-label">Assign Date:</label>
                                <div class="mb-3">
                                    <label class="text-black font-w600 form-label">Date*</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                        <input name="assign_date" class="datepicker-default form-control" id="datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="text-black font-w600 form-label">Time*</label>
                                <div class="input-group clockpicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input name="assign_time" type="text" class="form-control" value="12:00 PM" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <label class="text-black font-w600 form-label">Deadline:</label>
                                <div class="mb-3">
                                    <label class="text-black font-w600 form-label">Date*</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="far fa-calendar"></i></div>
                                        <input name="deadline_date" class="datepicker-default form-control" id="datepicker">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="text-black font-w600 form-label">Time*</label>
                                <div class="input-group clockpicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input name="deadline_time" type="text" class="form-control" value="12:00 PM" readonly>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="mb-6">
                                    <label class="text-black font-w600 form-label">Description*</label>
                                    <textarea rows="8" class="form-control" name="description" placeholder="Description..."></textarea>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-end">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary me-3 btn-sm">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
