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
                                        <span class="extra_progess_percentage">{{ $step->Process }}%</span>
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $step->Process }}" aria-valuemin="{{ $step->Process }}" aria-valuemax="100" style="width:{{ $step->Process }}%"></div>
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
                                            <div class="card-header" id="headingOne" role="button" data-toggle="collapse" data-target="#scale_{{ $key }}" aria-expanded="false" aria-controls="collapseOne">
                                                <span class="lead collapse-title">
                                                    {{ $item->typable->scale->title }}
                                                    <p><small>{{ $item->typable->scale->description }}</small></p>
                                                </span>
                                            </div>
                                            <div id="scale_{{ $key }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div>
                                                        <form  class="row" action="{{ route('user.program.question_answer', $program->id) }}" method="POST" id="scale{{ $item->typable->scale->id }}">
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
                                                                                @php
                                                                                    $currect_answer = $answers->where('scale_question_id', $question->id)->last();
                                                                                @endphp
                                                                            <label class="card-option form-control mb-2">
                                                                                <input name="question[{{ $question->id }}]" type="radio" value="{{ $answer->id }}" {{ (!empty($currect_answer) && $currect_answer->is_draft == 1 && $currect_answer->scale_question_answer_id == $answer->id ? 'checked' : '') }} > <span>{{ $answer->answer }}</span>
                                                                                <i class="fa fa-check"></i>
                                                                            </label>
                                                                            @endforeach
                                                                            @php 
                                                                                $question_answer = $answers->where('scale_question_id', $question->id)->first();
                                                                            @endphp
                                                                            <input type="hidden" id="" name="answer_id[{{ $question->id }}]" value="{{ (!empty($question_answer) && $question_answer->is_draft == 1 ? $question_answer->id : '') }}"> 
                                                                        </div>
                                                                        <div class="dropdown-divider"></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @php
                                                                $questions_id = $item->typable->scale->questions->pluck('id');
                                                                $ans = $answers->whereIn('scale_question_id', $questions_id)->flatten();
                                                                $comments = $answers->whereIn('scale_question_id', $questions_id)->flatten()->pluck('comments')->flatten();
                                                            @endphp
                                                            @if ($ans->count() == 0 || ($ans->count() > 0 && $item->step->is_multiple == 1) || ($ans->count() > 0 && $ans[0]->is_draft == 1) || ($program->type == 1 && $ans->last()->is_resubmit == 1))
                                                                @if ($ans->count() == 0 || $program->type == 0 || ($program->type == 1 && $ans->last()->is_resubmit == 1) 
                                                                        || ($ans->count() > 0 && $ans[0]->is_draft == 1))
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <input type="hidden" name="is_draft" id="scale_type_{{ $item->typable->scale->id }}" value="0">
                                                                            <button type="button" class="btn btn-primary submit-answer" data-draft="1" data-type="scale" data-id="{{ $item->typable->scale->id }}">Save as Draft</button>
                                                                            <button type="button" class="btn btn-primary submit-answer" data-draft="0" data-type="scale" data-id="{{ $item->typable->scale->id }}">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                            @if ($comments->count() > 0)
                                                                <div class="dropdown-divider"></div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <h3>Expert's Comment</h3>
                                                                    </div>
                                                                </div>
                                                                @foreach ($comments as $key => $comment)
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        {{ $key +1 }}. {{ $comment->comment }}
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endif
                                                            @if ($program->type == 0)
                                                            <div class="dropdown-divider"></div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <h3>Answer Interpretation</h3>
                                                                </div>
                                                                <ul>
                                                                    
                                                                    @foreach ($answers->unique('set_no') as $answer)
                                                                    @foreach ($answer->scaleQuestion->scale->interpreatations as $interpreatation)
                                                                            @php 
                                                                                $val = $answers->where('set_no', $answer->set_no)->where('scaleQuestion.is_interpreatation', 1)->whereIn('scale_question_id', $interpreatation->questions->pluck('question_id')->toArray())->flatten()->pluck('scaleQuestionAnswer')->sum('answer_value');
                                                                                $inter = $interpreatation->interpretations->filter(function ($value) use ($val) {
                                                                                        return ($value->min <= $val && $value->max >= $val);
                                                                                    })->first();
                                                                                echo '<li>'.(!empty($inter) ? '<br>'.$inter->interpretation : '').'</li>';
                                                                            @endphp
                                                                        @endforeach
                                                                    @endforeach
                                                                </ul>
                                                            </div>  
                                                            @endif
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
                                                        <form class="row" action="{{ route('user.program.question_answer', $program->id) }}" method="POST" id="workout{{ $item->typable->workout->id }}" style="width: 100%">
                                                            @csrf
                                                            <input type="hidden" name="step_id" value="{{ $item->typable->step_id }}">
                                                            <input type="hidden" name="workout_id" value="{{ $item->typable->workout->id }}">
                                                            @foreach ($item->typable->workout->questions as $key => $question)
                                                                @php
                                                                    $currect_answer = $answers->where('workout_question_id', $question->id)->last();
                                                                @endphp
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="type[{{ $question->id }}]" value="{{ $question->answer_type }}">
                                                                        <div class="card-question"><span class="q_no">
                                                                            {{ $key + 1 }}.</span>{{ $question->question }}<br>
                                                                            <small>{{ $question->description }}</small>
                                                                        </div>
                                                                        @if ($question->answer_type == 1)
                                                                            <textarea class="form-control" name="question[{{ $question->id }}]" >{{ (!empty($currect_answer) && $currect_answer->is_draft == 1 ? $currect_answer->answer : '') }}</textarea>
                                                                        @else
                                                                        <div class="card-options mb-2">
                                                                            @foreach ($question->answers as $answer)
                                                                            <label class="card-option form-control mb-2">
                                                                                <input name="question[{{ $question->id }}]" type="radio" value="{{ $answer->id }}"  {{ (!empty($currect_answer) && $currect_answer->is_draft == 1 && $currect_answer->workout_question_answer_id == $answer->id ? 'checked' : '') }}> <span>{{ $answer->answer }}</span>
                                                                                <i class="fa fa-check"></i>
                                                                            </label>
                                                                            @endforeach
                                                                        </div>
                                                                        @endif
                                                                        <div class="dropdown-divider"></div>
                                                                    </div>
                                                                </div>
                                                                @php 
                                                                    $question_answer = $answers->where('workout_question_id', $question->id)->first();
                                                                @endphp
                                                                <input type="hidden" id="" name="answer_id[{{ $question->id }}]" value="{{ (!empty($question_answer) && $question_answer->is_draft == 1 ? $question_answer->id : '') }}"> 
                                                            @endforeach
                                                            @php
                                                                $questions_id = $item->typable->workout->questions->pluck('id');
                                                                $ans = $answers->whereIn('workout_question_id', $questions_id)->flatten();
                                                                $comments = $answers->whereIn('workout_question_id', $questions_id)->flatten()->pluck('comments')->flatten();
                                                            @endphp
                                                            @if ($ans->count() == 0 || ($ans->count() > 0 && $item->step->is_multiple == 1 || ($program->type == 1 && $ans->last()->is_resubmit == 1)) 
                                                                    || ($ans->count() > 0 && $ans[0]->is_draft == 1))
                                                                    @if ($ans->count() == 0 || $program->type == 0 || ($program->type == 1 && $ans->last()->is_resubmit == 1))
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <input type="hidden" name="is_draft" id="workout_type_{{ $item->typable->workout->id }}" value="0">
                                                                                <button type="button" class="btn btn-primary submit-answer" data-draft="1" data-type="workout" data-id="{{ $item->typable->workout->id }}">Save as Draft</button>
                                                                                <button type="button" class="btn btn-primary submit-answer" data-draft="0" data-type="workout" data-id="{{ $item->typable->workout->id }}">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                            @endif
                                                            @if ($comments->count() > 0)
                                                                <div class="dropdown-divider"></div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <h3>Doctor Comment</h3>
                                                                    </div>
                                                                </div>
                                                                @foreach ($comments as $key => $comment)
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        {{ $key +1 }}. {{ $comment->comment }}
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endif
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

@if (Session::has('success') && !empty(Session::get('success')))
<div class="modal fade" id="success_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title model_program_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p class="text-center">Keep an eye on all your completed scales and workouts for experts reviews.</p>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('js')
    <script>
        $(document).on('click', '.submit-answer', function(e) {
            e.preventDefault();
            var is_draft = $(this).attr('data-draft');
            var type = $(this).attr('data-type');
            var id = $(this).attr('data-id');

            $('#'+ type +'_type_' + id).val(is_draft);

            $('#' + type + '' + id).submit();
        });
    </script>

    @if (Session::has('success') && !empty(Session::get('success')))
        <script>
            $('#success_modal').modal('show');
        </script>
    @endif

@endsection
