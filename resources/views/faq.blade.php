@extends('layouts.default')

@section('title', 'FAQs')

@section('')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard/css/bootstrap.css') }}">
@endsection

@section('content')
<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="section-title">FAQs <span class="text-primary"></span></div>
            <div class="section-content">
                <div class="row">
                    <div class="container">
                        <div id="accordion">
                            @foreach ($faqs as $key => $faq)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne_{{ $faq->id }}" aria-expanded="true" aria-controls="collapseOne">               <i class="fa" aria-hidden="true"></i>
                                            {{ $faq->question }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOne_{{ $faq->id }}" class="collapse {{ ($key == 0 ? 'show' : '') }}" aria-labelledby="headingOne" data-parent="#accordion">
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
        </section>
    </div>
</div>
@endsection