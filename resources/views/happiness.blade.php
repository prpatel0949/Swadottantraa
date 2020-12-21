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
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">With Training</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Without Training</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
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
                     <div class="page-title">Rejuvenation (Psychological skills and solutions)</div>
                     <div class="row text-center">
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Mood Management</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Behavioral Management</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
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
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For EQ</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">For Personal & Social Life</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="card shadow cursor-pointer QuestionAnswer" href="#">
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

<div class="modal fade" id="question_modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="card-body">
                <div class="question_modal_main_content question_1">
                    <div class="page-title">How is life going?</div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer" data-hide=".question_1" data-show=".question_1_1">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Everything is fine</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer" data-hide=".question_1" data-show=".question_1_2">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Not that well</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer" data-hide=".question_1" data-show=".question_1_3">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Things are messed-up</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_1" style="display: none">
                    <div class="page-title">That's great! What will you like us to help for?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-1-1" data-tag="A"  data-hide=".question_1_1" data-show=".question_1_1_1">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Brighten up mind</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-1-2" data-tag="B" data-hide=".question_1_1" data-show=".question_1_1_2">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle"> Healthy Relations</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-1-3" data-tag="C" data-hide=".question_1_1" data-show=".question_1_1_3">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Brain Power</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_1" data-show=".question_1">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_1_1" style="display: none">
                    <div class="page-title">What would be your preference for this?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-1-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-1-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-1-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_1_1" data-show=".question_1_1">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_1_2" style="display: none">
                    <div class="page-title">What would be your preference for this?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-2-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-2-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-2-3" data-tag="F" >
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_1_2" data-show=".question_1_1">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_1_3" style="display: none">
                    <div class="page-title">What would be your preference for this?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-3-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-3-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-1-3-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_1_3" data-show=".question_1_1">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_2" style="display: none">
                    <div class="page-title">Ohk… Let's know what is bothering you the most..</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-2-1" data-tag="A"  data-hide=".question_1_2" data-show=".question_1_2_1">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Emotional Stress, Physical Stress, Bad Mood</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-2-2" data-tag="B"  data-hide=".question_1_2" data-show=".question_1_2_2">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">My own habits causing problems for health, work & relations</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-2-3" data-tag="C"  data-hide=".question_1_2" data-show=".question_1_2_3">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Difficulties in concentration, memory and problem solving</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_2" data-show=".question_1">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_2_1" style="display: none">
                    <div class="page-title">What would be your preference for this?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-1-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-1-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-1-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_2_1" data-show=".question_1_2">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_2_2" style="display: none">
                    <div class="page-title">What would be your preference for this?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-2-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-2-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-2-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_2_2" data-show=".question_1_2">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_2_3" style="display: none">
                    <div class="page-title">What would be your preference for this?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-3-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-3-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-2-3-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_2_3" data-show=".question_1_2">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_3" style="display: none">
                    <div class="page-title">Please don't get disheartened! Let's start sorting the issues with…</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-3-1" data-tag="A"  data-hide=".question_1_3" data-show=".question_1_3_1">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Mood Management</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-3-2" data-tag="B"  data-hide=".question_1_3" data-show=".question_1_3_2">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Behavioural  Management</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag" data-question="1-3-3" data-tag="C"  data-hide=".question_1_3" data-show=".question_1_3_3">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Thoughts Management</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_3" data-show=".question_1">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_3_1" style="display: none">
                    <div class="page-title">What are you ready for?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-1-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-1-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-1-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_3_1" data-show=".question_1_3">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_3_2" style="display: none">
                    <div class="page-title">What are you ready for?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-2-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-2-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-2-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_3_2" data-show=".question_1_3">Back</button>
                    </div>
                </div>
                <div class="question_modal_main_content question_1_3_3" style="display: none">
                    <div class="page-title">What are you ready for?</div>
                    <div class="row text-center">
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-3-1" data-tag="D">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Quick solutions</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-3-2" data-tag="E">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">In-depth understanding</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card shadow cursor-pointer capture-tag last-question" data-question="1-3-3-3" data-tag="F">
                                <div class="card-body d-flex align-items-center justify-content-center" style="min-height: 150px">
                                    <div class="page-subtitle">Just knowing my status</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary mt-3 pl-4 pr-4" data-hide=".question_1_3_3" data-show=".question_1_3">Back</button>
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
    
    $(document).on('click', '.QuestionAnswer', function (e) {
        e.preventDefault();
        $('#online_modal').modal('hide');
        $('#question_modal').modal('show');
    });

    let tags = [];
    $(document).on('click', '.capture-tag', function(e) {
        e.preventDefault();
        let tag = {};
        tag['question_id'] = $(this).attr('data-question');
        tag['tag'] = $(this).attr('data-tag');
        tags.push(tag);
        if ($(this).hasClass('last-question')) {
            $.ajax({
                url: '{{ route("question.tag") }}',
                method: 'POST',
                data: { '_token': '{{ csrf_token() }}', 'tags': tags },
                success: function (res) {
                    window.location.href = '{{ route("register") }}';
                }
            });
        }
        
    });

</script>

@endsection
