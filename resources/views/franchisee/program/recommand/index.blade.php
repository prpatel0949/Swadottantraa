@extends('franchisee.layouts.app')

@section('title', 'Recommanded Program')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Recommanded Program</h2>
                        <div>
                            <a href="{{ route('franchisee.recommand.program.create') }}" class="btn btn-primary">Add</a>
                        </div>
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
                                        <th>User Name</th>
                                        <th>Programs</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ recommanded_user($item->set_no) }}</td>
                                            <td>{{ recommanded_program($item->set_no) }}</td>
                                            <td>
                                                <a href="{{ route('franchisee.recommand.program.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                                {{-- <a href="#" class="delete-faq"><i class="fa fa-trash"></i></a> --}}
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

@endsection

@section('js')
    <script>
        $('#scaleTbl').DataTable();
    </script>
@endsection