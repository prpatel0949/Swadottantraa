@extends('layouts.app')

@section('title', 'Registration')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="login-card card shadow">
                <div class="d-flex align-items-center">
                    <img class="img-fluid" src="./assets/img/login.png" alt="">
                    <form class="login-form" id="register-form" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"><b>Register</b></h4>
                            <div class="dropdown-divider"></div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <select class="form-control" name="prefix">
                                            <option value="Mr." {{ (old('prefix') == 'Mr.' ? 'selected=""' : '') }}>Mr</option>
                                            <option value="Ms." {{ (old('prefix') == 'Ms.' ? 'selected=""' : '') }}>Ms</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                                value="{{ old('name') }}" placeholder="Username">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Franchisee Code</label>
                                        <input type="text" name="franchisee_code" value="{{ old('franchisee_code') }}" class="form-control @error('franchisee_code') is-invalid @enderror" placeholder="Franchisee Code">
                                        @error('franchisee_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email ID</label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email ID">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Date of Birth</label>
                                        <input type="text" id="datepicker" name="dob" value="{{ old('dob') }}" class="form-control @error('dob') is-invalid @enderror" placeholder="Date of Birth">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Contact Number</label>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <select class="form-control" name="country_code">
                                                    <option value="+91">+91</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" value="{{ old('mobile') }}" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Contact Number">
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Recheck Password</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Recheck Password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="agree"><input type="checkbox" name="terms" id="agree"> I agree to the Terms and <a href="privacy-policy.html">Conditions</a> and <a href="privacy-policy.html">Privacy Policy</a>.</label>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="type" value="{{ request()->type }}" >
                            <button type="submit" class="btn btn-primary">Sign Up</button>
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
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });

        $('#register-form').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 100
                },
                franchisee_code: {
                    maxlength: 20
                },
                email: {
                    required: true,
                    maxlength: 100,
                    email: true
                },
                mobile: {
                    required: true,
                    maxlength: 10,
                    number: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo : "#password"
                },
                terms: {
                    required: true,
                }
            }
        });

    </script>
@endsection
