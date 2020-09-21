<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	@extends('franchisee.includes.head')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('franchisee.includes.topnavbar')
    
    @include('franchisee.includes.sidebar')

    @yield('content')

    @include('franchisee.includes.footer')

</body>
</html>