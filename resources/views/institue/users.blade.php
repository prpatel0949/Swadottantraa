@extends('institue.layouts.app')

@section('title', 'Users')
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
    	<div class="content-header row">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Institue Users</h2>
		            </div>
		        </div>
		    </div>
		</div>
        <div class="content-body">
            @include('individual.includes.message')
            <section>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table" id="usertbl">
                                        <thead>
                                            <tr>
                                                <th>SrNo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clients as $key => $client)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $client->name }}</td>
                                                    <td>{{ $client->email }}</td>
                                                    <td>
                                                        @if ($client->is_approve == 0)
                                                            <span class="badge badge-pending">Pending</span>
                                                        @elseif($client->is_approve == 1)
                                                            <span class="badge badge-success">Approved</span>
                                                        @elseif($client->is_approve == 2)
                                                            <span class="badge badge-danger">Rejected</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{-- <a href="#"><i class="fa fa-eye"></i></a> --}}
                                                        @if ($client->is_approve == 0)
                                                            <a href="{{ route('user.approve', $client->id) }}" class="approve-user"><i class="fa fa-check"></i></a>
                                                            <a href="{{ route('user.reject', $client->id) }}" class="reject-user"><i class="fa fa-ban"></i></a>
                                                        @elseif ($client->is_approve == 1)
                                                            <a href="{{ route('user.reject', $client->id) }}" class="reject-user"><i class="fa fa-ban"></i></a>
                                                        @elseif ($client->is_approve == 2)
                                                            <a href="{{ route('user.approve', $client->id) }}" class="approve-user"><i class="fa fa-check"></i></a>
                                                        @endif
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
            </section>
        </div>
    </div>
</div>


@endsection

@section('js')

<script>
    $('#usertbl').dataTable();
    $(document).on('click', '.approve-user', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to approve this user?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data : { '_token': '{{ csrf_token() }}' },
                    success: function (res) {
                        window.location.reload();
                    }
                });
            })
    });

    $(document).on('click', '.reject-user', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to reject this user?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data : { '_token': '{{ csrf_token() }}' },
                    success: function (res) {
                        window.location.reload();
                    }
                });
            })
    });
</script>

@endsection