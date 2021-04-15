@extends('layouts.default')

@section('title', 'SwaTele')

@section('content')
<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="page-title">SwaTele</div>
            <div class="section-content">
                <p><b class="text-primary">SwaTele</b> is designed for Psychiatric services over the Telephone.</p>
                <p>In today’s era, we have less number of Psychiatrists than what one need. And, in most of the cases, even the geographical barrier has created a big trouble.</p>
                <p>To cater and solve this purpose, we have come up with the SwaTele Application which one Psychiatrist can give to his patients for further OPD services sitting back home over the Internet. Where one can save time and money for the travelling and repeated consultations. </p>
                <p>Through SwaTele, We, Offer the value-based care goals of patient engagement, expanded hours for care, care coordination and time, cost effectiveness in health management.</p>
                <p>SwaTele connects Psychiatrists, Psychotherapists, Physicians, Pharmacists and the Clients. </p>
                <div class="page-subtitle">Features:</div>
                <ul>
                    <li>A telemedicine tool integration for EzeeMedNote (Electronic Medical Record system by Swa.tantraa)</li>
                    <li>Compliant with Indian telemedicine guidelines</li>
                    <li>Offers secure access to the electronic health record of the clients on the go</li>
                    <li>Updated Case paper for clients with important history and progress notes in their pockets</li>
                    <li>Clients and physicians can record their own findings and reports to make available for the consultant.</li>
                    <li>Facility to take appointments and make advance payments digitally</li>
                    <li>Clients get real time prescription readily in their app and can choose pharmacy for the home delivery of the prescription</li>
                </ul>
                <div class="page-subtitle">Steps to Use SwaTele:</div>
                <ol>
                    <li>User can download the SwaTele App from Google Play Store and Sign Up for Free.</li>
                    <li>Use the code provided by your Psychiatrist to login</li>
                    <li>Fill up the form and create an appointment. Select the available time slot to connect for the online session </li>
                    <li>Connect over a video call and share the details with your Psychiatrist</li>
                    <li>Keep a track of your Medical Session by accessing History section</li>
                    <li>Track Follow up notes. Check Prescription</li>
                    <li>Check Illness Severity and Anxiety level by answering the questions.</li>
                </ol>
                <p class="mt-5 text-center">
                    <a target="_blank" href="https://play.google.com/store/apps/details?id=com.in.psytele&hl=en_IN" class="btn btn-primary pl-5 pr-5">Download Now</a>
                    <br />
                    <span class="text-center"><small>Available only on playstore</small></span>
                </p>
                <div class="card shadow">
                    <div class="card-body">
                        <p><i>Note:</i></p>
                        <ol class="mb-0">
                            <li>This App is only accessible for patients who have access code given by the doctor. Download only, if your doctor has prescribed the same.</li>
                            <li>Are you a Doctor? Grab our EMR tool now! <a href="{{ url('emr') }}"><b class="text-primary">Click Here</b></a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="section-title no-decoration"><small>Play Video To Know More</small></div>
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
                            <source src="./assets/vid.mp4" type="video/mp4">
                        </video>
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
