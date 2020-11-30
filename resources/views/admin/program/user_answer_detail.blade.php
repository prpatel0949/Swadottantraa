@extends('admin.layouts.app')

@section('title', 'Answer Detail')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
		    <div class="content-header-left col-md-12 col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12 d-flex justify-content-between">
                        <h2 class="content-header-title float-left mb-0">Program Answers</h2>
		            </div>
		        </div>
            </div>
        </div>
        <div class="content-body">
            @include('franchisee.includes.message')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h2>{{ $answers->first()->program->title }}</h2>
                                <small>
                                    @if ($answers->first()->scale_question_id)
                                        {{ $answers->first()->scaleQuestion->scale->title }}
                                    @else
                                        {{ $answers->first()->workoutQuestion->workout->title }}
                                    @endif
                                </small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @if ($answers->first()->scale_question_id)
                                <strong>Interpretation : </strong>
                                @php 
                                $val = $answers->pluck('scaleQuestionAnswer')->sum('answer_value');
                                $inter = $answers->first()->scaleQuestion->scale->interpreatations->filter(function ($value) use ($val) {
                                    return ($value->start <= $val && $value->end >= $val);
                                })->first();
                                echo (!empty($inter) ? $inter->value : '');
                                @endphp
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach ($answers as $key => $answer)
                <div class="card bg-transparent border-0 shadow-none collapse-icon accordion-icon-rotate">
                    <div class="card-body p-0">
                        <div class="accordion search-content-info" id="accordionExample">
                            <div class="collapse-margin search-content mt-0 bg-white">
                                <div class="card-header" id="headingOne" role="button" data-toggle="collapse" data-target="#collapseOne_{{ $answer->id }}" aria-expanded="false" aria-controls="collapseOne">
                                    <span class="lead collapse-title">
                                        {{ ($answer->scaleQuestion ? $answer->scaleQuestion->question :  $answer->workoutQuestion->question) }}
                                    </span>
                                </div>
                                <div id="collapseOne_{{ $answer->id }}" class="collapse {{ ($key == 0 ? 'show' : '') }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>Answer :</strong>
                                                <p>
                                                    @if ($answer->scaleQuestionAnswer)
                                                        {{ $answer->scaleQuestionAnswer->answer }}
                                                    @elseif ($answer->workoutQuestionAnswer)
                                                        {{ $answer->workoutQuestionAnswer->answer }}
                                                    @else
                                                        {{ $answer->answer }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>

        @if ($answers->first()->program->type == 1)
            <form action="{{ route('program.answer.comment', request()->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Comment</label>
                            <textarea class="form-control" name="comment" required></textarea>
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
        @endif

    </div>
</div>


@endsection