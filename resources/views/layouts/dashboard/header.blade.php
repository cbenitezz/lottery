   <!-- header header  -->
   <div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">

            <a class="navbar-brand" href="{{ url('/home')}}">
                <!-- Logo icon -->
                <b><img src="{{ asset('asset/images/logo_dashboard.png')}}" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="{{ asset('asset/images/logo-text.png')}}" alt="homepage" class="dark-logo" /></span>

            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

            </ul>
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">

                <!-- Comment -->
                <li class="nav-item dropdown">
                    <span class="nav-link dropdown-toggle text-muted text-muted  ">{{ Auth::user()->name }}</span>

                </li>
                <!-- End Comment -->

                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('asset/images/users/user.png')}}" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li>
                            <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="ti-user"></i> Profile</a></li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>

                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- End header header -->
