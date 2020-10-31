@extends('admin.layouts.app')

@section('title', 'Franchisees')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Franchisees</h2>
                        <a href="{{ route('franchisee.create') }}" class="btn btn-primary">Add</a>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            @include('franchisee.includes.message')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="scaleTbl" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SrNo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
        $('#scaleTbl').DataTable();
        // $('.delete-scale').on('click', function (e) {
        //     e.preventDefault();
        //     let url = $(this).attr('href');
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!',
        //         confirmButtonClass: 'btn btn-primary',
        //         cancelButtonClass: 'btn btn-danger ml-1',
        //         buttonsStyling: false,
        //     }).then(function (result) {
        //         $.ajax({
        //             url: url,
        //             method: 'DELETE',
        //             data : { '_token': '{{ csrf_token() }}' },
        //             success: function (res) {
        //                 window.location.reload();
        //             }, error: function (error) {
        //                 Swal.fire({
        //                     title: 'Error',
        //                     text: 'Your Can`t delete this scale.',
        //                     type: 'error',
        //                     confirmButtonClass: 'btn btn-success',
        //                 });
        //             }
        //         });
        //     })
        // });
    </script>
@endsection