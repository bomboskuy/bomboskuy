
<nav class="pcoded-navbar">
    <div class="sidebar_toggle">
        <a href="#"><i class="icon-close icons"></i></a>
    </div>
    <div class="pcoded-inner-navbar main-menu">
        <!-- User Profile Section -->
        <div class="">
            <div class="main-menu-header">

                <div class="user-details">
                    <span id="more-details"></span>
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
            <!-- Menu Management -->
            <li>
                <a href="{{ route('menu.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-bars"></i></span> <!-- Ikon menu -->
                    <span class="pcoded-mtext">Menu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <!-- Produk Menu -->
            <li>
                <a href="{{ route('dashboard.produk.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-cogs"></i></span>
                    <span class="pcoded-mtext">Manajemen Produk</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>          
            <li>
                <a href="{{ route('dashboard.setting_menus.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="fa fa-wrench"></i></span>
                    <span class="pcoded-mtext">Manajemen Setting Menu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class='fa fa-money'></i></span>
                    <span class="pcoded-mtext">Landing Page</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>    
    </div>
</nav>