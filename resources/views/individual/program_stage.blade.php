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
                    <div class="card">
                        <div class="card-header mb-1">
                            <h4>Stages</h4>
                            <i class="feather icon-more-horizontal cursor-pointer" data-toggle="collapse" data-target="#stage_wrapper"></i>
                        </div>
                        <div class="card-body pt-0 collapse show" id="stage_wrapper">
                            @foreach ($program->stages as $stage)

                                <a class="{{ ($stage->id == request()->stage_id ? 'active' : '') }}" href="{{ route('individual.program.stage', ['id' => $program->id, 'stage_id' => $stage->id ]) }}" class="d-block border-top mt-1 pt-1">
                                    <div class="user-page-info">
                                        <h5 class="mb-0 v-stage-description">{{ $stage->title }}</h5>
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
                    <div class="row">
                        @foreach ($steps as $key => $step)
                            <div class="col-sm-6 col-lg-6">
                                <div class="card h100" >
                                    
                                    <div class="card-header">
                                        <h4>{{ $step->title }}</h4>
                                    </div>
                                    <div class="card-body py-0">
                                        <hr>
                                        <div class="d-flex justify-content-start align-items-center">
                                            <div class="user-page-info">
                                                <h5 class="mb-0 v-stage-description"">{{ $step->description }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white pt-0 pb-1 border-top-0">
                                        <a href="{{ route('individual.program.step', [ 'id' => $program->id, 'stage_id' => $step->program_stage_id, 'step_id' => $step->id ]) }}" class="btn btn-outline-primary">Explore</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>

@endsection
