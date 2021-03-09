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
            <!-- <li class=" navigation-header"><span>Menu</span> -->
            <!-- </li> -->
            <li class="{{ (request()->is('institue/dashboard*')) ? 'active' : '' }}"><a href="{{ route('institue.dashboard') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Dashboard</span></a>
            </li>
            <li class="{{ (request()->is('institue/users*')) ? 'active' : '' }}"><a href="{{ route('institue.users') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Users</span></a>
            </li>
            <li class="{{ (request()->is('institue/profile*') ? 'active' : '') }}"><a href="{{ route('institue.profile') }}"><i class="feather icon-circle"></i> Profile</a></li>
            <li class="{{ (request()->is('institue/support*')) ? 'active' : '' }}"><a href="{{ route('institue.support.index') }}"><i class="feather icon-circle"></i><span class="menu-title">Support</span></a>
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