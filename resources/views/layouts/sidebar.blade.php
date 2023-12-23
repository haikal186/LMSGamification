<div class="dropdown header-profile2 ">
    <a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
        <div class="header-info2 d-flex align-items-center">
            <img src="images/profile/pic1.jpg" alt=""/>
            <div class="d-flex align-items-center sidebar-info">
                <div>
                    <span class="font-w400 d-block">Franklin Jr</span>
                    <small class="text-end font-w400">Superadmin</small>
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
        <a href="./email-inbox.html" class="dropdown-item ai-icon">
            <svg  xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            <span class="ms-2">Inbox </span>
        </a>
        <a href="./login.html" class="dropdown-item ai-icon">
            <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            <span class="ms-2">Logout </span>
        </a>
    </div>
</div>
<ul class="metismenu" id="menu">
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-025-dashboar[]d"></i>
            <span class="nav-text">Profile</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('profile.index') }}">List Instructors</a></li>
            <li><a href="jobs-page.html">List Students</a></li>
            <li><a href="{{ route('profile.detail', ['id' => auth()->user()->id]) }}">Your Profile</a></li>
        </ul>

    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
            <i class="flaticon-093-waving"></i>
            <span class="nav-text">Course</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('course.index') }}">Course Lists</a></li>
            {{-- @if(auth()->user()->hasRole->name == 'lecturer') --}}
            <li><a href="{{ route('course.create') }}">Create Course</a></li>
            {{-- @endif --}}
            <li><a href="{{ route('enroll.index') }}">Your Course</a></li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Add Content</a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('course.lesson') }}">Add Lesson</a></li>
                </ul>
            </li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
        <i class="flaticon-050-info"></i>
            <span class="nav-text">Assesstment</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="{{ route('quiz.index') }}">Quiz List</a></li>
        </ul>
    </li>
    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
        <i class="flaticon-022-copy"></i>
        <span class="nav-text">Overview</span>
    </a>
    <ul aria-expanded="false">
        <li><a href="./form-element.html">Course Overview</a></li>
        <li><a href="{{ route('achievement.index') }}">Achievement</a></li>
        <li><a href="./form-ckeditor.html">CkEditor</a></li>
        <li><a href="form-pickers.html">Pickers</a></li>
        <li><a href="form-validation.html">Form Validate</a></li>
    </ul>
</li>
</ul>
<div class="plus-box">
    <p class="fs-14 font-w600 mb-2">Let Jobick Managed<br>Your Resume Easily<br></p>
    <p>Lorem ipsum dolor sit amet</p>
</div>
<div class="copyright">
    <p><strong>Jobick Job Admin</strong> © 2021 All Rights Reserved</p>
    <p class="fs-12">Made with <span class="heart"></span> by DexignLabs</p>
</div>