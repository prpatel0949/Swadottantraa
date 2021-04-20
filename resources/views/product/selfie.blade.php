@extends('layouts.default')

@section('title', 'Selfie')

@section('content')
<div class="header-space">
    <div class="container">
        <section class="section">
            <div class="page-title">Selfie</div>
            <div class="section-content">
                <p>If a person wishes to engender self-improvement, he or she must seek an authentic conversation
                    with the self. With <b class="text-primary">SELFIE</b> you can use the lens of your hearts to
                    see the state of your souls.</p>
                <p>A self‐evaluation is a great opportunity for everybody to honestly and objectively consider and
                    document their status.</p>
                <p>Properly conducting a self‐evaluation can make the difference between a meaningful evaluation and
                    one that is less effective.</p>

                <div class="page-subtitle">What Is A Self‐Evaluation?</div>
                <p>A self‐evaluation is your thoughtful and considered written review of your performance during the
                    evaluation cycle. It involves rating established goals, competencies, and overall performance.
                </p>

                <div class="page-subtitle">What Are The Benefits of a Self‐Evaluation?</div>
                <p>When you self‐assess, you become an active participant in your own evaluation. Your involvement
                    enables you to honestly assess your strengths and also areas you need to improve.
                    Self‐evaluation also serves to increase commitment to goal setting/achievement, competency
                    development, and career planning.</p>

                <div class="page-subtitle">What Do You Need To Do In Order to Complete Your Self‐Evaluation?</div>
                <p><b>Time:</b> Allow sufficient time to complete the self‐evaluation. </p>
                <p><b>Quiet:</b> Conduct the self‐evaluation in a quiet place without interruptions so you can
                    devote your full attention and reflection to the process.</p>
                <p><b>Relax:</b> Try to relax and reflect upon individual goals, experiences, and incidents. No one
                    is perfect, and it is very likely that you will recall both good and bad experiences.</p>
                <p>The purpose of the evaluation process is to highlight strengths, correct performance weaknesses,
                    emotional wellness and develop unused skills and abilities. In order to do this, you must be
                    willing to recognize areas that need improvement or development.</p>
                <p>Don't forget about achievements made early on in the evaluation period.</p>
                <p>Be objective. It's awfully tempting to give yourself high marks across the board, but it's a
                    little unlikely that you've done everything right. Instead of evaluating yourself based on how
                    you wished you’d performed, offer the results and quantify them as much as possible by using
                    facts, figures, and specific dates.</p>

                <div class="page-subtitle">Features:</div>
                <ul>
                    <li>Objectivity: free from subjective judgement regarding the trait or potentiality to be
                        measured and evaluated.</li>
                    <li>Reliability: consistent and trustworthy results</li>
                    <li>Validity: measures what it intends to measure.</li>
                    <li>Norms: gives a picture of average standard of a particular sample in a particular aspect.
                    </li>
                    <li>Practicability: friendly to apply and fun to accomplish.</li>
                </ul>

                <div class="section-content">
                    <div class="section-title no-decoration"><small>Play Video To Know More</small></div>
                </div>
                <div class="section-content">
                    <div class="video-button ml-auto mr-auto hide-self-on-click" data-toggle="collapse"
                        data-target="#video_collapse">
                        <div class="bg-layer-1"></div>
                        <div class="bg-layer-2"></div>
                        <div class="icon-layer"><i class="fa fa-play"></i></div>
                    </div>
                </div>
                <div class="section-content collapse" id="video_collapse">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <video class="video-item" controls>
                                <source src="./assets/selfie.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>

                <div class="page-subtitle text-center mt-5">Go Check Yours</div>
                <div class="row justify-content-center">
                    <div class="col-sm-3 mt-4">
                        <a href="{{ route('selfie.program') }}" class="card shadow card-withhover bg-primary">
                            <div class="text-center card-body pl-1 pr-1"><b>Personal Habits</b></div>
                        </a>
                    </div>
                    <div class="col-sm-3 mt-4">
                        <a href="#" class="card shadow card-withhover bg-primary locked_stage">
                            <div class="locked_wrapper shadow">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                            <div class="text-center card-body pl-1 pr-1"><b>Assess Your Sexual Health</b></div>
                        </a>
                    </div>
                    <div class="col-sm-3 mt-4">
                        <a href="#" class="card shadow card-withhover bg-primary locked_stage">
                            <div class="locked_wrapper shadow">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                            <div class="text-center card-body pl-1 pr-1"><b>Check Your Anxiety Level</b></div>
                        </a>
                    </div>
                    <div class="col-sm-3 mt-4">
                        <a href="#" class="card shadow card-withhover bg-primary locked_stage">
                            <div class="locked_wrapper shadow">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>
                            <div class="text-center card-body pl-1 pr-1"><b>Check Your Depression Level</b></div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $(document).on("click", ".hide-self-on-click", function () {
            $(this).hide();
        })

		//  Common
		$(".img-slider").slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			prevArrow: '<button class="img-slider-nav img-slick-prev"><i class="fa fa-angle-left"></i></button>',
			nextArrow: '<button class="img-slider-nav img-slick-next"><i class="fa fa-angle-right"></i></button>',
		})
	})
</script>
@endsection
