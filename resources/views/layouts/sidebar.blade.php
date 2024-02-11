<div class="dropdown header-profile2 ">
    <a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
        <div class="header-info2 d-flex align-items-center">
            <img src="{{ asset('images/profile/pic1.jpg') }}" alt="">
            <div class="d-flex align-items-center sidebar-info">
                <div>
                    <span class="font-w400 d-block">{{ $short_name }}</span>
                    <small class="text-end font-w400">{{ $role }}</small>
                </div>
                <i class="fas fa-chevron-down"></i>
            </div>
            
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a href="./app-profile.html" class="dropdown-item ai-icon ">
            <svg  xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span class="ms-2">Profile </span>
        </a>
        <a href="./login.html" class="dropdown-item ai-icon">
            <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            <span class="ms-2">Logout </span>
        </a>
    </div>
</div>
<ul class="metismenu" id="menu">
    <li>
        <a href="{{ route('home') }}" class="" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-050-info"></i>
            <span class="nav-text">Profile</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('instructor.index') }}">List Instructors</a></li>
            <li><a href="{{ route('student.index') }}">List Students</a></li>
            <li><a href="{{ route('profile.show', ['user_id' => auth()->user()->id]) }}">Your Profile</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-093-waving"></i>
            <span class="nav-text">Course</span>
        </a>
        <ul aria-expanded="false">
            {{-- @if($role == 'lecturer') --}}
            <li><a href="{{ route('course.index') }}">Course Lists</a></li>
            <li><a href="{{ route('course.create') }}">Create Course</a></li>
            {{-- @endif --}}
            <li><a href="{{ route('enroll.index') }}">Your Course</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-072-printer"></i>
            <span class="nav-text">Assesstment</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('quiz.index') }}">Quiz List</a></li>
            <li><a href="#">Assignment</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
        <i class="flaticon-022-copy"></i>
        <span class="nav-text">Overview</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="{{ route('achievement.index') }}">Achievement</a></li>
    </ul>
    </li>
</ul>