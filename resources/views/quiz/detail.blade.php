@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Quiz</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $quiz->name }}</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="profile-back">
                @if ($file_quiz)
                    <img src="{{ asset($file_quiz->file_path) }}" alt="">
                @else
                    <img src="{{ asset('images/profile1.jpg') }}" alt="">
                @endif
                <div class="social-btn">
                    <a href="#" class="btn btn-light social">{{ $total_students }} Students Taken</a>
                    <a href="{{ route('user_answer.show', $quiz->questions->first()->id) }}" type="submit" class="btn btn-primary">Start</a>
                </div>
            </div>
            <div class="profile-pic d-flex">
                <div class="profile-info2">
                    <h2 class="mb-0">{{ $quiz->name }}</h2>
                    <h4>Muhammad Haikal Bin Abdul Hadi</h4>
                    <span class="d-block">haikal@gmail.com</span>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="d-flex align-items-center mb-4 mt-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Quiz Details</h4>
            <div>
                {{-- <a href="{{ route('user_answer.show', $quiz->questions->first()->id) }}" class="btn btn-primary" type="submit">Start</a> --}}
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#home1"> Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#profile1">Leaderboards</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="home1" class="tab-pane fade active show">
                                <div class="profile-about-me">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary">About</h4>
                                        <p class="mb-2">{{ $quiz->description }}</p>
                                        {{-- <p></p> --}}
                                    </div>
                                </div>
                                <div class="profile-personal-info">
                                    <h4 class="text-primary mb-4">Quiz Information</h4>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name</h5>
                                        </div>
                                        <div class="col-sm-9 col-7">
                                            <span>: {{ $quiz->name }} </span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Total Question</h5>                                            
                                        </div>
                                        <div class="col-sm-9 col-7"><span>: {{ $quiz->questions->count() }} Questions</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Total Students Played</h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span>: {{ $total_students }} Student</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile1" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Quiz Leaderboards</h4>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="table-responsive">
                                            <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Student Name</th>
                                                        <th>Date Completed</th>
                                                        <th>Duration</th>
                                                        <th>Total Scores (%)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user_scores as $user_score)
                                                        <tr>
                                                            <td>{{ $count ++ }}</td>
                                                            <td>{{ $user_score['user']['name'] }}</td>
                                                            <td>{{ $user_score['score']['date_completed'] }}</td>
                                                            <td>{{ number_format($user_score['score']['duration'] / 60, 2) }} Minutes</td>
                                                            {{-- <td>{{ $user_score['achievement_count']}} Total</td> --}}
                                                            <td>
                                                                <h6>Completed
                                                                    <span class="pull-end">
                                                                        {{ $user_score['score']['score'] }}%
                                                                    </span>
                                                                </h6>
                                                                <div class="progress">
                                                                    <div class="progress-bar bg-danger progress-animated" style="width: {{ $user_score['score']['score'] }}%;" role="progressbar">
                                                                        <span class="sr-only">{{ $user_score['score']['score'] }}% complete</span>
                                                                    </div>
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
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
