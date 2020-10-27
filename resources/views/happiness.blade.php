@extends('layouts.default')

@section('title', 'Happiness')

@section('content')
<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="section-title">Happiness <span class="text-primary">Options</span></div>
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-body img-slider-flipper" style="min-height: 150px">
                                <div class="img-slider-flipper-title section-title no-decoration text-muted">Relaxation</div>
                                <div class="img-non-slider">
                                    <p class="pb-0">Peace of mind and energetic body with instant tools as well as scientific training</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-body img-slider-flipper" style="min-height: 150px">
                                <div class="img-slider-flipper-title section-title no-decoration text-muted">Rejuvenation</div>
                                <div class="img-non-slider">
                                    <p class="pb-0">Psychological skills and solutions for improving mood, habits and work performance.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card shadow">
                            <div class="card-body img-slider-flipper" style="min-height: 150px">
                                <div class="img-slider-flipper-title section-title no-decoration text-muted">Reformation</div>
                                <div class="img-non-slider">
                                    <p class="pb-0">Self development with guidance for Emotional Intelligence, Life satisfactions and Professional career</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="video-button ml-auto mr-auto hide-self-on-click" data-toggle="collapse" data-target="#video_collapse">
                    <div class="bg-layer-1"></div>
                    <div class="bg-layer-2"></div>
                    <div class="icon-layer"><i class="fa fa-play"></i></div>
                </div>
            </div>
            <div class="section-content collapse" id="video_collapse">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <video class="video-item" controls>
                              <source src="{{ asset('assets/vid.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="section-title no-decoration"><small>Play Video To Know More</small></div>
                <div class="section-title no-decoration mt-3">Check which options suits you the most?</div>
            </div>
            <div class="section-content text-center">
                <button class="btn btn-primary pl-5 pr-5" data-toggle="modal" data-target="#online_modal">Check</button>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="online_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
             <div class="card-body">
                 <div class="online_modal_main_content">
                     <div class="page-title">So, What are you looking for?</div>
                     <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer" data-hide=".online_modal_sub_content" data-show=".online_modal_sub_content1">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Relaxation</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer" data-hide=".online_modal_sub_content" data-show=".online_modal_sub_content2">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Rejuvenation</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer" data-hide=".online_modal_sub_content" data-show=".online_modal_sub_content3">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Reformation</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
                 <div class="online_modal_sub_content online_modal_sub_content1" style="display: none">
                     <div class="page-title">Relexation (Peace)</div>
                     <div class="row text-center">
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('register') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">With Training</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('register') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Without Training</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('register') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">With Friends and Family</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".online_modal_sub_content" data-show=".online_modal_main_content">Back</button>
                    </div>
                 </div>
                 <div class="online_modal_sub_content online_modal_sub_content2" style="display: none">
                     <div class="page-title">Relexation (Psychological skills and solutions)</div>
                     <div class="row text-center">
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('question') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Mood Management</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('question') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Behavioral Management</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('question') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For work Skills</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".online_modal_sub_content" data-show=".online_modal_main_content">Back</button>
                    </div>
                 </div>
                 <div class="online_modal_sub_content online_modal_sub_content3" style="display: none">
                     <div class="page-title">Reformation (Development)</div>
                     <div class="row text-center">
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('question') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For EQ</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('question') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Personal & Social Life</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer" href="{{ route('question') }}">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Professional Career</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".online_modal_sub_content" data-show=".online_modal_main_content">Back</button>
                    </div>
                 </div>
             </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    $(document).on("click", "[data-hide]", function() {
        console.log('show');
		$($(this).data('hide')).slideUp(200)
	});
	$(document).on("click", "[data-show]", function() {
        console.log(1);
        $('.online_modal_main_content').slideUp(200)
		var _this = this
		$($(_this).data('show')).slideDown(200)
	});
    $(document).on("click", ".hide-self-on-click", function () {
        $(this).hide();
    })
</script>

@endsection
