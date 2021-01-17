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
            <li class="{{ (request()->is('admin/program*') || request()->is('admin/scale*') || request()->is('admin/workout*') || request()->is('admin/user/answer*') ? 'active' : '') }} nav-item"><a href="#"><i class="feather icon-circle"></i><span class="menu-title" data-i18n="User">Program Management</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/program*') ? 'active' : '') }}"><a href="{{ route('program.index') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="List">Programs</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/scale*') ? 'active' : '') }}"><a href="{{ route('scale.index') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="View">Scales</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/workout*') ? 'active' : '') }}"><a href="{{ route('workout.index') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="Edit">Workouts</span></a>
                    </li>
                    <li class="{{ (request()->is('admin/user/answer*') ? 'active' : '') }}"><a href="{{ route('admin.user.answer') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="Edit">Evaluation</span></a>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->is('admin/franchisee*')) ? 'active' : '' }}"><a href="{{ route('franchisee.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Franchisee</span></a>
            </li>
            <li class="{{ (request()->is('admin/institue*')) ? 'active' : '' }}"><a href="{{ route('institue.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Institue</span></a>
            </li>
            <li class="{{ (request()->is('admin/coupon*')) ? 'active' : '' }}"><a href="{{ route('coupon.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Coupon Management</span></a>
            </li>
            <li class="{{ (request()->is('admin/support*')) ? 'active' : '' }}"><a href="{{ route('admin.support.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Technical Support</span></a>
            </li>
            <li class="{{ (request()->is('admin/report*') ? 'active' : '') }} nav-item"><a href="#"><i class="feather icon-circle"></i><span class="menu-title" data-i18n="User">Business Overview</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/report/program*') ? 'active' : '') }}"><a href="{{ route('report.program') }}"><i class="feather icon-minus"></i><span class="menu-item" data-i18n="List">Program Sales</span></a>
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
