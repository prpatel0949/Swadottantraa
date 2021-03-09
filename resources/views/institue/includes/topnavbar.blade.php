<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-light navbar-shadow fixed-top">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                         <li class="dropdown dropdown-user nav-item align-items-center d-flex">
                            <a class="nav-link dropdown-user-link">
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600">Welcome, {{ Auth::user()->name }}</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>