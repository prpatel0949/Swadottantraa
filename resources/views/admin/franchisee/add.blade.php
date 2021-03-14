@extends('admin.layouts.app')

@section('title', 'Add Franchisee')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Add Franchisee</h2>
                        
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            @include('franchisee.includes.message')
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('franchisee.store') }}" method="POST" id="addForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                                    @error('name')
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
                                    <label for="name">Email :</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" >
                                    @error('email')
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
                                    <label for="name">Mobile :</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}" >
                                    @error('mobile')
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
                                    <label for="name">Address :</label>
                                    <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                                    @error('address')
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
                                    <label for="state">State</label>
                                    <select class="form-control state" name="state_id" id="state_id">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
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
                                    <label for="state">City</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option value="">Select City</option>
                                        
                                    </select>
                                    @error('city_id')
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
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    let cities = {!! json_encode($states->pluck('cities')->flatten()->toArray()) !!}
    $('#addForm').validate({
        rules: {
            name: {
                    required: true,
                    maxlength: 100
                },
            email: {
                required: true,
                maxlength: 255,
                email: true
            },
            mobile: {
                required: true,
                maxlength: 10,
                number: true
            },
        }
    });

    $(document).on('change', '.state', function () {
        let state_id = $(this).val();
        let scities = cities.filter(function(val) {
            return val.state_id == state_id;
        });
        let html = '';
        $.each(scities, function (key, value) {
            html += '<option value="'+ value.id +'">'+ value.name +'</option>';
        });
        $('#city_id').html(html);
    });
</script>

@endsection