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
            <li class="{{ (request()->is('franchisee/dashboard*')) ? 'active' : '' }}"><a href="{{ route('franchisee.dashboard') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Dashboard</span></a>
            </li>
            <li class="{{ (request()->is('franchisee/clients*')) ? 'active' : '' }}"><a href="{{ route('franchisee.clients') }}"><i class="feather icon-circle"></i><span class="menu-title">Client List</span></a>
            </li>
            <li class="{{ (request()->is('franchisee/profile*')) ? 'active' : '' }}"><a href="{{ route('franchisee.profile') }}"><i class="feather icon-circle"></i><span class="menu-title">My Profile</span></a>
            </li>
            <li class="{{ (request()->is('franchisee/support*')) ? 'active' : '' }}"><a href="{{ route('franchisee.support.index') }}"><i class="feather icon-circle"></i><span class="menu-title">Technical Support</span></a>
            </li>
            <li class="{{ (request()->is('franchisee/recommand/program*')) ? 'active' : '' }}"><a href="{{ route('franchisee.recommand.program') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Recommand Program</span></a>
            </li>
            <li>
                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="feather icon-circle"></i><span class="menu-title">LogOut</span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        <img class="img-fluid" src="{{ asset('assets/img/sidebar.png') }}" />
    </div>
</div>
