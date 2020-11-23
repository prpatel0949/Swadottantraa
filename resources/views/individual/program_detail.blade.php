@extends('individual.layouts.app')

@section('title', 'Programs Stages')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">{{ $program->title }}</h2>
                    </div>
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

                @foreach ($program->stages as $key => $stage)
                    <div class="col-sm-6 col-lg-4 form-control">
                        <div class="card h100 {{ ($program->type == 1 && $key != 0 && !in_array($stage->id, $access) ? 'locked_stage' : '') }}">
                            @if ($program->type == 1 &&  $key != 0 && !in_array($stage->id, $access))
                                <div class="locked_wrapper shadow">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                            @endif
                            <div class="card-header">
                                <h4>{{ $stage->title }}</h4>
                            </div>
                            <div class="card-body py-0">
                                <div class="progress progress-bar-primary mb-1 extra_progess_percentage_warpper">
                                    <span class="extra_progess_percentage">50%</span>
                                    <div class="progress-bar" role="progressbar" aria-valuenow="58" aria-valuemin="58" aria-valuemax="100" style="width:58%"></div>
                                </div>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="user-page-info">
                                        <h5 class="mb-0 v-stage-description"">{{ $stage->description }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white pt-0 pb-1 border-top-0">
                                <a href="{{ route('individual.program.stage', ['id' => $program->id, 'stage_id' => $stage->id ]) }}" class="btn btn-outline-primary">Explore</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    	</div>
    </div>
</div>

@endsection
