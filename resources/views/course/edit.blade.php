@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center mb-4">
        <h4 class="fs-20 font-w600 mb-0 me-auto">Edit {{ $course->name }}</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="POST" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updates --}}
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="form-label font-w600">Course Name<span class="text-danger scale5 ms-2">*</span></label>
                                <input type="text" class="form-control solid" name="name"  placeholder="Name" value="{{ $course->name }}" aria-label="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="form-label font-w600">Created Date<span class="text-danger scale5 ms-2">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                                    <input size="16" type="text" value="{{ $course->created_at}}" readonly class="form-control form_datetime solid">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xl-6 col-md-6">
                                <label class="text-black font-w600 form-label">Upload Image<span class="required">*</span></label>
                                <div class="input-group mb-9">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                        <input type="file" name="file" class="form-file-input form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <label class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                                <textarea class="form-control solid" name="description" aria-label="With textarea">{{ $course->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div>
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-primary me-3">Back</a>
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h4 class="fs-20 font-w600  me-auto">Upload Content</h4>
        <div>
            <button class="btn btn-primary me-3 btn-sm" data-bs-toggle="modal" data-bs-target="#upload_file"><i class="fas fa-plus me-2"></i>Upload File</a>        
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>File Name</th>
                            <th>Date Uploaded</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($course->file)
                            @foreach ($course->file->where('file_type', 'application/pdf') as $key => $file)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ $file->file_path }}" target="_blank">{{ $file->original_name }}</a></td>                                               
                                    <td>{{ $file->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="action-buttons d-flex">
                                            <form action="{{ route('course.destroyFile', $course->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="file_id" value="{{ $file->id }}">
                                                <button type="submit" class="btn btn-danger light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                    </svg>
                                                </button>
                                            </form>
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

<!-- Upload File Modal -->
<div class="modal fade" id="upload_file">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('course.storeFile', ['course_id' => $course->id]) }}" enctype="multipart/form-data">
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
@endsection
