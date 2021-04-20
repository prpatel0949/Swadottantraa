@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <section class="section-hero" id="home" style="background-image: url(./assets/img/bg.png)">
        <div class="container">
            <div class="hero-content row align-items-center vh-100">
                <div class="col-sm-8">
                    <div class="hero-title">
                        Welcome to Swa<span class="text-primary"><small class="logo-dot-hero"><i class="fa fa-circle"></i></small></span>Tantraa
                    </div>
                    <div class="hero-subtitle">
                        The Difference between who you are and who you want to be is what you do. Work on yourself and the rest will follow!
                        <br />
                        At <b>SWA</b> (<i>self</i>) <b>DOT</b> (<i>digital</i>) <b>TANTRAA</b> (<i>techniques</i>), we help you, to help yourself!
                    </div>
                </div>
                <div class="col-sm-4 sm-align-self-start">
                    <a class="video-button ml-auto mr-auto posrel open_wellness_modal" data-backdrop="static">
                        <div class="bg-layer-1"></div>
                        <div class="bg-layer-2"></div>
                        <div class="icon-layer"><i class="fa fa-play"></i></div>
                        <img class="check_img" src="{{ asset('assets/img/check.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-about" id="about">
        <div class="container">
            <div class="card shadow">
                <div class="card-body">
                    <div class="section-title">
                        About <span class="text-primary">Us</span>
                    </div>
                    <div class="section-content">
                        <p>
                        <b class="text-primary">SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA WELLNESS PVT LTD</b> provides comprehensive solutions for mental wellbeing. SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA means self-help for wellbeing with the help of technological tools. It is a beacon of light and trusted friend for those with wellness concerns. At SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA we have experts with more than 25 years of experience in providing  mental health and wellness with psycho-social modalities. Our expertise lies not only in treatment of mental illness, but also in preventive and positive mental health.
                        </p>
                        <!-- <p>Established in 2018, <b class="text-primary">Swa <small class="logo-dot-text"><i class="fa fa-circle"></i></small> Tantraa</b> provides comprehensive solutions for mental wellbeing. SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA means self-help regarding wellbeing with the help of technological tools.</p>
                        <p>It is beacon of light and trusted friend for those with mental health concerns. Mental health is just as important as one's physical health and yet, most of us are not mindful about the quality of our life. At SWA <small class="logo-dot-text"><i class="fa fa-circle"></i></small> TANTRAA we have experts with 25 years of experience in treating mental health and related issues with psycho-social modalities. Our expertise lies not only in treatment of mental illness, but also preventive and positive mental health.</p> -->
                    </div>
                    <a href="{{ url('about-us') }}" class="btn btn-primary about-btn">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-what-we-offer">
        <div class="container">
            <div class="section-title">
                What We <span class="text-primary">Offer</span>?
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-sm-9 text-center">
                        We Offer multiple Products and Services for Individuals, Institutes and Healthcare Professionals. Kindly check below what suits you the most.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-who-am-i" id="product">
        <div class="container">
            <div class="section-title no-decoration">
                Who <span class="text-primary">I</span> am<span class="text-primary"> ..</span>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-sm-9 text-center">
                        <div class="product-filters">
                            <div class="product-filter-item" data-filter-target=".section-product" data-filter="#sf,#bamg,#ph">
                                <div class="img-wrapper">
                                    <img src="{{ asset('assets/img/User.png') }}">
                                </div>
                                <div>An Individual</div>
                            </div>
                            <div class="product-filter-item" data-filter-target=".section-product" data-filter="#ph,#bamg">
                                <div class="img-wrapper">
                                    <img src="{{ asset('assets/img/Institute.png') }}">
                                </div>
                                <div>An Institute</div>
                            </div>
                            <div class="product-filter-item" data-filter-target=".section-product" data-filter="#emr,#pt,#bamg">
                                <div class="img-wrapper">
                                    <img src="{{ asset('assets/img/Doctor.png') }}">
                                </div>
                                <div>A Doctor</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="d-flex flex-column">
        <section class="section section-product" id="bamg">
            <div class="container">
                <div class="card shadow card-onhover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 product-desc text-justify">
                                <div class="page-title">Brain and Mind Gym</div>
                                <p>Swa <small class="logo-dot-text"><i class="fa fa-circle"></i></small> Tantraa’s <b class="text-primary">Brain & Mind Gym</b> is an International class emotional wellness development solution compliant to WHO & Other international standards and Indian Healthcare IT Standards. Adopting this solution will not only help the organizations to form a conducive and quality environment for the human resource but also will establish the fact that the organization is progressive who understands the importance of emotional well-being of the people.</p>
                                <a href="{{url('brain-and-mind-gym')}}" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="col-sm-4 product-img">
                                <img src="{{ asset('assets/img/bamg.gif') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-product" id="ph">
            <div class="container">
                <div class="card shadow card-onhover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 product-desc text-justify order-2">
                                <div class="page-title">SwaHeal</div>
                                <p><b class="text-primary">SwaHeal</b> is a unique mobile app for Emotional First Aid developed by experienced and qualified mental health professionals.</p>
                                <p>Emotional First Aid is like Physical First Aid. We use and apply first aid measures like bandages, ointments, etc to protect further damage to health in case of injuries. If we fail to develop, maintain and strengthen our emotional health, we are likely to suffer from a lower quality of life. So, we must have some handy, easy yet effective psychological measures in case of day-to- day emotional injuries like frustrations, failures, stress, worries, rejections, anger, loss etc.</p>
                                <a href="{{ url('psyheal') }}" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="col-sm-4 product-img">
                                <img src="{{ asset('assets/img/ph.gif') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-product" id="emr">
            <div class="container">
                <div class="card shadow card-onhover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 product-desc text-justify">
                                <div class="page-title">SwaDocs (EMR)</div>
                                <p>An <b class="text-primary">Electronic Medical Record (EMR)</b> is a digital version of a patient’s paper chart. SwaDocs (EMR) are real-time, patient-centred records that make information available instantly and securely to authorized users. While an SwaDocs (EMR) does contain the medical and treatment histories of patients, an SwaDocs (EMR) system is built to go beyond standard clinical data collected in a provider’s office and can be inclusive of a broader view of a patient’s care. SwaDocs (EMR) are a vital part of health IT and can:.</p>
                                <a href="{{ url('emr') }}" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="col-sm-4 product-img">
                                <img src="{{ asset('assets/img/ehr.gif') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-product" id="pt">
            <div class="container">
                <div class="card shadow card-onhover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 product-desc text-justify order-2">
                                <div class="page-title">SwaTele</div>
                                <p>Erase the distance and create the trust!</p>
                                <p>Through <b class="text-primary">SwaTele</b>, We Swa <small class="logo-dot-text"><i class="fa fa-circle"></i></small> Tantraa, Offer the value-based care goals of patient engagement, expanded hours for care, care coordination and time, cost effectiveness in health management..</p>
                                <p> <b class="text-primary">SwaTele</b> connects Psychiatrists, Psychotherapists, Physicians, Pharmacists and the Clients.</p>
                                <a href="{{ url('psytele') }}" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="col-sm-4 product-img">
                                <img src="{{ asset('assets/img/pt.gif') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-product" id="sf">
            <div class="container">
                <div class="card shadow card-onhover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 product-desc text-justify">
                                <div class="page-title">Selfie</div>
                                <p>If a person wishes to engender self-improvement, he or she must seek an authentic conversation with the self. With <b class="text-primary">SELFIE</b> you can use the lens of your hearts to see the state of your souls.</p>
                                <p>A self‐evaluation is a great opportunity for everybody to honestly and objectively consider and document their status.</p>
                                <p>Properly conducting a self‐evaluation can make the difference between a meaningful evaluation and one that is less effective.</p>
                                <a href="{{ url('selfie') }}" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="col-sm-4 product-img">
                                <img src="{{ asset('assets/img/sf.gif') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="section section-product" id="pat">
            <div class="container">
                <div class="card shadow card-onhover">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 product-desc text-justify order-2">
                                <div class="page-title">Psychometric Assessment Test</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore etdolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamcolaboris nisi utaliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptatevelit esse cillumdolore eu fugiat nulla pariatur.</p>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deseruntmollit anim id estlaborum.</p>
                                <a href="{{ url('psychometric-assessment-test') }}" class="btn btn-primary">Read More</a>
                            </div>
                            <div class="col-sm-4 product-img">
                                <img src="{{ asset('assets/img/coming.jpg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    </div>

    <section class="section section-testimonial" id="testimonial">
        <div class="container">
            <div class="section-title">
                Testimonials
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card shadow mb-5">
                            <div class="card-body img-slider-flipper">
                                <div class="img-slider-flipper-title section-title no-decoration">
                                    What Our Clients Say
                                </div>
                                <div class="img-slider testimonial-slider">
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>I am very satisfied with the services here. I am changing my thought process for the better and I have learned strategies to better cope with my stress.<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Mr Shreedhar N</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>I will have to say that coming to the Brain &amp; Mind Gym has been awesome; my life has been so good since I have started to come here. I have learned how to deal with stress and how to handle tough problems. I learned not to let people bother me and to just move on with life.<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Ms Gargi P</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>I feel much better after my guided self-help sessions. It is vital to take care of oneself and I am learning to do just that. Theses sessions allow me to go deeper into self-examination and use the necessary tools to continue that sense of well-being.<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Mr Rujul A.</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>I can’t believe where I am now compared to few months ago.  My business is thriving, I have just started a new relationship and my confidence is growing daily<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Mr Anonymous</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>An admirable project for mind-cultivation!<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Ms Karanjkar S</div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow mb-5">
                            <div class="card-body img-slider-flipper">
                                <div class="img-slider-flipper-title section-title no-decoration">
                                    What Our Institutes Say
                                </div>
                                <div class="img-slider testimonial-slider">
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>It is an awesome blend of thoughtful techniques and digital technology for emotional wellness!<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Ms Smita Godase, SAA, Pune</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>Our institute, Yashashree academy had a wonderful collaboration with the Swa dot Tantraa Wellness. They strived to understand our goals and customized their program to meet the needs of our Institute. Their content experts were friendly, outgoing and compassionate which provided an encouraging and supportive experience to program participants. We look forward to working with Swa dot Tantraa Wellness in the future to further support the emotional and mental well-being of our institute.<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Mr Kiran Bhosle, Yasharee Academy</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow">
                            <div class="card-body img-slider-flipper">
                                <div class="img-slider-flipper-title section-title no-decoration">
                                    What Our Doctors Say
                                </div>
                                <div class="img-slider testimonial-slider">
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>SwaDocs and its Tele-mental Health feature (SwaTele) helped me a lot to provide my clients in rural areas the much needed easy access to mental health services.<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Dr Nikam C</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>SwaDocs and SwaTele are extremely advanced yet very easy to use facilities for doctors who wish to provide authentic tele-medicine services in India!<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Geetanjali Hospital</div>
                                    </div>
                                    <div class="img-slider-item">
                                        <div class="img-slider-content">
                                            <p><big>“</big>The SwaDocs software is amazing. It provides comprehensive solution for clinic management including appointment scheduling, online appointment management, patient records management, lab-reports, billing and prescriptions. Their support system is also very good. This is one software which I would recommend to every doctor to manage his or her practice<big>”</big></p>
                                        </div>
                                        <div class="img-slider-author">Dr Suhas P</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-social">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-3">
                            <a class="social-item facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="col-3">
                            <a class="social-item instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                        <div class="col-3">
                            <a class="social-item twitter"><i class="fa fa-twitter"></i></a>
                        </div>
                        <div class="col-3">
                            <a class="social-item youtube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-map">
        <div class="container">
            <div id="" class="contact-map">
                <img class="img-fluid" src="./assets/img/map.png" alt="">
            </div>
        </div>
    </section>

    <section class="section section-contact-us" id="contact">
        <div class="container">
            <div class="section-title">Contact <span class="text-primary">Us</span></div>
            <div class="section-content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card shadow h-100">
                            <div class="card-body h-100 contact-form-card">
                                <p class="text-center pt-3 pb-3">We <i class="fa fa-heart text-danger"></i> hearing our visitors. Feel free toshare your queries/thoughts.</p>
                                <form action="{{ route('contact.us') }}" method="post" id="contact_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Name <i class="text-danger">*</i></label>
                                                <input type="text" name="name" class="form-control" placeholder="Name">
                                                <span class="text-danger name_error contact-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Email ID <i class="text-danger">*</i></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email ID">
                                                <span class="text-danger email_error contact-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Contact Number</label>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="code">
                                                            <option value="+91">+91</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="number" class="form-control"
                                                            placeholder="Contact Number">
                                                            <span class="text-danger number_error contact-error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Who I am ..</label>
                                                <select class="form-control" name="type">
                                                    <option value=""> - Select - </option>
                                                    <option value="0">Individual</option>
                                                    <option value="1">Institute</option>
                                                    <option value="2">Doctor</option>
                                                </select>
                                                <span class="text-danger type_error contact-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="">Message</label>
                                                <textarea name="message" id="" rows="4" class="form-control"></textarea>
                                                <span class="text-danger message_error contact-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" >Submit</button>
                                </form>
                            </div>
                            <div class="card-body contact-form-message h-100" style="display: none">
                                <div class=" d-flex align-items-center justify-content-center h-100">
                                    <div class="text-center">
                                        <b class="text-success">Thanks!</b> We appreciate that you’ve taken the time to write to us. We’ll get back to you very soon. Please come back and see us often.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-lg-0 mt-4">
                        <div class="card shadow h-100">
                            <div class="card-body h-100">
                                <div class="d-flex flex-column justify-content-between h-100">
                                    <div class="d-flex align-items-center">
                                        <div class="contact-icon"><i class="fa fa-map-marker"></i></div>
                                        <div class="contact-detail">
                                            <div class="mb-2"><b>Head Office :</b> Bestla Industries Private Limited, Level 1, Lane 1, NDA Pashan Link Road, Bavdhan, Pune - 411021</div>
                                            <div><b>Research Unit :</b> Rukminikunj <br> 599, Guruwar Peth, Satara 415002</div>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="contact-icon"><i class="fa fa-clock-o"></i></div>
                                        <div class="contact-detail">Mon.-Fri.: 10.00 AM to 7.00 PM <br> Sat - Sun : Closed</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="contact-icon"><i class="fa fa-phone"></i></div>
                                        <div class="contact-detail">+91 (0)20 2295 1919 | +91 (2162) 228201</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="contact-icon"><i class="fa fa-envelope-o"></i></div>
                                        <div class="contact-detail">info@swadottantraa.com</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="contact-icon"><i class="fa fa-android"></i></div>
                                        <div class="contact-detail">
                                            Playstore profile - <b><a target="_blank" href="https://play.google.com/store/apps/developer?id=Swa.Tantraa+Wellness+Pvt+Ltd&hl=en_IN">click here</a></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="wellness_av" data-backdrop="static">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content" style="box-shadow: 0 0 0 0 transparent; background: transparent; border: 0;">
                <div class="model-body text-center">
                    <img style="width: 400px; max-width: 100%;" src="./assets/av.gif" alt="" />
                </div>
            </div>
        </div>
	</div>

    <div class="modal fade" id="wellness_modal" data-backdrop="static">
		<div class="modal-dialog  modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header align-items-center" style="padding-top: 0; padding-bottom: 0;">
					<img src="{{ asset('assets/av1.gif') }}" style="width: 40px; margin-right: 10px;border-radius: 50%;" />
					<h5 class="modal-title">WELLNESS STATUS <span class="question_count" style="display: none">(<span class="question_number"></span> out of 5)</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="chat_window_wrapper" id="chat_window_wrapper">
						<div class="chat_window">
						</div>
					</div>
					<div class="chat_replay">
					</div>
					<div class="chat_note">Single star represents Minimum & 5 star represents the Maximum rating.</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js')
<script>
    $(function () {
        $("#contact_form").submit(function (e) {
			e.preventDefault()
            $.ajax({
                url: '{{ route("contact.us") }}',
                method: 'POST',
                data : $(this).serialize(),
                success: function (res) {
                    $(".contact-form-card").hide();
			        $(".contact-form-message").fadeIn();
                }, error: function (err) {
                    $('.contact-error').html('');
                    if(err.status == 422) {
                        $.each(err.responseJSON.errors, function (key, value) {
                            console.log(value)
                            $('.' + key + '_error').html(value[0]);
                        })
                    }
                }
            });
		})
    })

    $(".img-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button class="img-slider-nav img-slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="img-slider-nav img-slick-next"><i class="fa fa-angle-right"></i></button>',
    })

    $("[data-scroll-to]").click(function (e) {
        e.preventDefault();
        var element = $(this).data('scroll-to');
        $('html, body').animate({
            scrollTop: $("#" + element).offset().top - 100
        }, 1000);
    });

    $("[data-filter]").click(function () {
        $("[data-filter]").removeClass('active');
        $(this).addClass('active');
        var parent_class = $(this).data('filter-target');
        var items_str = $(this).data('filter');
        var items = items_str.split(',');
        $(parent_class).hide()
        if (items.length > 0) {
            items.map(function (item, index) {
                $(item).removeClass('order-1 order-2 order-3 order-4 order-5 order-6');
                $(item).addClass('order-' + (index + 1));
                $(item).fadeIn();

                $(item).find('.product-desc').removeClass('order-2')
                if (index % 2 != 0) {
                    $(item).find('.product-desc').addClass('order-2')
                }
            });
        }
    });

    const ChatPlugin = {
		element: "",
		questions: {},
		question: "",
		options: [],
		result: [],
		temp: {},
		replay: [],
		score: 0,
		elem: document.getElementById('chat_window_wrapper'),
		interval: 100,
		note: '',
		init(element, data) {
			$(".chat_note").hide()
			this.score = 0
			element.empty()
			$(".chat_replay").empty()
			this.element = element
			this.questions = data.questions
			this.replay = data.replay
			this.note = data.note
			var question_id = 0
			if (data.initialQuestion) { question_id = data.initialQuestion }
			this.setQuestion(question_id)
		},
		setQuestion(question_id) {
			if (this.questions[question_id]) {
				var data = this.questions[question_id]
				if (data.type && data.type == 'array') {
					this.temp.question = this.question = data.question
					this.options = data.options
					this.addQuestion('array')
				} else {
					this.temp.question = this.question = data.question
					this.options = data.options
					this.addQuestion()
				}
			} else {
				console.log("No More Questions!")
			}
		},
		addQuestion(type = '') {
			if (this.interval == 100) {
				this.interval = 3000
				var typing = true;
				this.addQuestion(type)
				setTimeout(function () {
					this.element.append(`<div class="msg_received typing">typing...</div>`)
					this.elem.scrollTop = this.elem.scrollHeight;
				}.bind(this), 1000)
			} else {
				if (type && type == 'array') {
					var key = 0;
					var que_int = setInterval(function () {
						$(".msg_received.typing").remove()

						if (this.question.length > 0 && key < this.question.length) {
							var question = this.question[key++]
							if (question == '###score###') {
								question = 'Your Score is ' + this.score
								var html = `<div class="msg_received">${question}</div>`
								this.element.append(html)
								this.setFinish()
							} else {
								var html = `<div class="msg_received">${question}</div>`
								this.element.append(html)
							}
							this.elem.scrollTop = this.elem.scrollHeight;
							// this.addOptions()
							if (key >= this.question.length) {
								this.addOptions('text')
								clearInterval(que_int)
							} else {
								setTimeout(function () {
									this.element.append(`<div class="msg_received typing">typing...</div>`)
									this.elem.scrollTop = this.elem.scrollHeight;
								}.bind(this), 1000)
							}
						}					}.bind(this), this.interval + 1000)
				} else {
					setTimeout(function () {
						$(".msg_received.typing").remove()
						if (this.question) {
							var html = `<div class="msg_received">${this.question}</div>`
							this.element.append(html)
							this.elem.scrollTop = this.elem.scrollHeight;
							this.addOptions()
						}
					}.bind(this), this.interval)
				}
			}

		},
		addOptions(type = '') {
			if (this.options && this.options.length > 0) {
				this.options.forEach(function (item, index) {
					var next = ""
					if (item.next) {
						next = `data-question="${item.next}"`
					}
					var replay = ``
					if (item.replay && item.replay != '') {
						replay = `data-replay="${item.replay}"`
					}
					if (type && type == 'text') {
						var html = `<div ${next} ${replay} data-text="${item.answer}" class="chat_option">${item.answer}</div>`
					} else {
						var html = `<img ${next} ${replay} data-text="${item.answer}" src="./assets/img/${item.answer}.png" />`
						$(".chat_note").show()
					}
					$(".chat_replay").append(html)
					this.elem.scrollTop = this.elem.scrollHeight;
				}.bind(this))
				var _this = this
				$(".chat_replay img, .chat_option").click(function () {
					$(".chat_note").hide()
					$(".chat_replay").empty()
					_this.temp.answer = $(this).data('text')
					if (typeof (_this.temp.answer) != 'string') {
						_this.score += _this.temp.answer
					}
					_this.result.push(_this.temp)
					_this.temp = {}
					_this.addReplay($(this).data('text'))
					setTimeout(function () {
						if ($(this).data('question')) {
							_this.element.append(`<div class="msg_received typing">typing...</div>`)
							_this.elem.scrollTop = _this.elem.scrollHeight;
							if ($(this).data('replay')) {
								_this.setReplay($(this).data('replay'), $(this).data('question'))
							} else {
								_this.setQuestion($(this).data('question'))
							}
						} else {
							if ($(this).data('replay')) {
								_this.element.append(`<div class="msg_received typing">typing...</div>`)
								_this.elem.scrollTop = _this.elem.scrollHeight;
								_this.setReplay($(this).data('replay'))
							}
							_this.setFinish()
						}
					}.bind(this), 1000)

				})
			}
		},
		setReplay(replay, question = '') {
			setTimeout(function () {
				$(".msg_received.typing").remove()
				this.element.append(`<div class="msg_received">${replay}</div>`)
				this.elem.scrollTop = this.elem.scrollHeight;

				setTimeout(function () {
					$(".msg_received.typing").remove()
					if (question) {
						this.element.append(`<div class="msg_received typing">typing...</div>`)
						this.elem.scrollTop = this.elem.scrollHeight;
						this.setQuestion(question)
					}
				}.bind(this), 1000)

			}.bind(this), this.interval)
		},
		addReplay(answer) {
			html = `<div class="msg_sent">`;
			if (answer > 0) {
				for (var i = 0; i < answer; i++) {
					html += `<i class="fa fa-star text-warning ml-1 mr-1"></i>`
				}
			} else if (typeof (answer) == 'string') {
				html += answer
			}
			html += `</div>`;
			this.element.append(html)
		},
		setFinish() {
			this.elem.scrollTop = this.elem.scrollHeight;
			if (this.score > 0) {
				setTimeout(function () {
					this.element.append(`<div class="msg_received typing">typing...</div>`)
					this.elem.scrollTop = this.elem.scrollHeight;
					setTimeout(function () {
						Object.keys(this.replay).forEach((key) => {
							var limit = key.split('_')
							var result = ""
							if (this.score >= limit[0] && this.score <= limit[1]) {
								$(".msg_received.typing").remove()
								this.element.append(`<div class="msg_received">${this.replay[key].replay}</div>`)
								this.elem.scrollTop = this.elem.scrollHeight;
							}
						})
						setTimeout(function () {
							this.element.append(`<div class="msg_received typing">typing...</div>`)
							this.elem.scrollTop = this.elem.scrollHeight;
							setTimeout(function () {
								$(".msg_received.typing").remove()
								this.element.append(`<div class="msg_received">${this.note}</div>`)
								this.elem.scrollTop = this.elem.scrollHeight;
								setTimeout(function () {
									// $("#wellness_modal").modal('hide')
								}, 10000)
							}.bind(this), this.interval)
						}.bind(this), 1000)
					}.bind(this), this.interval)
				}.bind(this), 1000)
			} else {
				setTimeout(function () {
					// $("#wellness_modal").modal('hide')
				}, 10000)
			}
		}

	}

    $(function () {

		var chat_questions = {
			0: {
				id: 0,
				type: "array",
				question: [
					"Hello!",
					"How are you?",
					"Let us measure your Wellness!"
				],
				option_type: "text",
				options: [
					{ next: 1, answer: "Sure" },
					{ answer: "Maybe Later", replay: "Thank you for your time. Enjoy scrolling our website" },
				]
			},
			1: {
				id: 1,
				question: "How much do you feel satisfied with and enthusiastic in work, earning, family and social situations?",
				options: [
					{ next: 2, answer: "1", replay: "Uh-huh, <br/>Let us know about your mental and physical exercises through next question." },
					{ next: 2, answer: "2", replay: "Well, <br/>Let us know about your mental and physical exercises through next question." },
					{ next: 2, answer: "3", replay: "Alright, <br/>Let us know about your mental and physical exercises through next question." },
					{ next: 2, answer: "4", replay: "Okey, <br/>Let us know about your mental and physical exercises through next question." },
					{ next: 2, answer: "5", replay: "Mh-hmm, <br/>Let us know about your mental and physical exercises through next question." },
				]
			},
			2: {
				id: 2,
				question: "How much do you daily engage in physical exercise as well as challenges for your brain and mind?",
				options: [
					{ next: 3, answer: "1", replay: "Uh-huh, <br/>Now the next question is regarding your inner world." },
					{ next: 3, answer: "2", replay: "Well, <br/>Now the next question is regarding your inner world." },
					{ next: 3, answer: "3", replay: "Alright, <br/>Now the next question is regarding your inner world." },
					{ next: 3, answer: "4", replay: "Okey, <br/>Now the next question is regarding your inner world." },
					{ next: 3, answer: "5", replay: "Mh-hmm, <br/>Now the next question is regarding your inner world." },
				]
			},
			3: {
				id: 3,
				question: "How much do you love yourself knowing the good, the bad and imperfect sides of yours?",
				options: [
					{ next: 4, answer: "1", replay: "Uh-huh, <br/>Lastly, we will have a look in your wellness-time." },
					{ next: 4, answer: "2", replay: "Well, <br/>And now we will ask you about your outlook towards life." },
					{ next: 4, answer: "3", replay: "Alright, <br/>And now we will ask you about your outlook towards life." },
					{ next: 4, answer: "4", replay: "Okey, <br/>And now we will ask you about your outlook towards life." },
					{ next: 4, answer: "5", replay: "Mh-hmm, <br/>And now we will ask you about your outlook towards life." },
				]
			},
			4: {
				id: 4,
				question: "How much do you feel that you have got some direction and purpose in living, even during the times of adversities?",
				options: [
					{ next: 5, answer: "1", replay: "Uh-huh, <br/>Lastly, we will have a look in your wellness-time." },
					{ next: 5, answer: "2", replay: "Well, <br/>Lastly, we will have a look in your wellness-time." },
					{ next: 5, answer: "3", replay: "Alright, <br/>Lastly, we will have a look in your wellness-time." },
					{ next: 5, answer: "4", replay: "Okey, <br/>Lastly, we will have a look in your wellness-time." },
					{ next: 5, answer: "5", replay: "Mh-hmm, <br/>Lastly, we will have a look in your wellness-time." },
				]
			},
			5: {
				id: 5,
				question: "How much regular time do you take for personal review, relaxation and development?",
				options: [
					{ next: 6, answer: "1" },
					{ next: 6, answer: "2" },
					{ next: 6, answer: "3" },
					{ next: 6, answer: "4" },
					{ next: 6, answer: "5" },
				]
			},
			6: {
				id: 0,
				type: "array",
				question: [
					"###score###",
				],
			}
		}
		var score_replay = {
			"0_15": {
				replay: "Needs Serious Attention: Looks like serious compromises in health and happiness. Work with qualified professionals to achieve wellness."
			},
			"16_20": {
				replay: "Needs Improvement: Make some specific changes and you will be enjoying a true happiness in life."
			},
			"21_25": {
				replay: "Admirable: You should never stop. Continue to enjoy and upgrade your healthy lifestyle"
			}
		}
		var wellness_note = "Note: Your score should not in anyway interfere with the recommendation made by qualified medical professional, which may be specific to your health condition."
		$(document).on("click", ".open_wellness_modal", function () {			$("#wellness_av").modal('show')

			setTimeout(function () {
				$("#wellness_av").modal('hide')

				ChatPlugin.init($(".chat_window"), {
					questions: chat_questions,
					replay: score_replay,
					note: wellness_note,
					initialQuestion: 1
				})

			}, 9000)

			setTimeout(function () {

				$("#wellness_modal").modal('show')

			}, 9500)
		})	})
</script>
@endsection
