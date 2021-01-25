@extends('admin.layouts.app')

@section('title', 'Edit Coupon')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row sticky_block">
		    <div class="content-header-left col-md-9 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
		                <h2 class="content-header-title float-left mb-0">Edit FAQ</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card header-block">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title">Question</label>
                                    <input type="text" name="question" class="form-control" value="{{ (old('question') ? old('question') : $faq->question) }}" placeholder="Question">
                                    @error('question')
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
                                    <label for="title">Answer</label>
                                    <textarea class="form-control" name="answer" placeholder="Answer">{{ (old('answer') ? old('answer') : $faq->answer) }}</textarea>
                                    @error('question')
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