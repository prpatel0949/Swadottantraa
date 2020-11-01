@extends('admin.layouts.app')

@section('title', 'Purchase prrogram Reports')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <h2 class="content-header-title float-left mb-0">Purchase Programs</h2>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped" id="Tbl" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Customer</th>
                                        <th>Franchisee</th>
                                        <th>Date</th>
                                        <th>Transaction Id</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
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
        $('#Tbl').DataTable({
            serverSide: true,
            ajax: {
                url: '{{ route("report.program.list") }}',
                type: 'POST',
                data: { '_token': '{{ csrf_token() }}' },
            },
            "aaSorting": [],
            "columns": [
                { "data": "name" },
                { "data": "client" },
                { "data": "franchisee" },
                { "data": "date" },
                { "data": "transaction" },
                { "data": "amount" },
            ],
        });
    </script>
@endsection