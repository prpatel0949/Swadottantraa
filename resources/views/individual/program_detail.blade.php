@extends('individual.layouts.app')

@section('title', 'Programs Stages')

@section('content')

<style>
    .open-stage {
        cursor: pointer;
    }
</style>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
    	<div class="content-body">
            <div class="cs_program_title_section">
                <div class="cs_program_img" style="background-image: url(https://via.placeholder.com/80)"></div>
                <div class="cs_program_title">{{ $program->title }}</div>
            </div>
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

            @foreach ($program->stages as $key => $stage)
                <div class="cs_progam_content_section {{ ($program->type == 1 && $key != 0 && !in_array($stage->id, $access) ? 'locked_stage' : 'open-stage') }}">
                    <div class="cs_progam_content_sidebar">
                        <div class="card cs_card">
                            @if ($program->type == 1 &&  $key != 0 && !in_array($stage->id, $access))
                                <div class="locked_wrapper shadow">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                            @endif
                            <div class="card-header pb-1 cursor-pointer" data-toggle="collapse" data-target=".js_stage_wrapper_{{$key}}">
                                <h4 class="card-title-sm cs_card_title">STAGE {{ $key + 1 }} : {{ $stage->title }}</h4>
                                <i class="feather icon-more-horizontal cursor-pointer mt--10"></i>
                                <span class="extra_progess_percentage downside">{{ $stage->process }}%</span>
                            </div>
                            <div class="card-content collapse show js_stage_wrapper_{{$key}} stage_index_card">
                                <div class="card-body pt-0">
                                    <div class="progress progress-bar-primary mb-1 extra_progess_percentage_warpper">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $stage->process }}" aria-valuemin="{{ $stage->process }}" aria-valuemax="100" style="width:{{ $stage->process }}%"></div>
                                    </div>
                                    <a href="{{ route('individual.program.stage', ['id' => $program->id, 'stage_id' => $stage->id ]) }}" class="btn btn-outline-primary">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cs_progam_content_wrapper">
                        <div class="card cs_card">
                            @if ($program->type == 1 &&  $key != 0 && !in_array($stage->id, $access))
                                <div class="locked_wrapper shadow">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                            @endif
                            <div class="card-header pb-2">
                                <h4 id="cards" class="card-title cs_card_title">STAGE DESCRIPTION</h4>
                            </div>
                            <div class="card-content collapse show js_stage_wrapper_{{$key}} stage_index_card">
                                <div class="card-body pt-1 mt--10">
                                    <div class="v-program-description text-justify">{!! $stage->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
<!--
            <div class="row">
                <div class="col-md-1">
                    <div class="media">
                        <img src="http://127.0.0.1:8000/storage/programs/wqtz4haDUN5FpaD1ixz30W0JKl9hlQKG36SOUkNh.gif" class="rounded mr-75" alt="profile image" height="64" width="64">
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="v-program-description">{{ $program->title }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
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
                </div>
            </div>


            @foreach ($program->stages as $key => $stage)
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div data-program_id="{{ $program->id }}" data-id="{{ $stage->id }}" class="card h100 {{ ($program->type == 1 && $key != 0 && !in_array($stage->id, $access) ? 'locked_stage' : 'open-stage') }}">
                                @if ($program->type == 1 &&  $key != 0 && !in_array($stage->id, $access))
                                    <div class="locked_wrapper shadow">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h4 style="text-transform: uppercase;">STAGE {{ $key + 1 }} : {{ $stage->title }}</h4>
                                </div>
                                <div class="card-body py-0 pb-2 ">
                                    <div class="progress progress-bar-primary mb-1 extra_progess_percentage_warpper">
                                        <span class="extra_progess_percentage">{{ $stage->process }}%</span>
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $stage->process }}" aria-valuemin="{{ $stage->process }}" aria-valuemax="100" style="width:{{ $stage->process }}%"></div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white pt-0 pb-1 border-top-0">
                                    <a href="{{ route('individual.program.stage', ['id' => $program->id, 'stage_id' => $stage->id ]) }}" class="btn btn-outline-primary">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="card h100 {{ ($program->type == 1 && $key != 0 && !in_array($stage->id, $access) ? 'locked_stage' : '') }}">
                                @if ($program->type == 1 &&  $key != 0 && !in_array($stage->id, $access))
                                    <div class="locked_wrapper shadow">
                                        <i class="fa fa-lock" aria-hidden="true"></i>
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h4 style="text-transform: uppercase;">STAGE DESCRIPTION</h4>
                                </div>
                                <div class="card-body py-0 pb-2">
                                    {!! $stage->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach -->

        </div>
    </div>
</div>

@endsection
