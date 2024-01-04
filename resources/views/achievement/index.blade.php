@extends('layouts.template')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex d-block justify-content-between align-items-center mb-4">
        <div class="card-action coin-tabs mt-3 mt-sm-0">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#AllStatus">Achievement Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#Pending">Complete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab" href="#On-Hold">In progress</a>
                </li>
            </ul>
        </div>
        <div class="d-flex mt-sm-0 mt-3">
            <select class="default-select dashboard-select">
                <option data-display="newest">newest</option>
                <option value="2">oldest</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive">
                <table class="table display mb-4 dataTablesCard job-table table-responsive-xl card-table" id="example5">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Course</th>
                            <th>Quiz Name</th>
                            <th>Date Taken</th>
                            <th>Achievement Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grouped_achievements as $quiz_id => $achievements)
                            <tr>
                             @foreach($achievements as $key => $achievement)
                                 @if($loop->first)
                                    <td>{{ $loop->parent->iteration }}</td>
                                    <td>{{ $achievement->quizzes->course->name }}</td>
                                    <td class="wspace-no">
                                        <span class="fs-16">
                                            <!-- Your SVG or image -->
                                            {{ $achievement->quizzes->name }}
                                        </span>
                                    </td>
                                    <td>{{ $achievement->date_completed }}</td>
                                    <td>
                                        <h6>Completed
                                            <span class="pull-end">
                                                @if(isset($completion_percentages[$quiz_id]))
                                                    {{ $completion_percentages[$quiz_id] }}%
                                                @else
                                                    0%
                                                @endif
                                            </span>
                                        </h6>
                                        <div class="progress ">
                                            <div class="progress-bar bg-danger progress-animated" style="width: @if(isset($completion_percentages[$quiz_id])){{ $completion_percentages[$quiz_id] }}%@else 0%@endif; height:6px;" role="progressbar">
                                                <span class="sr-only">
                                                    @if(isset($completion_percentages[$quiz_id]))
                                                        {{ $completion_percentages[$quiz_id] }}% Complete
                                                    @else
                                                        0% Complete
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons d-flex">
                                            <a href="{{ route('achievement.show', $quiz_id) }}" class="btn btn-success light mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="svg-main-icon" width="24px" height="24px" viewBox="0 0 32 32" x="0px" y="0px">
                                                    <g data-name="Layer 21">
                                                        <path d="M29,14.47A15,15,0,0,0,3,14.47a3.07,3.07,0,0,0,0,3.06,15,15,0,0,0,26,0A3.07,3.07,0,0,0,29,14.47ZM16,21a5,5,0,1,1,5-5A5,5,0,0,1,16,21Z" fill="#000000" fill-rule="nonzero"></path>
                                                        <circle cx="16" cy="16" r="3" fill="#000000" fill-rule="nonzero"></circle>
                                                    </g>
                                                </svg>
                                            </a>
                                            <!-- Add other action buttons here -->
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{!! asset('/vendor/datatables/js/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('/js/plugins-init/datatables.init.js') !!}"></script>
@endsection
