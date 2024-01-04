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
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{ asset('images/profile/profile.png') }}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0">Mitchell C. Shay</h4>
                                    <p>UX / UI Designer</p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">info@example.com</h4>
                                    <p>Email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Course Summary</h4>
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
                                <a href="#v-pills-profile" data-bs-toggle="pill" class="nav-link">Course Learning Outcomes</a>
                                <a href="#v-pills-messages" data-bs-toggle="pill" class="nav-link">Course Syllabus</a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="v-pills-home" class="tab-pane fade active show">
                                    <p>
                                        {{ $course->description }}
                                    </p>
                                </div>
                                <div id="v-pills-profile" class="tab-pane fade">
                                    <p>
                                        Course Learning outcomes...
                                    </p>
                                </div>
                                <div id="v-pills-messages" class="tab-pane fade">
                                    <p>
                                        Course Syllabus:
                                    </p>
                                    <div>
                                        1.
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