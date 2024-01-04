@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="d-flex align-items-center flex-wrap search-job bg-white px-0 mb-4">
        <div class="col-xl-2 col-xxl-3 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
            <select class="form-control border-0 default-select style-1 h-auto">
                <option>Courses</option>
                @foreach ($courses as $course)
                    <option>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-2 col-xxl-3 col-lg-3 col-sm-6 col-12 search-dropdown d-flex align-items-center">
            <select class="form-control border-0 default-select style-1 h-auto">
                <option>Quizzes</option>
                <option>London</option>
                <option>France</option>
            </select>
        </div>
        <div class="col-xl-8 col-xxl-6 col-lg-6 col-12 d-md-flex job-title-search pe-0">
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
                    <h5>Showing {{ $quizzes->count() }} of {{ $totalQuiz }} quizzes results</h5>
                    <span>Based on your preferences</span>
                </div>
                <div class="d-flex mb-4">
                    <div class="default-tab job-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Boxed">
                                    <i class="fas fa-th-large"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#List1">
                                    <i class="fas fa-list"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <select class="default-select dashboard-select border-0 bg-transparent">
                            <option data-display="newest">newest</option>
                            <option value="2">oldest</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="Boxed" role="tabpanel">
                    <div class="row">
                        @foreach ($quizzes as $quiz)
                        <div class="col-xl-3 col-xxl-4 col-md-4 col-sm-6">
                            <div class="card" data-bs-toggle="modal" data-bs-target="#quizModal{{ $quiz->id }}">
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
                                        <h4 class="fs-20 mb-0">{{ $quiz->name }}</h4>
                                        <span class="text-primary mb-3 d-block">{{ $quiz->course->name }}</span>
                                    </div>
                                    <div>
                                        <span class="d-block mb-1"><i class="fas fa-map-marker-alt me-2"></i>Total Played : 57 Students </span>
                                        <span><i class="fas fa-comments-dollar me-2"></i>Total Question : {{ $quiz->questions->count() }} Qs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Start -->
                        <div class="modal fade" id="quizModal{{ $quiz->id }}">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="profile-head">
                                        <img src="images/profile/1.jpg" class="card-img-top img-fluid">
                                    </div>
                                    <div class="modal-header">
                                        <div class="profile-photo">
                                            <img alt="image" width="35" src="images/avatar/1.jpg" class="img-fluid rounded-circle">{{ Auth()->user()->name }}
                                        </div>
                                        <div>
                                            <h5 class="card-title">{{ $quiz->name }}</h5>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <p class="card-text">
                                            Sample Questions:
                                        </p>
                                        <div class="card bg-light">
                                            <div class="card-body mb-0">
                                                @foreach($quiz->questions->take(3) as $key => $question)
                                                    <p class="card-text"><b>{{ $key + 1 }}.</b> {{ $question->name }}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            Total Question: {{ $quiz->questions->count() }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('quiz.detail', $quiz->id) }}" class="btn btn-primary"> Take Quiz</a>        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal End -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->  
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="profile-head">
                    <img src="images/profile/1.jpg" class="card-img-top img-fluid">
                </div>
                <div class="modal-header">
                    <div class="profile-photo">
                        <img alt="image" width="35" src="images/avatar/1.jpg" class="img-fluid rounded-circle">  Haikal Hadi
                    </div>
                    <h5 class="card-title">{{ $quiz}}</h5>
                </div>
                <div class="modal-body">
                    <p class="card-text">
                        Sample Questions:
                    </p>
                    <div class="card bg-light">
                        <div class="card-body mb-0">
                            {{-- @foreach($course->quizzes->questions as $key => $question)
                                <p class="card-text">{{ $question }}</p>
                            @endforeach --}}
                        </div>
                    </div>
                    <p class="card-text">
                        Total Question: 12 Qs
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"> Take Quiz</button>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
