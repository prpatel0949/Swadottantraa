@extends('layouts.default')

@section('title', 'PsyHeal')

@section('content')
<div class="header-space">
    <div class="container">
        <section class="section">
            <div class="page-title">PsyHeal</div>
            <div class="section-content">
                <p>PsyHeal is a unique mobile app for Emotional First Aid developed by experienced and qualified
                    mental health professionals.</p>
                <p>Emotional First Aid is like Physical First Aid. We use and apply first aid measures like
                    bandages, ointments, etc to protect further damage to health in case of injuries. If we fail to
                    develop, maintain and strengthen our emotional health, we are likely to suffer from a lower
                    quality of life. So, we must have some handy, easy yet effective psychological measures in case
                    of day-to- day emotional injuries like frustrations, failures, stress, worries, rejections,
                    anger, loss etc.</p>
                <p>PsyHeal is a self-help tool for Emotional First Aid. Here you will get personalized first aid
                    measures depending upon:</p>
                <ul>
                    <li>Your emotional injury</li>
                    <li>Its severity</li>
                    <li>Painful emotion associated with it and</li>
                    <li>Reason behind emotional injury you have.</li>
                </ul>
                <p>In today’s competitive world no one can escape the various stresses that we are exposed to in
                    different situations. And we are no exception to this; in fact we might be at a higher risk of
                    being stressed. The various stresses that we come across are:</p>
                <ul>
                    <li>Personal stress</li>
                    <li>Relationship stress</li>
                    <li>Emotional stress</li>
                    <li>Family stress</li>
                    <li>Exam stress</li>
                    <li>Peer pressure</li>
                </ul>
                <p>And the list goes on. Notably most of us do not talk about these issues as we feel shy,
                    embarrassed or simply cannot identify that we need help for dealing with these issues. And it is
                    a well-known fact that these kind of hidden issues surely impact our performance.</p>

            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <div class="img-slider">
                            <div class="img-slider-item">
                                <div class="img-slider-content p-3">
                                    <div class="card shadow mb-0">
                                        <img class="img-fluid border-rounded"
                                            src="./assets/img/behavioural_activation.png" />
                                    </div>
                                </div>
                            </div>
                            <div class="img-slider-item p-3">
                                <div class="img-slider-content">
                                    <div class="card shadow mb-0">
                                        <img class="img-fluid border-rounded"
                                            src="./assets/img/intensity_of_emotional_pain.jpeg" />
                                    </div>
                                </div>
                            </div>
                            <div class="img-slider-item p-3">
                                <div class="img-slider-content">
                                    <div class="card shadow mb-0">
                                        <img class="img-fluid border-rounded" src="./assets/img/landing_page.png" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-content">
                <div class="page-subtitle">MOOD TRACK</div>
                <p>Mood Track is an attractive, easy measure for development of Emotional Awareness, which is one of
                    the components of Emotional Intelligence. You just have to click the most approximate label for
                    your current emotion from the list. PsyHeal will tirelessly give you a feedback of your
                    emotional island over a large time scale, in the form of Healthy and Unhealthy emotions. With
                    this simple exercise, your brain will experientially learn to connect with, identify and
                    differentiate your emotions.</p>

                <div class="page-subtitle">HEAL EMOTIONAL INJURIES</div>
                <p>It is again an attractive measure to heal your Emotional Injuries. You just have to select the
                    most approximate Injury label, set the emotional thermometer, and select the level of Intensity
                    of emotional pain and the reason for emotional injury. With this simple exercise you will be
                    able to access the First Aid Box which is specifically designed by professionals to heal the
                    emotional injuries.</p>

                <div class="page-subtitle">USEFULL LINKS</div>
                <p>We have important and reliable resources to provide you useful information about mental health.
                    You can access links to them through the app.</p>

                <div class="page-subtitle">Utilities of PsyHeal:</div>
                <ul>
                    <li>Development of Emotional Awareness</li>
                    <li>Tool to asses if you need Emotional First Aid or not</li>
                    <li>First Aid Box for Emotional First Aid</li>
                    <li>Link to EMERGENCY SERVICE in case First Aid is not enough</li>
                    <li>RECHECK and asses how much the first aid has worked for you</li>
                    <li>Option to use it again and again</li>
                    <li>Personalized solutions for all individual problems</li>
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
                                <source src="./assets/vid.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="section-content text-center">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.in.psyheal&hl=en_IN"
                        class="btn btn-primary pl-5 pr-5">Download Now</a>
                    <div></div>
                    <p class="text-center mb-4"><small>Available only on playstore</small></p>
                </div>
                <div class="page-subtitle">Are you an Institute?</div>
                <div class="d-flex mt-3">
                    <div class="ml-3 mr-3">-</div>
                    <div>We cater big pool of Institutes and MNCs by providing bulk subscriptions so as to develop
                        their heads (Students, Employees, Staff) and stimulate mental wellbeing to Increase their
                        productivity.</div>
                </div>
                <p class="mt-3">To buy bulk users at special rates - <a class="text-primary" data-toggle="modal"
                        data-target="#psyheal_modal"><b>Click here</b></a></p>


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
