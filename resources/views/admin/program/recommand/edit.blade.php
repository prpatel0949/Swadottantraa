@extends('admin.layouts.app')

@section('title', 'Edit Recommanded program')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row sticky_block">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Edit Recommanded program</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('recommand.program.update', $recommanded_programs->first()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card header-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">User</label>
                                    @php $uids = $recommanded_programs->pluck('user_id')->unique()->toArray(); @endphp
                                    <select name="user_id[]" class="form-control select2" style="width: 100%" required multiple>
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}" {{ (in_array($user->id, $uids) ? 'selected' : '') }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    @php $ids = $recommanded_programs->pluck('program_id')->toArray(); @endphp
                                    <label for="title">Programs</label>
                                    <select name="program_id[]" class="form-control select2" multiple style="width: 100%" required>
                                        <option value="" disabled>Select Programs</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->id }}" {{ (in_array($program->id, $ids) ? 'selected' : '') }}>{{ $program->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('program_id[]')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submt</button>
                                    <a href="{{ route('recommand.program') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="{{ asset('assets/dashboard/vendors/js/forms/select/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection