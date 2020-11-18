@extends('admin.layouts.app')

@section('title', 'Programs')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Programs</h2>
                        <div>
                            <a href="{{ route('program.create') }}?type={{ Hash::make('0') }}" class="btn btn-primary">Add Single Session</a>
                            <a href="{{ route('program.create') }}?type={{ Hash::make('1') }}" class="btn btn-primary">Add Guided</a>
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
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Cost</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programs as $index => $program)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $program->title }}</td>
                                            <td>{{ $program->description }}</td>
                                            <td class="text-right">{{ number_format($program->cost, 2, '.', '') }}</td>
                                            <td>
                                                {{ ($program->type == 0 ? 'Single Session' : 'Guided') }}
                                            </td>
                                            <td>
                                                @if ($program->is_active == 1)
                                                    <a href="{{ route('program.status.update', $program->id) }}"><span class="badge badge-success">Live</span></a>
                                                @else
                                                    <a href="{{ route('program.status.update', $program->id) }}"><span class="badge badge-danger">Go Live</span></a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('program.edit', $program->id) }}"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('program.destroy', $program->id) }}" class="delete-program"><i class="fa fa-trash"></i></a>
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
        $('.delete-program').on('click', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
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
                    method: 'DELETE',
                    data : { '_token': '{{ csrf_token() }}' },
                    success: function (res) {
                        window.location.reload();
                    }
                });
            })
        });
    </script>
@endsection