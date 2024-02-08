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
                                <h4 class="text-primary mb-0">Muhamamad Haikal Bin Abdul Hadi</h4>
                                <p>Instructors / Quiz Author</p>
                            </div>
                            <div class="profile-email px-2 pt-2">
                                <h4 class="text-muted mb-0">haikal@gmail.com</h4>
                                <p>Email</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Quiz Details</h4>
            <div>
                <a href="{{ route('user_answer.show', $quiz->questions->first()->id) }}" class="btn btn-primary" type="submit">Start</a>
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
                                <a class="nav-link" data-bs-toggle="tab" href="#profile1"> Setting</a>
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
                                        <div class="col-sm-9 col-7"><span>: 10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile1" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Quiz Setting</h4>
                                        <form>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Timer</label>
                                                    <select class="form-control default-select wide" id="inputState">
                                                        <option selected="">Choose...</option>
                                                        <option>On (60s each question)</option>
                                                        <option>Off</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Power Ups</label>
                                                    <select class="form-control default-select wide" id="inputState">
                                                        <option selected="">Choose...</option>
                                                        <option>On</option>
                                                        <option>Off</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Background Music</label>
                                                    <select class="form-control default-select wide" id="inputState">
                                                        <option selected="">Choose...</option>
                                                        <option>On</option>
                                                        <option>Off</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <div class="form-check custom-checkbox">
                                                    <input type="checkbox" class="form-check-input" id="gridCheck">
                                                    <label class="form-check-label form-label" for="gridCheck"> Check me out</label>
                                                </div>
                                            </div> --}}
                                        </form>
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
