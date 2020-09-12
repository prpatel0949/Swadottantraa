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
            <li class="nav-item"><a href=""><span class="menu-title">Individual</span></a>
                <ul class="menu-content">
                    <li class="active"><a href="../individual/index.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">My Programs</span></a>
                    </li>
                     <li><a href="../individual/profile.php"><i class="feather icon-circle"></i><span class="menu-title">My Profile</span></a>
                    </li>
                    <li><a href="../individual/support.php"><i class="feather icon-circle"></i><span class="menu-title">Support</span></a>
                    </li>
                    <li><a href="../index.html"><i class="feather icon-circle"></i><span class="menu-title">Recheck</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><span class="menu-title">Institutional</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a href="../institutional/index.php"><i class="feather icon-circle"></i><span class="menu-title">Dashboard</span></a>
                    </li>
                    <li class=" nav-item"><a href="../institutional/code-list.php"><i class="feather icon-circle"></i><span class="menu-title">Code List</span></a>
                    <li class=" nav-item"><a href="../institutional/offerings.php"><i class="feather icon-circle"></i><span class="menu-title">New Offerings</span></a>
                    </li>
                    <li class=" nav-item"><a href="../institutional/profile.php"><i class="feather icon-circle"></i><span class="menu-title">My Profile</span></a>
                    </li>
                    <li class=" nav-item"><a href="../institutional/support.php"><i class="feather icon-circle"></i><span class="menu-title">Support</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><span class="menu-title">Franchisee</span></a>
                <ul class="menu-content">
                    <li class=" nav-item"><a href="../franchisee/index.php"><i class="feather icon-circle"></i><span class="menu-title">Dashboard</span></a>
                    </li>
                    <li class=" nav-item"><a href="../franchisee/client-list.php"><i class="feather icon-circle"></i><span class="menu-title">Client List</span></a>
                    <li class=" nav-item"><a href="../franchisee/profile.php"><i class="feather icon-circle"></i><span class="menu-title">My Profile</span></a>
                    </li>
                    <li class=" nav-item"><a href="../franchisee/support.php"><i class="feather icon-circle"></i><span class="menu-title">Support</span></a>
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