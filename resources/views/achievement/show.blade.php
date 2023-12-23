@extends('layouts.template')

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
                        <p class="mb-1">Total Achievement Achieved</p>
                        <h3 class="text-white">28</h3>
                        <div class="progress mb-2 bg-primary">
                            <div class="progress-bar progress-animated bg-light" style="width: 76%"></div>
                        </div>
                        <small>76% Progression</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-flex align-items-center mb-4">
            <h4 class="fs-20 font-w600 mb-0 me-auto">Achievements</h4>
        </div>
        @foreach($achievement as $achievement)
        <div class="col-xl-4 col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="new-arrival-product">
                        <div class="new-arrivals-img-contnent">
                            <img class="img-fluid" src="{{ asset('images/product/1.jpg') }}" alt="">
                        </div>
                        <div class="new-arrival-content text-center mt-3">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <h6>76%</h6>
                                    <span>{{ $achievement->completed }}</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" style="width: 80%"></div>
                                </div>
                            </div>
                            {{-- <small>76% Progression</small> --}}
                            <div class="mt-4">
                                <h4>{{ $achievement->name }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script src="{!! asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js') !!}"></script>
{{-- <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script> --}}
@endsection