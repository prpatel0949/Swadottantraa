<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	@extends('individual.includes.head')
</head>

<body style="display: none;" class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <div class="loader"></div>
    <div class="outer-box">

    </div>

    @include('individual.includes.topnavbar')
    
    @include('individual.includes.sidebar')

    @yield('content')

    @include('individual.includes.footer')

</body>
</html>