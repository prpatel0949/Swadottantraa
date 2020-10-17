@extends('admin.layouts.app')

@section('title', 'Add Workout')

@section('css')
    <link rel="stylesheet" href="https://bevacqua.github.io/dragula/dist/dragula.css">
    <style>
        .add-value {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">New Workout</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('scale.store') }}" method="POST">
                @csrf
                <div class="card header-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('title') error @enderror" value="{{ old('title') }}" name="title" placeholder="Workout Title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group float-right">
                                    <button type="button" class="btn btn-primary add-question">Add Question</button>
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