@extends('layouts.quiz.template')
@section('content')
<div class="container-fluid">
    <div class="col-xl-12">
        <div class="widget-stat card bg-secondary">
            <div class="card-body p-4">
                <div class="media">
                    <span class="me-3">
                        <i class="la la-graduation-cap"></i>
                    </span>
                    <div class="media-body text-white">
                        <p class="mb-1">Total Scores Achieved</p>
                        <h3 class="text-white">{{ intval(number_format($total_score, 2)) }}%</h3>
                        <div class="progress mb-2 bg-primary">
                            <div class="progress-bar progress-animated bg-light" style="width: {{ $total_score }}%"></div>
                        </div>
                        <small>{{ $quiz->name }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Achievements</h4>
        </div>
        @foreach($achievement_ids as $achievement_id)
            @foreach($achievements as $achievement)
                @if($achievement_id === $achievement->id)
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="{{ asset('images/product/1.jpg') }}" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4>{{ $achievement->name }}</h4>
                                        <div>Completed</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    <div class="row">
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Overview</h4>
        </div>
        <div class="row">
            @foreach($question_numbers as $key => $question)
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Question {{ $key + 1 }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-6">
                                <div class="card-text"><b>Q: {{ $question->name }}</b></div>
                                <br>
                                <div class="card-text mt-6">Your Answer:</div>
                                <div class="basic-form mt-2">
                                    <div class="col-xl-6 col-sm-6">
                                        @foreach ($question->answers as $answer)
                                        <div class="radio">
                                            <input type="radio" name="optradio_{{ $question->id }}" 
                                                {{ ($user_answers[$question->id]->pluck('answer_id')->contains($answer->id)) ? 'checked' : '' }}
                                            > 
                                            {{ $answer->name }}
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class = "card-text">
                                <b>Answer:</b>
                                @foreach ($question->answers as $answer)
                                    @if ($answer->is_true == 1)
                                        {{ $answer->name }}
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{!! asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') !!}"></script>
@endsection
