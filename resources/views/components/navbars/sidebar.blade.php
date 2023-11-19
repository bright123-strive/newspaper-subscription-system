<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-info"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
                <img src="{{ asset('assets') }}/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-2 font-weight-bold text-white">National Publication Limited</span>
            </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-profile' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1.2rem;" class="fas fa-user-circle ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'user-management' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('user-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'manage-publications' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('manage-publications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">publication Management</span>
                </a>
            </li>
            @else

            @endif
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'subscribe' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ url('/subscription') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1"> Management</span>
                </a>
            </li> --}}
            @if(auth()->user()->role_id == 3)
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'mysubscriptions' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('mysubscriptions') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">My Subscriptions</span>
                </a>
            </li>
            @else

            @endif
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'all-subscriptions' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('all-subscriptions') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Subscriptions</span>
                </a>
            </li>
            @else
            @endif
            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'role-management' ? ' active bg-gradient-primary' : '' }} "
                    href="{{ route('role-management') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                    </div>
                    <span class="nav-link-text ms-1">Role Management</span>
                </a>
            </li>
            @else
            @endif

            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#reports"
                    class="nav-link text-white {{ strpos(Request::route()->uri(), 'reports')=== false ? '' : 'active' }} "
                    aria-controls="practice" role="button" aria-expanded="false">
                    <i class="material-icons-round opacity-10">paid</i>
                    <span class="nav-link-text ms-2 ps-1">Reports</span>
                </a>
                <div class="collapse {{ strpos(Request::route()->uri(), 'reports')=== false ? '' : 'show' }} "
                    id="reports">
                    <ul class="nav ">

                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'active-subscribers' ? ' active bg-gradient-primary' : '' }} "
                                href="{{ route('active-subscribers') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">Active Subscribers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'expired-subscribers' ? ' active bg-gradient-primary' : '' }} "
                                href="{{ route('expired-subscribers') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">Expired Subscribers</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white {{ Route::currentRouteName() == 'report-region' ? ' active bg-gradient-primary' : '' }} "
                                href="{{ route('report-region') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center"></i>
                                </div>
                                <span class="nav-link-text ms-1">Subscribers By Region</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            @else
            @endif

        </ul>
    </div>


</aside>
