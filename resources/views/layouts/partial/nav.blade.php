<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{ route('home') }}" class="b-brand">
                <div class="b-bg">
                    <img src="{{ asset('Admin/assets/images/logo/logo.jpeg') }}" alt=""
                        style="height: 40px; width: 40px;">
                </div>
                <span class="b-title">Ink Well </span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>

        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                {{-- Common for All Users --}}
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>

                {{-- If role is admin --}}

                <li class="nav-item pcoded-menu-caption">
                    <label>Role</label>
                </li>
                <li class="nav-item {{ request()->is('roles') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-lock"></i></span>
                        <span class="pcoded-mtext">Role</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>User</label>
                </li>
                <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                        <span class="pcoded-mtext">User</span>
                    </a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Pages</label>
                </li>
                <li class="nav-item {{ request()->is('categories') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                        <span class="pcoded-mtext">Categories</span>
                    </a>
                </li>

                <!-- Products -->
                <li class="nav-item {{ request()->is('products') ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                        <span class="pcoded-mtext">Products</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('dashboard/contact') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.contact.index') }}" class="nav-link">
                        <span class="pcoded-micon"><i class="feather icon-mail"></i></span>
                        <span class="pcoded-mtext">Contact</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->