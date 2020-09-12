<!DOCTYPE html>
<html lang="en">
    <head>
	    @include('includes.head')
    </head>
    <body>
        @include('includes.topnavbar')

        <div class="header-space @yield('with-class') d-flex align-items-center justify-content-center bg-gray" >
            @yield('content')
        </div>

        @include('includes.footer')

    </body>
</html>    
