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
                        <h2 class="content-header-title float-left mb-0">Program</h2>
                    </div>
                </div>
            </div>
        </div>
    	<div class="content-body">
    		<div class="card">
                <div class="card-header">
                    <h4 id="cards" class="card-title">{{ $program->title }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="card-text">
                            <p>{{ $program->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-transparent border-0 shadow-none collapse-icon accordion-icon-rotate">
                <div class="card-body p-0">
                    <div class="accordion search-content-info" id="accordionExample">
                        @foreach ($program->stages as $stage)
                            <div class="collapse-margin search-content mt-0 bg-white">
                                <div class="card-header" id="headingOne" role="button" data-toggle="collapse" data-target="#collapseOne{{ $stage->id }}" aria-expanded="false" aria-controls="collapseOne">
                                    <span class="lead collapse-title">
                                        {{ $stage->title }}
                                    </span>
                                </div>
                                <div id="collapseOne{{ $stage->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{ $stage->description }}
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