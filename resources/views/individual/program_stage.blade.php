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
                        <li class="breadcrumb-item active"><a href="#">{{ $program->stages->where('id', request()->stage_id)->first()->title }}</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    	<div class="content-body">
            <div class="card">
                <div class="card-header cursor-pointer pb-2" data-toggle="collapse" data-target="#main_desc">
                    <h4 id="cards" class="card-title cs_card_title">Program Description</h4>
                    <i class="feather icon-more-horizontal cursor-pointer"></i>
                </div>
                <div class="card-content collapse show" id="main_desc">
                    <div class="card-body pt-0">
                        <div class="v-program-description text-justify">{{ $program->description }}</div>
                    </div>
                </div>
            </div>

            <div class="cs_progam_content_section">
                <div class="cs_progam_content_sidebar">
                    <div class="card cs_card">
                        <div class="card-header pb-1 cursor-pointer" data-toggle="collapse" data-target=".js_stage_wrapper">
                            <h4 class="card-title-sm cs_card_title">Stages</h4>
                            <i class="feather icon-more-horizontal cursor-pointer"></i>
                        </div>
                        <div class="card-content collapse show js_stage_wrapper stage_index_card">
                            <div class="card-body pt-0">
                                @foreach ($program->stages->where('id', request()->stage_id) as $stage)
                                    <a href="{{ route('individual.program.stage', ['id' => $program->id, 'stage_id' => $stage->id ]) }}" class="d-block border-top mt-1 pt-1">
                                        <div class="user-page-info">
                                            <h5 class="mb-0 v-stage-description">{{ $stage->title }}</h5>
                                        </div>
                                        <div class="progress progress-bar-primary mb-1 extra_progess_percentage_warpper">
                                            <span class="extra_progess_percentage">{{ $stage->process }}%</span>
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{ $stage->process }}" aria-valuemin="{{ $stage->process }}" aria-valuemax="100" style="width:{{ $stage->process }}%"></div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs_progam_content_wrapper">
                    <div class="card cs_card">
                        <div class="card-header pb-2">
                            <h4 id="cards" class="card-title cs_card_title">STAGE DESCRIPTION</h4>
                        </div>
                        <div class="card-content collapse show js_stage_wrapper stage_index_card">
                            <div class="card-body pt-1 mt--10">
                                <div class="v-program-description text-justify">{{ $program->stages->where('id', request()->stage_id)->first()->description }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cs_progam_content_section for-step">
                @foreach ($steps as $key => $step)
                    <div class="cs_progam_content_step">
                        <div class="card cs_card">
                            <div class="card-header pb-1 cursor-pointer" data-toggle="collapse" data-target=".js_stage_wrapper_{{$key}}">
                                <h4 style="text-transform: uppercase" class="card-title-sm cs_card_title">Step {{ $key + 1 }}: {{ $step->title }}</h4>
                                <i class="feather icon-more-horizontal cursor-pointer"></i>
                            </div>
                            <div class="card-content collapse show js_stage_wrapper_{{$key}} stage_index_card">
                                <div class="card-body pt-0">
                                    <a href="{{ route('individual.program.step', [ 'id' => $program->id, 'stage_id' => $step->program_stage_id, 'step_id' => $step->id ]) }}" class="btn btn-outline-primary">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

    	</div>
    </div>
</div>

@endsection
