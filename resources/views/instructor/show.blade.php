@extends('layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 flex-wrap align-items-start">
                        <div class="col-md-8">
                            <div class="user d-sm-flex d-block pe-md-5 pe-0">
                                @if($file_instructor)
                                    <img src="{{ asset($file_instructor->file_path) }}" alt="">
                                @else
                                    <img src="{{ asset('images/user.jpg') }}" alt="">
                                @endif
                                <div class="ms-sm-3 ms-0 me-md-5 md-0">
                                    <h5 class="mb-1 font-w600">{{ $user->name }}</h5>
                                    <div class="listline-wrapper mb-2">
                                        <span class="item"><i class="far fa-envelope"></i>{{ $user->email }}</span>
                                        <span class="item"><i class="far fa-id-badge"></i>{{ ucfirst($role_instructor) }}</span>
                                        <span class="item"><i class="fas fa-map-marker-alt"></i>Malaysia</span>
                                    </div>
                                    <p>A data analyst collects, interprets and visualizes data to uncover insights. A data analyst assigns a numerical value to business functions so performance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <h4 class="fs-20">Description</h4>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Full Name : </span><span class="font-w400">{{ $user->name }}</span></p>
                                <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Email : </span><span class="font-w400">{{ $user->email }}</span></p>
                                <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Role : </span><span class="font-w400">{{ ucfirst($role_instructor) }}</span></p>
                                <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Register Date : </span><span class="font-w400"> {{ $user->created_at }}</span></p>
                                <p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Last Update : </span><span class="font-w400">{{ $user->updated_at }}</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex flex-wrap justify-content-between">
                        <div class="mb-md-2 mb-3">
                        </div>
                        <div>
                            <a href="{{ route('instructor.edit', $user->id) }}" class="btn btn-warning btn-md me-2 mb-2">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection