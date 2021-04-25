@extends('layouts.default')

@section('title', 'Brain and Mind Gym')

@section('content')
<div class="header-space">
    <div class="container">
        <section class="section">
            <div class="page-title">Brain and Mind Gym</div>
            <div class="section-content">
                <div class="page-subtitle">What is SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym?</div>
                <p>Brain and Mind Gym is a sophisticated, online and offline tool for personal development. Personal development includes Life Skills, Multiple Intelligence and Wellness.</p>
                <p>Life Skills are those Brain and Mind facets which help to achieve success, satisfaction and smartness!</p>
                <p>Multiple intelligences are hidden treasures in our Brain, Body and Mind! Everybody is born with these jewels but very few people know how to use them for their own progress.</p>
                <p>And, Wellness is a blend of emotional, physical, social and spiritual health.</p>
                <p>Thus, SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym help you to enrich your life by developing your personality in real sense!</p>

                <div class="page-subtitle">Why SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym is needed?</div>
                <p>Life is always a struggle. Maybe small or maybe big. But you have to face it one day or other. And, whom should you rely on, in these difficult times?</p>
                <p>It is only your ‘swa’ or self who is 100% sure to be with you in tough situations.</p>
                <p>Therefore, SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym help you to help yourself!</p>
                <p>We teach and train you for all those small and big preparations needed to make a breakthrough! And we are with you 24x7, in your pocket!</p>
                <p>The way we teach and train you is not possible in schools or books because we offer the help tailor-made to match individual personalities, needs, pace of learning and way of learning!</p>

                <div class="page-subtitle">What does SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym offer?</div>
                <p>We, at, SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym provide many online and offline scientific tools for</p>
                <ol>
                    <li>Assessment of characteristics of one’s Brain and Mind functioning as well as the deficits.</li>
                    <li>Training sessions for day-to-day disturbances and requirements in personal, social, work life and relationships</li>
                    <li>In depth understanding and psychological solutions for all life-hurdles and developments.</li>
                </ol>
                <p>The tools we use are</p>
                <ol>
                    <li>Neuro feedback instruments</li>
                    <li>Biofeedback instruments</li>
                    <li>Brain Entrainment instruments</li>
                    <li>Mindfulness</li>
                    <li>Cognitive Behavioural Therapy techniques like CBT and REBT</li>
                    <li>Multiple Intelligence Theory</li>
                    <li>Life Skills training</li>
                    <li>Bibliotherapy</li>
                    <li>Art therapy</li>
                    <li>Cognitive development tools in the form of digital and analogue games</li>
                </ol>

                <div class="page-subtitle">How it works?</div>
                <p>SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym use a very intelligent way to asses which of our solutions match your current needs and expectations. So, you don’t have to worry regarding choosing from hundreds of our programs and tools.</p>
                <p>Just punch in few answers and we will present you exactly what you need!</p>
                <p>This menu is in the forms of</p>

                <ol>
                    <li>Neuro-psychological assessment</li>
                    <li>Self-help tools without personal guidance</li>
                    <li>Self-help programs with personal guidance</li>
                </ol>

                <p>Once you select your choice of programs from the presented menu, you can access those on any platform like Smartphone or laptop or PC, using your personal log in ID and password.</p>

                <p>The programs which include instruments, analogue games and physical materials will be available in our outlet centres as a walk-in facility whereas the online material you have subscribed to will be available to you all the time!</p>

                <p>Our Guided Self-help programs include facilities to communicate with expert Brain and Mind Gym coach. The coach will also review your practice and respond to your progress on the program you are using.</p>

                <div class="page-subtitle">Will it really help?</div>


                <p>SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA Brain and Mind Gym focuses on self-help with scientific and well proven tools like CBT, Mindfulness, Biofeedback, etc</p>
                <p>Online guided self-help is a well researched and found to be effective way for self development and change.</p>
                <p>Self-help method has been proved to be a useful tool for change because it incorporates development of motivation and personal efforts.</p>
                <p>The way we present the personalised solutions and access, boosts the utility and usability of our programs.</p>
                <p>And, on the top of these advantages, our expertise in development of the program content as well as individual support through guided self-help assures the desired outcome!</p>

                <div class="page-subtitle">How can I join?</div>

                <p>Click 'Online' button below and get access to the personalised menu selection!</p>

            </div>
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
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <a href="{{ url('happiness') }}" class="btn btn-primary btn-block">Online</a>
                        <div class="text-center mt-2">Programs over the Internet</div>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ url('offline') }}" class="btn btn-primary btn-block">Offline</a>
                        <div class="text-center mt-2">Programs over the Centers</div>
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
    })
</script>
@endsection
