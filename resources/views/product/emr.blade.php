@extends('layouts.default')

@section('title', 'SwaDocs (EMR)')

@section('content')
<div class="header-space" >
    <div class="container">
        <section class="section">
            <div class="page-title">SwaDocs (EMR)</div>
            <div class="section-content">
                <p>SwaDocs Electronic Medical Record (EMR) is a digital version of a patient’s paper chart. SwaDocs (EMR) are real-time, patient-centred records that make information available instantly and securely to authorized users. While an SwaDocs (EMR) does contain the medical and treatment histories of patients, an SwaDocs (EMR) system is built to go beyond standard clinical data collected in a provider’s office and can be inclusive of a broader view of a patient’s care. SwaDocs (EMR) are a vital part of health IT and can:</p>
                <ul>
                    <li>Contain a patient’s medical history, diagnoses, medications, treatment plans,  immunization dates, allergies, radiology images, and laboratory and test results</li>
                    <li>Allow access to evidence-based tools that providers can use to make decisions about a patient’s care</li>
                    <li>Automate and streamline provider workflow</li>
                </ul>
                <p>One of the key features of an SwaDocs (EMR) is that health information can be created and managed by authorized providers in a digital format capable of being shared with other providers across more than one health care organization. SwaDocs (EMR) are built to share information with other health care providers and organizations – such as laboratories, specialists, medical imaging facilities, pharmacies, emergency facilities, and school and workplace clinics – so they contain information from all clinicians involved in a patient’s care.</p>
                <div class="page-subtitle">Why did we created SwaDocs (EMR)?</div>
                <p>With an experience of 20 years, we understand every in and out of the angles related to SwaDocs (EMR). Whether it is a patient's angle or doctor’s angle, after trying and testing, upgrading and updating in multiple variations, we have specifically designed this SwaDocs (EMR) for Psychology.</p>
                <div class="page-subtitle">Key Features:</div>
                <ul>
                    <li>Automatic SMS Reminders to Patients</li>
                    <li>Easy and Simple view of Patient’s history</li>
                    <li>Auto Translate RX</li>
                    <li>Quick access to revenue and stock position</li>
                    <li>50% time reduced to repeat prescription</li>
                    <li>Easy recall of stored data for scientific paper presentation</li>
                    <li>Sharing records with patients</li>
                </ul>
                <p>As we understand, many SwaDocs (EMR) are the platform which is used universally depending upon profession to profession. But, this SwaDocs (EMR) is tailor-made and dedicated for Psychology.</p>
                <div class="page-subtitle">Why should you go for our SwaDocs (EMR)?</div>
                <ol>
                    <li>PsyHeal SwaDocs (EMR) is connected to UHID (Unique Health Identification) as well as UIDAI (Aadhar).</li>
                    <li>We are not just on the cloud. We believe in securing your patient data and we want you to own the data. You can store your data on the cloud as a backup but the local data will be stored on your server so that no one can access it apart from you.</li>
                    <li>PsyHeal SwaDocs (EMR) comes up with the unique feature of SnoMed CT.</li>
                    <li>We have pre-recorded therapies for psychology patients</li>
                    <li>We have an online program which interferes through SwaDocs (EMR) so that you can give it to your patients for the betterment of their mental health.</li>
                    <li>We have one platform of PsyHeal which clearly says Psychological heal, designed and crafted for people who really need a psychological consultation and psychological evaluator right next to them on their phone.</li>
                </ol>
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
                            <source src="./assets/coming.mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <div class="img-slider">
                            <div class="img-slider-item">
                                <div class="img-slider-content">
                                    <div class="card mb-0">
                                        <img class="img-fluid border-rounded" src="./assets/img/emr/1.gif" />
                                    </div>
                                    <!-- <div class="img-caption">2 level selection lists for clinical notes:</div> -->
                                </div>
                            </div>
                            <div class="img-slider-item">
                                <div class="img-slider-content">
                                    <div class="card mb-0">
                                        <img class="img-fluid border-rounded" src="./assets/img/emr/2.gif" />
                                    </div>
                                    <!-- <div class="img-caption">Basic assessments can be done by assistant without access to details of patients clinical notes.</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-content">
                <div class="row justify-content-center">
                    <div class="col-sm-3">
                        <a href="./assets/download/EMR_Document.pdf" target="_blank" class="btn btn-primary btn-block">Download Now</a>
                    </div>
                    <div class="col-sm-3">
                        <button data-toggle="modal" data-target="#emr_modal" class="btn btn-primary btn-block">Buy SwaDocs (EMR)</button>
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
        $(".img-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button class="img-slider-nav img-slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button class="img-slider-nav img-slick-next"><i class="fa fa-angle-right"></i></button>',
        })
    })
</script>
@endsection
