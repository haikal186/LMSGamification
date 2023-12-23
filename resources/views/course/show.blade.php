@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="profile-back">
                <img src="images/profile1.jpg" alt="">
                <form method="POST" action="{{ route('enroll.create', $course->id) }}">
                    @csrf
                    <div class="social-btn">
                        <a href="javascript:void(0);" class="btn btn-light social">245 Following</a>
                        <a href="javascript:void(0);" class="btn btn-light social">872 Followers</a>
                        <button type="submit" class="btn btn-primary">Take Course</button>
                    </div>
                </form>
            </div>
            <div class="profile-pic d-flex">
                <img src="images/profile/pic1.jpg" alt="">
                <div class="profile-info2">
                    <h2 class="mb-0">{{ $course->name }}</h2>
                    <h4>Lecturer Name</h4>
                    <span class="d-block"><i class="fas fa-map-marker-alt me-2"></i>Medan, Sumatera Utara - ID</span>
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
                        <span class="d-block mb-1"><i class="fas fa-circle me-2"></i>Currently Working at  <strong>Abcd Pvt Ltd</strong></span>
                        <span><i class="fas fa-circle me-2"></i>3 Yrs Of Working Experience in   <strong>Abcd Pvt Ltd</strong></span>
                    </div>
                    <div>
                        <a href="{{ route('course.edit', $course->id) }}" class="btn btn-warning btn-md me-2 mb-2"><i class="fas fa-share-alt me-2"></i>Edit Profile</a>
                        <a href="javascript:void(0);" class="btn btn-primary btn-md me-2 mb-2"><i class="fas fa-download me-2"></i>Delete Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h4 class="fs-20 font-w600">Quiz</h4>
                    <div class="card-action coin-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#Daily" role="tab">Daily</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#weekly" role="tab" >Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab" >Monthly</a>
                            </li>
                        </ul>
                    </div>
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
                                        @foreach ($quizzes as $quiz)
                                        <tr>
                                            <td>{{ $quiz->id }}</td>
                                            <td>{{ $quiz->name }}</td>
                                            <td class="wspace-no">35 students</td>
                                            <td>{{ $quiz->created_at }}</td>
                                            <td>
                                                <div class="action-buttons d-flex">
                                                    {{-- <a href="{{ route('quiz.show', ['course_id' => $course->id, 'quiz_id' => $quiz->id]) }}" class="btn btn-success light mr-2"> --}}
                                                        <a href="{{ route('quiz.show', $course->id) }}" class="btn btn-success light mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
                                                    </a>
                                                    <a class="btn btn-secondary light mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                            </g>
                                                        </svg>
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
                    <h4 class="fs-20 font-w600">Assignment</h4>
                    <div class="card-action coin-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#Daily" role="tab">Daily</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#weekly" role="tab" >Weekly</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#monthly" role="tab" >Monthly</a>
                            </li>
                        </ul>
                    </div>
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
                                            <th>Type</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Network Engineer</td>
                                            <td class="wspace-no">Full-Time</td>
                                            <td>12-01-2021</td>
                                            <td>
                                                <div class="action-buttons d-flex">
                                                    <a href="javascript:void(0);" class="btn btn-success light mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px"><g data-name="Layer 21"><path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path><circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle></g></svg>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-secondary light mr-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                            </g>
                                                        </svg>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div>
                        <a href="{{ route('profile.create') }}" class="btn btn-primary me-3 btn-sm"><i class="fas fa-plus me-2"></i>Add New Assignment</a>        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addQuizModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Quiz Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="comment-form" method="POST" action="{{ route('quiz.store', $course->id) }}">
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
                                            <input type="file" class="form-file-input form-control">
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
</div>
@endsection
