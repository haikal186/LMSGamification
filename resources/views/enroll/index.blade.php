@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center flex-wrap search-job bg-white px-0 mb-4">
        <div class="col-xl-2 col-xxl-3 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
            <select class="form-control border-0 default-select style-1 h-auto">
                <option>Courses</option>
                <option>London</option>
                <option>France</option>
            </select>
        </div>
        <div class="col-xl-10 col-xxl-9 col-lg-9 col-12 d-md-flex job-title-search pe-0">
            <div class="input-group search-area">
                <input type="text" class="form-control h-auto" placeholder="search course title here...">
                <span class="input-group-text">
                    <a href="javascript:void(0)" class="btn btn-primary btn-rounded">Search<i class="flaticon-381-search-2 ms-2"></i></a>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
                <div class="mb-4">
                    <h5>Showing {{ $enrolls->count(); }} of 1 course results</h5>
                    <span>Based on your preferences</span>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Boxed" role="tabpanel">
                    <div class="row">
                        @foreach ($enrolls as $enroll)
                            <div class="col-xl-3 col-xxl-4 col-md-4 col-sm-6">
                                <a href="{{ route('enroll.show', $enroll->course->id) }}">
                                    <div class="card">
                                        <div class="jobs2 card-body">
                                            <div class="text-center">
                                                <span>
                                                    <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                                                        <g transform="translate(-457 -443)">
                                                            <rect width="71" height="71" rx="12" transform="translate(457 443)" fill="#c5c5c5"></rect>
                                                            <g transform="translate(457 443)">
                                                                <rect data-name="placeholder" width="71" height="71" rx="12" fill="#2769ee"></rect>
                                                                <circle data-name="Ellipse 12" cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"></circle>
                                                                <circle data-name="Ellipse 11" cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode: multiply;isolation: isolate"></circle>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <h4 class="fs-20 mb-0">{{ $enroll->course->name }}</h4>
                                                <span class="text-primary mb-3 d-block">{{ $enroll->course->enrolls->count() }} Students</span>
                                            </div>
                                            <div>
                                                <span class="d-block mb-1"><i class="fas fa-map-marker-alt me-2"></i>
                                                    Enroll Date : {{ $enroll->course->enrolls->first() ? $enroll->course->enrolls->first()->enroll_date : 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between mb-4"> 
                        <div>
                            <h5 class="mb-0">Showing {{ $enrolls->count(); }} of 1 Data</h5>
                        </div>
                        <nav>
                            <ul class="pagination pagination-circle">
                                <li class="page-item page-indicator job-search-page">
                                    <a class="page-link" href="javascript:void(0)">Prev</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                <li class="page-item page-indicator job-search-page">
                                    <a class="page-link" href="javascript:void(0)">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>
@endsection
