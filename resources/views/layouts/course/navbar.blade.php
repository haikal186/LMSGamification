<nav class="navbar navbar-expand">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="header-left">
            <div class="dashboard_bar">
                Course
            </div>
        </div>
        <ul class="navbar-nav header-right">
            <li class="nav-item dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                    {{-- @if($file)
                        <img src="{{ asset($file->file_path) }}" width="20" alt=""/>
                    @else
                        <img src="{{ asset('images/profile/pic1.jpg') }}" width="20" alt=""/>
                    @endif --}}
                    <img src="{{ asset('images/profile/pic1.jpg') }}" width="20" alt=""/>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ route('profile.show', ['user_id' => auth()->user()->id]) }}" class="dropdown-item ai-icon">
                        <svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                        <span class="ms-2">Logout </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>