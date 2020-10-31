@extends('individual.layouts.app')

@section('title', 'Programs Question')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Program Question</h2>
                    </div>
                </div>
            </div>
        </div>
    	<div class="content-body">
    		<div class="card">
                <div class="card-content">
                    <form method="POST" action="{{ route('program.question.answer', $program->id) }}" id="addForm" enctype="multipart/form-data">
                        @csrf
                        @foreach ($program->questions as $index => $question)
                            <div class="card-body">
                                <div class="card-question"><span class="q_no">{{ $index + 1 }}.</span> {{ $question->question }} </div>
                                <div class="dropdown-divider mt-3 mb-3"></div>
                                <input type="hidden" name="question[]" value="{{ $question->id }}">
                                @foreach ($question->options as $option)
                                    <div class="card-options">
                                        <label class="card-option form-control">
                                            <input name="answer[{{ $question->id }}]" type="radio" value="{{ $option->id }}"> <span>{{ $option->option }}</span>
                                            <i class="fa fa-check"></i>
                                        </label>
                                    </div>
                                @endforeach
                                @error('answer.'.$question->id)
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @endforeach
                        <div class="card-body">
                            <div class="col-sm-12 d-flex flex-sm-row flex-column">
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Submit</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
    </div>
</div>

@endsection