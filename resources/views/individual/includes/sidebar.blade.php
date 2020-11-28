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
            <li class="{{ (request()->is('user/program*')) ? 'active' : '' }}"><a href="{{ route('individual.program') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">My Programs</span></a>
            </li>
            <li><a href="#"><i class="feather icon-circle"></i><span class="menu-title">Recheck</span></a>
            </li>
            <li class="{{ (request()->is('user/profile*')) ? 'active' : '' }}"><a href="{{ route('individual.profile') }}"><i class="feather icon-circle"></i><span class="menu-title">My Profile</span></a>
            </li>
            {{-- <li class="{{ (request()->is('user/support*')) ? 'active' : '' }}"><a href="{{ route('support.index') }}"><i class="feather icon-circle"></i><span class="menu-title">Technical Support</span></a>
            </li> --}}
            <li class="{{ (request()->is('user/support*') ? 'active' : '') }} nav-item"><a href="#"><i class="feather icon-circle"></i><span class="menu-title" data-i18n="User">Support</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('user/support*') ? 'active' : '') }}"><a href="{{ route('support.index') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="List">Technical</span></a>
                    </li>
                    <li class="{{ (request()->is('user/support*') ? 'active' : '') }}"><a href="{{ route('support.index') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="List">Medical</span></a>
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