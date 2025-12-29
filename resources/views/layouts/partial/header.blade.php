<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="javascript:"><span></span></a>
        <a href="index-2.html" class="b-brand">
            <div class="b-bg">
                <i class="feather icon-trending-up"></i>
            </div>
            <span class="b-title">Citrus Talent </span>
        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="javascript:">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="javascript:" class="full-screen" onclick="javascript:toggleFullScreen()"><i
                        class="feather icon-maximize"></i></a></li>

            <li class="nav-item">
                <div class="main-search">
                    <div class="input-group">
                        <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                        <a href="javascript:" class="input-group-append search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </a>
                        <span class="input-group-append search-btn btn btn-primary">
                            <i class="feather icon-search input-group-text"></i>
                        </span>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="javascript:" data-toggle="dropdown" id="notificationDropdown">
                        <i class="icon feather icon-bell"></i>
                        <!-- 🔴 Badge (added missing element) -->
                        <span id="notification-count" class="badge badge-danger"
                            style="position:absolute; top:8px; right:8px; font-size:10px; border-radius:50%; display:none;">
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="javascript:" class="m-r-10">mark as read</a>
                                <a href="javascript:">clear all</a>
                            </div>
                        </div>

                        <!-- Dynamic List -->
                        <ul class="noti-body" id="latest-models-list">
                            <li class="text-center text-muted py-2">Loading...</li>
                        </ul>

                        <div class="noti-footer">
                            <a href="">show all</a>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="dropdown drp-user">
                    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('Admin/assets/images/user/avatar-1.jpg')}}" class="img-radius"
                                alt="User-Profile-Image">
                            <span>{{ Auth::user()->name ?? 'Guest' }}</span>

                            <!-- Logout Icon (Quick Access) -->
                            <!-- <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 text-danger" title="Logout"
                                    style="border:none;">
                                    <i class="feather icon-log-out"></i>
                                </button>
                            </form> -->
                        </div>

                        <ul class="pro-body">
                            <!-- <li><a href="javascript:" class="dropdown-item"><i class="feather icon-settings"></i>
                                    Settings</a></li> -->
                            <li><a href="{{ route('profile.edit') }}" class="dropdown-item"><i
                                        class="feather icon-user"></i> Profile</a></li>



                          
                            <li>
                                <a href="{{ route('users.create') }}" class="dropdown-item">
                                    <i class="feather icon-user-plus"></i> Create User
                                </a>
                            </li>
                        
                            <!-- Logout Link Inside Menu -->

                            <!-- 
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock
                                    Screen</a></li> -->
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <a href="#" class="dropdown-item"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="feather icon-log-out"></i> Logout
                                    </a>
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</header>




<!-- [ Header ] end -->