<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}" target="_blank">
            <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Email Service</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(1) == 'backend' && is_null(request()->segment(2)) ? 'active bg-gradient-primary' : '' }}" href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(2) == 'pages' ? 'active bg-gradient-primary' : '' }}" href="{{ route('pages.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Send Emails</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Setting pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(2) == 'templates' ? 'active bg-gradient-primary' : '' }}" href="{{ route('templates.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Template</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(2) == 'hosts' ? 'active bg-gradient-primary' : '' }}" href="{{ route('hosts.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-server" aria-hidden="true"></i>
                    </div>
                    <span class="nav-link-text ms-1">Host</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(2) == 'admins' ? 'active bg-gradient-primary' : '' }}" href="{{ route('admins.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(2) == 'users' ? 'active bg-gradient-primary' : '' }}" href="{{ route('users.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->segment(2) == 'logs' ? 'active bg-gradient-primary' : '' }}" href="{{ route('logs.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logs</span>
                </a>
            </li>
        </ul>
    </div>
</aside>