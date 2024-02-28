@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h4 class="fs-20 font-w600  me-auto">Assigned List</h4>
        <div>
            <a href="{{ route('assignment.edit', $assignments->id) }}" class="btn btn-primary me-3 btn-sm">Edit Assignment</a>      
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Student Name</th>
                            <th>File Name</th>
                            <th>Submit Date</th>
                            <th>Submission Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submissions as $key => $submission)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $submission->user->name }}</td>
                            <td>File name.pdf</td>
                            <td>{{ $submission->submission_date }}</td>
                            <td>
                                @if(strtotime($submission->submission_date) <= strtotime($assignments->deadline))
                                    <span class="badge badge-success badge-lg light">On Time</span>
                                @else
                                    <span class="badge badge-danger badge-lg light">Late</span>
                                @endif
                            </td>
                            {{-- <span class="badge badge-danger badge-lg light">InActive</span> --}}
                            <td>
                                <div class="action-buttons d-flex">
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
@endsection
