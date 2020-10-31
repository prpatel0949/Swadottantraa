@extends('layouts.default')

@section('title', 'Brain and Mind Gym')

@section('content')
<div class="header-space">
    <div class="container">
        <section class="section">
            <div class="page-title">Brain and Mind Gym</div>
            <div class="section-content">
                <p>Brain and Mind Gym is a set of scientifically designed, enjoyable and enriching programs for
                    people from all walks of life. Supported by vast and varied clinical research. Our thoughtfully
                    designed activities promote improved health, greater sense of well-being, higher productivity,
                    and enrichment in relationships and help in leading a meaningful life.</p>
                <p>It is useful for all as being students, employees, professionals, executives, businessmen, house
                    managers or retired individuals, and are thoughtfully designed to promote improved health,
                    greater sense of well-being, higher productivity, and enrichment in relationships and help in
                    leading a meaningful life. These programs have also been proven effective to enhance an
                    individual’s performance and achieving set goals be it at work or in personal life.</p>
                <p>Our offerings use scientific tools and components from various healing therapies such as,</p>
                <ul>
                    <li>Yoga Mindfulness</li>
                    <li>Emotional Intelligence Bibliotherapy</li>
                    <li>Behaviour Management Cognitive Exercises</li>
                    <li>Biofeedback Stress Management</li>
                    <li>Neuro feedback Music & Art Therapy</li>
                    <li>Multiple Intelligence</li>
                    <li>Aerobics Psychological Games</li>
                </ul>
                <p>We have tools like</p>
                <ul>
                    <li>Games</li>
                    <li>Digital instruments</li>
                    <li>Self-rating tests</li>
                    <li>Standardised Questionnaires</li>
                </ul>
                <p>to understand one’s emotional, physiological, and behavioural and brain functioning as well as
                    capabilities.</p>
                <ul>
                    <li>Moods,</li>
                    <li>Body symptoms,</li>
                    <li>Stress causing medical problems like hypertension, diabetes, heart diseases etc.</li>
                    <li>Behavioural problems like anger, addictions, lack of motivation, postponing, etc.</li>
                    <li>Memory</li>
                    <li>Concentration</li>
                    <li>various skills and aptitudes</li>
                    <li>Personality traits, and more like this of any individual.</li>
                </ul>
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
