<nav class="pcoded-navbar">
    <div class="sidebar_toggle">
        <a href="#"><i class="icon-close icons"></i></a>
    </div>
    <div class="pcoded-inner-navbar main-menu">
        <!-- User Profile Section -->
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="{{ asset('assets/images/avatar-4.jpg') }}" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">John Doe<i class="fa fa-caret-down"></i></span>
                </div>
            </div>
        
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Layout Category -->
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <!-- Dashboard Menu -->
            <li class="active">
                <a href="{{ route('dashboard.main') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <!-- User Management Menu -->
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Users</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('dashboard.users.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-users"></i></span> <!-- Ikon pengguna -->
                            <span class="pcoded-mtext">Manajemen Users</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.roles.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-lock"></i></span>
                            <span class="pcoded-mtext">Manajemen Roles</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Menu Management -->
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-menu-alt"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Manajemen Menu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('menu.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-bars"></i></span> <!-- Ikon menu -->
                            <span class="pcoded-mtext">Menu</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <!-- Tambahkan item menu lainnya jika ada -->
                </ul>
            </li>

            <!-- Produk Menu -->
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-package"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Produk</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="{{ route('dashboard.produk.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
                            <span class="pcoded-mtext">Manajemen Produk</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Setting Menu -->
             <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <!-- Ganti ikon dengan ikon representatif -->
                     <span class="pcoded-micon"><i class="fa fa-cog"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Setting Menu</span>
                     <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li>
                            <a href="{{ route('dashboard.setting_menus.index') }}" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa fa-wrench"></i></span>
                            <span class="pcoded-mtext">Manajemen Setting Menu</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
