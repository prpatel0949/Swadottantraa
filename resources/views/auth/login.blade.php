@extends('layouts.app')

@section('title', 'Login')

@section('with-class', 'vh-100')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9">
            <div class="login-card card shadow">
                <div class="d-flex align-items-center">
                    <img class="img-fluid" src="{{ asset('assets/img/login.png') }}" alt="">
                    <form class="login-form" id="login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title"><b>Login</b></h4>
                            <div class="dropdown-divider"></div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') error @enderror" name="email" value="{{ old('email') }}" placeholder="Email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control  @error('password') error @enderror" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                            <div class="dropdown-divider mt-3 mb-3"></div>
                            <a href="#" class="btn btn-outline-primary btn-block">Sign Up</a>
                            <p class="text-center mt-4">If you have already checked before then kindly login to access your programs</p>
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

        $('#login-form').validate({
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
            }
        });

    </script>
@endsection
