@extends('admin.layouts.app')

@section('title', 'User Answers')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Program Answers</h2>
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
                                        <th>Program</th>
                                        <th>User Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($answers as $key => $answer)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ $answer->program->title }}
                                                <br>
                                                <small>{{ ($answer->program->type == 0 ? 'Single Session' : 'Guided') }}</small>
                                            </td>
                                            <td>{{ $answer->user->name }}</td>
                                            <td>
                                                {{ ($answer->scale_question_id ? 'Scale' : 'Workout') }}
                                            </td>
                                            <td>
                                                @if ($answer->is_read == 0)
                                                    <span class="badge badge-danger">UnRead</span>
                                                @else
                                                <span class="badge badge-success">Read</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.user.answer.detail', $answer->id) }}"><i class="fa fa-eye"></i></a>
                                                @if ($answer->program->type == 1)
                                                    <a href="#" class="stage-access" data-user="{{ $answer->user_id }}" data-program="{{ $answer->program_id }}"><i class="fa fa-universal-access"></i></a>
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
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="stage-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body stage-content">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add-permission">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/vendors/js/forms/select/select2.min.js') }}"></script>
    <script>
        $('#scaleTbl').DataTable();
        let program_id;
        let user_id;
        $(document).on('click', '.stage-access', function (e) {
            e.preventDefault();
            program_id = $(this).attr('data-program');
            user_id = $(this).attr('data-user');
            let url = '{{ route("program.access.stages", ":id") }}?user_id='+user_id;
            url = url.replace(':id', program_id);
            $.ajax({
                url: url,
                method: 'GET',
                success: function (res) {
                    $('.stage-content').html(res);
                    $('#stage-modal').modal('show');
                    $('#stage_ids').select2();
                }
            });
        });

        $(document).on('click', '.add-permission', function(e) {
            e.preventDefault();
            let stages_ids = $('#stage_ids').val();
            let url = "{{ route('program.add.access_stage', ':id') }}";
            url = url.replace(':id', program_id);
            $.ajax({
                url: url,
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', stages: stages_ids, user_id: user_id },
                success: function (res) {
                    $('#stage-modal').modal('hide');
                }
            });
        });

    </script>
@endsection