@extends('franchisee.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">My Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    	<div class="content-body">
    		<div class="card">
                <div class="card-content">
                    <form method="POST" action="{{ route('franchisee.profile.update') }}" id="addForm" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            
                            @include('individual.includes.message')

                            <div class="media">
                                <a href="javascript: void(0);">
                                    <img src="{{ (!empty($user->profile) ? Storage::url($user->profile) : asset('assets/img/User.png')) }}" class="rounded mr-75" alt="profile image" height="64" width="64">
                                </a>
                                <div class="media-body mt-75">
                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                        <input type="file" name="profile" id="account-upload" hidden>
                                        <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                    </div>
                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                            size of
                                            800kB</small></p>
                                </div>
                            </div>
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-username">Franchisee Code</label>
                                            <div class="d-flex">
                                                <input readonly type="text" value="{{ $user->franchisee_code }}" class="form-control" id="account-username" placeholder="My Code" disabled data-validation-required-message="This username field is required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5"></div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-username">Name</label>
                                            <div class="d-flex">
                                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="account-username" placeholder="Full Name" required data-validation-required-message="This username field is required">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-username">Email ID</label>
                                            <input type="text" name="email" value="{{ $user->email }}" class="form-control" id="account-username" placeholder="Email ID" required data-validation-required-message="This username field is required">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-username">Contact Number</label>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <select name="country_code" class="form-control" id="">
                                                        <option value="+91" {{ ($user->country_code == '+91' ? 'selected=""' : '') }}>+91</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control" id="account-username" placeholder="Contact Number" required data-validation-required-message="This username field is required">
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea style="height: 115px"  name="address" class="form-control" placeholder="Address">{{ $user->address }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <p class="mb-0">
                                            Your email is not confirmed. Please check your inbox.
                                        </p>
                                        <a href="javascript: void(0);">Resend confirmation</a>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-username">Change Pasword</label>
                                            <input type="text" name="password" class="form-control" id="account-username" placeholder="Change Pasword" >
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="account-username">Confirm Password</label>
                                            <input type="text" name="password_confirmation" class="form-control" id="account-username" placeholder="Confirm Password" >
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 d-flex flex-sm-row flex-column justify-content-end">
                                    <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
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
            password: {
                minlength: 8
            },
            password_confirmation: {
                minlength: 8,
                equalTo : "#password"
            },
        }
    });
</script>
@endsection