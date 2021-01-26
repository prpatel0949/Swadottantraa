@extends('individual.layouts.app')

@section('title', 'FAQs')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
		<div class="content-header row">
		    <div class="content-header-left col-12 mb-2">
		        <div class="row breadcrumbs-top">
		            <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">FAQs</h2>
		            </div>
		        </div>
		    </div>
        </div>
        
        <div class="card bg-transparent border-0 shadow-none collapse-icon accordion-icon-rotate">
            <div class="card-body p-0">
                <div class="accordion search-content-info" id="accordionExample">

                    @foreach ($faqs as $key => $faq)
                        <div class="collapse-margin search-content mt-0 bg-white">
                            <div class="card-header" id="headingOne" role="button" data-toggle="collapse" data-target="#collapseOne_{{ $faq->id }}" aria-expanded="false" aria-controls="collapseOne">
                                <span class="lead collapse-title">
                                    {{ $faq->question }}
                                </span>
                            </div>
                            <div id="collapseOne_{{ $faq->id }}" class="collapse {{ ($key == 0 ? 'show' : '') }}" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection