<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="{{ asset('assets/dashboard/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/core/app.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/scripts/components.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/js/charts/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

<script>
    $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({'display':'block'});
    })
</script>

@yield('js')