@extends('admin.layouts.app')

@section('title', 'Add Coupon')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row sticky_block">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">New Coupon</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('coupon.store') }}" method="POST">
                @csrf
                <div class="card header-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Title">
                                    @error('title')
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
                                    <label for="code">Code</label>
                                    <div class="input-group">
                                        <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" placeholder="Code">
                                        <div class="input-group-append">
                                            <span class="input-group-text generate-code" id="basic-addon2" style="cursor: pointer;">Generate</span>
                                        </div>
                                    </div>
                                    @error('code')
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
                                    <label for="title">Start Date</label>
                                    <input type="text" name="start_date" class="form-control datepicker" value="{{ old('start_date') }}" placeholder="Start Date">
                                    @error('start_date')
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
                                    <label for="title">End Date</label>
                                    <input type="text" name="end_date" class="form-control datepicker" value="{{ old('end_date') }}" placeholder="End Date">
                                    @error('end_date')
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
                                    <label for="title">Discount(%)</label>
                                    <input type="text" name="discount" class="form-control" value="{{ old('discount') }}" placeholder="Discount (%)">
                                    @error('discount')
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
                                    <a href="#" class="btn btn-danger">Cancel</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            orientation: 'bottom',
            autoclose: true,
            format: 'dd-mm-yyyy'
        });

        $(document).on('click', '.generate-code', function() {
            var result = '';
            var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            for (var i = 6; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];

            $('#code').val(result);
        });
    </script>
@endsection