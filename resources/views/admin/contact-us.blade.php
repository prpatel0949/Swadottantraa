@extends('admin.layouts.app')

@section('title', 'Leads')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Leads</h2>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Type</th>
                                        <th>Message</th>
                                        <th>Status</th>
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
        fillTbl();
        function fillTbl() {
            let tbl = $('#scaleTbl').dataTable({
                "destroy": true,
                "ajax": "{{ route('leads.list') }}",
                "aaSorting": [],
                "columns": [
                    { "data": "name" },
                    { "data": "email" },
                    { "data": "mobile" },
                    { "data": "type" },
                    { "data": "message" },
                    { "data": "status" },
                    { "data": "id" },
                ],
                "columnDefs": [
                    { "targets": 3, "render" : function (data,type,row) {
                        if (data == 0) {
                            return 'Individual';
                        } else if (data == 1) {
                            return 'Institute';
                        } else {
                            return 'Doctor';
                        }
                    }},
                    { "targets": 5, "render" : function (data,type,row) {
                        if (data == 0) {
                            return '<span class="badge badge-danger">Pending</span>';
                        } else if (data == 1) {
                            return '<span class="badge badge-warning">In-process</span>';
                        } else {
                            return '<span class="badge badge-success">Completed</span>';
                        }
                    }},
                    { "targets": 6, "render" : function (data,type,row) {
                        let html = '';
                        if (row['status'] == 0) {
                            html += '<a href="#" class="change-status" data-id="'+ data +'" data-status="1"><i class="fa fa-spinner" ></i></a>';
                        } else if (row['status'] == 1) {
                            html += '<a href="#" class="change-status" data-id="'+ data +'" data-status="2"><i class="fa fa-check" ></i></a>';
                        }

                        return html;
                    }}
                ]
            });
        }

        $(document).on('click', '.change-status', function(e) {
            e.preventDefault();
            let status = $(this).attr('data-status');
            let id = $(this).attr('data-id');
            let message;
            if (status == 1) {
                message = 'You want to change status to In Progress?';
            } else {
                message = 'You want to change status to Complete?';
            }
            Swal.fire({
                title: 'Are you sure?',
                text: message,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {
                    let url = "{{ route('lead.change_Status', ':id') }}";
                        url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: { '_token': '{{ csrf_token() }}', 'status': status },
                        success: function (res) {
                            fillTbl();
                        }
                    });
                }
            })
        });

    </script>
@endsection