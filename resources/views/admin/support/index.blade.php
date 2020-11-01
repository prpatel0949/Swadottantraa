@extends('admin.layouts.app')

@section('title', 'Supports')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Supports</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            @include('franchisee.includes.message')
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">In Process</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Completed</a>
                        </li>
                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped" id="Tbl" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SrNo</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($supports->where('status', 0) as $key => $support)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $support->user->name }}</td>
                                                    <td>{{ ($support->user->type == 0 ? 'Customer' : 'Franchisee') }}</td>
                                                    <td>{{ $support->description }}</td>
                                                    <td>
                                                        <a href="{{ route('support.edit', $support->id) }}"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped" id="Tbl1" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SrNo</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($supports->where('status', 1) as $key => $support)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $support->user->name }}</td>
                                                    <td>{{ ($support->user->type == 0 ? 'Customer' : 'Franchisee') }}</td>
                                                    <td>{{ $support->description }}</td>
                                                    <td>
                                                        <a href="{{ route('support.edit', $support->id) }}"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    $('#Tbl').DataTable();
    $('#Tbl1').DataTable();
</script>
@endsection