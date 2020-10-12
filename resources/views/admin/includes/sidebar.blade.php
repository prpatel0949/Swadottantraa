<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
            	<a class="navbar-brand" href="">
                    <h2 class="cs_logo mb-0">SWA<span class="text-primary"><small class="logo-dot"><i class="fa fa-circle"></i></small></span>TANTRAA</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Dashboard</span></a>
            </li>
            <li class="{{ (request()->is('admin/scale*') ? 'active' : '') }} nav-item"><a href="#"><i class="feather icon-circle"></i><span class="menu-title" data-i18n="User">Programs</span></a>
                <ul class="menu-content">
                    <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Programs</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/scale*') ? 'active' : '') }}"><a href="{{ route('scale.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">Scales</span></a>
                    </li>
                    <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Edit">Workouts</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="feather icon-circle"></i><span class="menu-title">LogOut</span></a>                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</div>