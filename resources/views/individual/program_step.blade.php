@extends('individual.layouts.app')

@section('title')
{{ 'Programs - ' . $program->title }}
@endsection



@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="breadcrumb-wrapper col-12">
                    <h2 class="content-header-title float-left mb-0">{{ $program->title }}</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">{{ $program->stages->where('id', request()->stage_id)->first()->title }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ $current_step->title }}
                        </li>
                    </ol>
                </div>
                {{-- <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ $program->title }}</h2>
                    </div>
                </div> --}}
            </div>
        </div>
    	<div class="content-body">
    		<div class="card">
                <div class="card-header">
                    <h4 id="cards" class="card-title">Description</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="v-program-description">{{ $program->description }}</div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-12 col-lg-4">
                    <div class="card h100">
                        <div class="card-header">
                            <h4>steps</h4>
                            <i class="feather icon-more-horizontal cursor-pointer" data-toggle="collapse" data-target="#stage_wrapper"></i>
                        </div>
                        <div class="card-body pt-0 collapse show" id="stage_wrapper">
                            @foreach ($steps as $step)

                                <a href="#" class="d-block border-top mt-1 pt-1 {{ ($step->id == request()->step_id ? 'active' : '') }}">
                                    <div class="user-page-info">
                                        <h5 class="mb-0 v-stage-description">{{ $step->title }}</h5>
                                    </div>
                                    <div class="progress progress-bar-primary mb-1 extra_progess_percentage_warpper">
                                        <span class="extra_progess_percentage">50%</span>
                                        <div class="progress-bar" role="progressbar" aria-valuenow="58" aria-valuemin="58" aria-valuemax="100" style="width:58%"></div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-8">
                    <div class="card h100">
                        <div class="card-header">
                            <h4>{{ $current_step->title }}</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="v-program-description">{{ $current_step->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                @foreach ($current_step->sequences as $key => $item)
                    @if ($item->typable_type == 'App\StepScale')
                        <div class="col-md-12">
                            <div class="card bg-transparent border-0 shadow-none collapse-icon accordion-icon-rotate mb-0">
                                <div class="card-body p-0">
                                    <div class="accordion search-content-info" id="accordionExample">
                                        <div class="collapse-margin search-content mt-0 bg-white">
                                            <div class="card-header" id="headingOne" role="button" data-toggle="collapse" data-target="#scale_{{ $item->typable->scale->id }}" aria-expanded="false" aria-controls="collapseOne">
                                                <span class="lead collapse-title">
                                                    {{ $item->typable->scale->title }}
                                                    <p><small>{{ $item->typable->scale->description }}</small></p>
                                                </span>
                                            </div>
                                            <div id="scale_{{ $item->typable->scale->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div>
                                                        <form  class="row" action="{{ route('user.program.question_answer', $program->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="step_id" value="{{ $item->typable->step_id }}">
                                                            <input type="hidden" name="scale_id" value="{{ $item->typable->scale->id }}">
                                                            @foreach ($item->typable->scale->questions as $key => $question)
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="type[{{ $question->id }}]" value="0">
                                                                        <div class="card-question"><span class="q_no">
                                                                            {{ $key + 1 }}.</span>{{ $question->question }}<br>
                                                                            <small>{{ $question->description }}</small>
                                                                        </div>
                                                                        <div class="card-options mb-2">
                                                                            @foreach ($question->answers as $answer)
                                                                            <label class="card-option form-control mb-2">
                                                                                <input name="question[{{ $question->id }}]" type="radio" value="{{ $answer->id }}" required> <span>{{ $answer->answer }}</span>
                                                                                <i class="fa fa-check"></i>
                                                                            </label>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="dropdown-divider"></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($item->typable_type == 'App\StepWorkout')
                        <div class="col-md-12">
                            <div class="card bg-transparent border-0 shadow-none collapse-icon accordion-icon-rotate mb-0">
                                <div class="card-body p-0">
                                    <div class="accordion search-content-info" id="accordionExample">
                                        <div class="collapse-margin search-content mt-0 bg-white">
                                            <div class="card-header" id="headingOne" role="button" data-toggle="collapse" data-target="#workout_{{ $item->typable->workout->id }}" aria-expanded="false" aria-controls="collapseOne">
                                                <span class="lead collapse-title">
                                                    {{ $item->typable->workout->title }}
                                                    <p><small>{{ $item->typable->workout->description }}</small></p>
                                                </span>
                                            </div>
                                            <div id="workout_{{ $item->typable->workout->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">

                                                    <div>
                                                        <form class="row" action="{{ route('user.program.question_answer', $program->id) }}" method="POST" style="width: 100%">
                                                            @csrf
                                                            <input type="hidden" name="step_id" value="{{ $item->typable->step_id }}">
                                                            <input type="hidden" name="workout_id" value="{{ $item->typable->workout->id }}">
                                                            @foreach ($item->typable->workout->questions as $key => $question)
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="type[{{ $question->id }}]" value="{{ $question->answer_type }}">
                                                                        <div class="card-question"><span class="q_no">
                                                                            {{ $key + 1 }}.</span>{{ $question->question }}<br>
                                                                            <small>{{ $question->description }}</small>
                                                                        </div>
                                                                        @if ($question->answer_type == 1)
                                                                            <textarea class="form-control" name="question[{{ $question->id }}]" required></textarea>
                                                                        @else
                                                                        <div class="card-options mb-2">
                                                                            @foreach ($question->answers as $answer)
                                                                            <label class="card-option form-control mb-2">
                                                                                <input name="question[{{ $question->id }}]" type="radio" value="{{ $answer->id }}" required> <span>{{ $answer->answer }}</span>
                                                                                <i class="fa fa-check"></i>
                                                                            </label>
                                                                            @endforeach
                                                                        </div>
                                                                        @endif
                                                                        <div class="dropdown-divider"></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <a href="{{ Storage::url($item->typable->image) }}" target="_blank"><i class="fa fa-paperclip"></i> {{ basename($item->typable->image) }}</a>
                        </div>
                    @endif
                @endforeach
            </div>

    	</div>
    </div>
</div>

@endsection
