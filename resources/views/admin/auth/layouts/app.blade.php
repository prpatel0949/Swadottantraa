{{-- <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    @include('admin.auth.includes.head')
</head>

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            @yield('content')

        </div>
    </div>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">
    <head>
	    @include('admin.auth.includes.head')
    </head>
    <body>

        <div class="header-space @yield('with-class') d-flex align-items-center justify-content-center bg-gray" >
            @yield('content')
        </div>

        @include('admin.auth.includes.footer')

    </body>
</html>    
