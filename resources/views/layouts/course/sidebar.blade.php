<div class="dropdown header-profile2 ">
    <a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
        <div class="header-info2 d-flex align-items-center">
            <img src="{{ asset('images/profile/pic1.jpg') }}" alt=""/>
            <div class="d-flex align-items-center sidebar-info">
                <div>
                    <span class="font-w400 d-block">{{ $short_name }}</span>
                    <small class="text-end font-w400">{{ ucfirst($role) }}</small>
                </div>	
            </div>
            
        </div>
    </a>
</div>
<ul class="metismenu" id="menu">
    <li>
        <a href="#" class="" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-025-dashboard"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
        <i class="flaticon-093-waving"></i>
            <span class="nav-text">Course</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('enroll.show', $course->id) }}">Course Overview</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
        <i class="flaticon-022-copy"></i>
            <span class="nav-text">Assesstment</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('quiz.index') }}">Quiz List</a></li>
            <li><a href="#">Assignment</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
        <i class="flaticon-050-info"></i>
        <span class="nav-text">Overview</span>
    </a>
    <ul aria-expanded="false">

        <li><a href="{{ route('achievement.index') }}">Achievement</a></li>
    </ul>
    </li>
</ul>
