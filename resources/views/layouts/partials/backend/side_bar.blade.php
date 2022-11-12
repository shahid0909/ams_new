<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('/home')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#setup" aria-expanded="false" aria-controls="setup">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Setup</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="setup">
                    <ul class="nav flex-column sub-menu">
                        @if(Auth::user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('country.index')}}">Country Entry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('mission.index')}}">Mission Entry</a>

                            </li>
                        @endif
                        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('schedule.index')}}">Schedule Setup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('desk.index')}}">Desk Assign</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </li>
        @endif
        <li class="nav-item">

            <a class="nav-link" href="{{ route('appoinment.index') }}"><i class="icon-grid menu-icon"></i>Appoinment</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{ route('appoinment.reports') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Report </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Tracking </span>
            </a>
        </li>
        @if(Auth::user()->role == 1 )
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#track" aria-expanded="false" aria-controls="track">
                    <i class="ti-layers-alt menu-icon"></i>
                    <span class="menu-title">Tracking Setup</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="track">
                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tracking-type.index')}}">Tracking Type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('tracking-status.index')}}">Tracking Status</a>
                        </li>


                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('request-new-user.index')}}">
                    <i class="ti-user menu-icon"></i>
                    <span class="menu-title">Register New Request </span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                    @if(Auth::user()->role != 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.index')}}">User Create</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.profile-index')}}">User Profile</a>
                        </li>
                    @endif

                    {{--                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>--}}
                </ul>
            </div>
        </li>


    </ul>
</nav>
