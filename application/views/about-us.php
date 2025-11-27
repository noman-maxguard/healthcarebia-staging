<!doctype html>

<html lang="en">

<head>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.healthcarebia.ae/" },
    { "@type": "ListItem", "position": 2, "name": "About Us", "item": "https://www.healthcarebia.ae/about-us" }
  ]
}
</script>
    <?php include 'includes/inc_head_tag.php'; ?>
    <style>
        body{
            overflow-x: hidden;
        }
        .gap{
        margin-top:60px;
        }
        @media (max-width: 767.98px) {
            #counters_3 .row,
            .about-pra .row,
            .section-gap .row > .col-lg-10 > .row {
                margin-left: 0;
                margin-right: 0;
            }
            .gap{
                margin-top:30px;
            }
        }
        
    </style>
</head>

<body>

<?php include 'includes/inc_header.php'; ?>


<!--======== banner ======-->

<div class="mob-inner-banner" style="background-image: url(<?= base_url() ?>assets/frontend/img/about-banner-mob.webp);">

    <section class="sub-banner" style="background-image: url(<?= base_url() ?>assets/frontend/img/about-banner.webp);">

        <div class="overlay">

            <div class="container">

                <div class="row">

                    <div class="col-12"><h2>About Us</h2>

                        <nav aria-label="breadcrumb">

                            <ul class="breadcrumb">

                                <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>

                                <li class="active" aria-current="page">About Us</li>

                            </ul>

                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

<section class="section-gap">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10 text-center about-pra"><h4 class="mb-0">About</h4>

                <h2 class="text-center">Healthcarebia</h2>

                <p class="text-center">Healthcarebia is the GCC’s first concierge wellness service, merging luxury, diagnostics and rejuvenation with privacy and precision delivered right to your doorstep. All patient records are securely stored on DHA-approved servers and seamlessly linked to the Dubai Health Authority for real-time oversight, so your data is always safe.</p>
                <p class="text-center">We prioritize personalized care, providing dedicated attention and an unwavering commitment to client satisfaction. From your very first contact through to the completion of every service, we focus on delivering the highest quality of treatment. Every procedure follows strict DHA safety protocols, no dangerous practices, only physician-prescribed care you can trust.</p>
                <p class="text-center">Our experienced nurses are driven by a passion for healing, always putting you first while maintaining the utmost professionalism. They possess an innate gift for caring, which we continually nurture through specialized training and support from our dedicated clinical team. With a genuine desire to help, our nurses embody the essence of compassionate healthcare at Healthcarebia.</p>
                <a class="primary-btn hvr-bounce-to-right green-btn mt-2" href="https://wa.me/971547077476">
                    Request a Call Back
                </a>
            </div>
            <div class="col-lg-10 section-gap" id="counters_3">

                <div class="row">

                    <div class="col-md-3 col-6">

                        <div class=" about-counter text-center same"><img src="<?= base_url() ?>assets/frontend/img/custom-made.svg" alt="Happy Client">

                            <div class="counter-box"><span class="counter" data-TargetNum="1" data-Speed="1000">1</span><i>K+</i>

                                <h6>Happy Clients</h6></div>

                        </div>

                    </div>

                    <div class="col-md-3 col-6">

                        <div class=" about-counter text-center same"><img

                                    src="<?= base_url() ?>assets/frontend/img/expertise.svg" alt="Professionals">

                            <div class="counter-box"><span class="counter" data-TargetNum="10"

                                                           data-Speed="1000">10</span><i>+</i> <h6>Professionals</h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-6">

                        <div class=" about-counter text-center same"><img

                                    src="<?= base_url() ?>assets/frontend/img/quality.svg" alt="Satisfaction">

                            <div class="counter-box"><span class="counter" data-TargetNum="100"

                                                           data-Speed="1000">100</span><i>%</i> <h6>Satisfaction</h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-6">

                        <div class=" about-counter text-center same"><img

                                    src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="DHA Certified Team">

                            <div class="counter-box"><span class="counter" data-TargetNum="100"

                                                           data-Speed="1000">100</span><i>%</i> <h6>DHA Certified

                                    Team</h6></div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-10 section-gap">

                <div class="row">

                    <div class="col-md-6 mb-3 mb-sm-0" >

                        <div class="card-style5 card-style6 same-height vision-mission">

                            <div class="vision-img"><img src="<?= base_url() ?>assets/frontend/img/vision.svg" alt="Healthcare Vision" class="img-fluid"></div>

                            <div><h5>Vision</h5>

                                <p>Personalized care, delivered with heart. Bringing bespoke home healthcare to your

                                    health, your way.</p></div>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3 mb-sm-0">

                        <div class="card-style5 card-style6 same-height vision-mission">

                            <div class="vision-img"><img src="<?= base_url() ?>assets/frontend/img/mission.svg" alt="Healthcare Mission" class="img-fluid"></div>

                            <div><h5>Mission</h5>

                                <p>Our mission is to uphold human and ethical values, delivering quality healthcare. We

                                    strive to be the preferred provider, offering comprehensive care with a human touch

                                    and unwavering commitment to quality assurance.</p></div>

                        </div>

                    </div>

                </div>

            </div>
            <div class="col-lg-10 gap">
                <h2 class="text-center mb-5">Our services</h2>
                <div class="row">
                    <div class="col-md-7 mb-3 mb-sm-0">
                        <div class="card-style5 card-style6 same-height d-flex flex-column align-items-center justify-content-center" style="margin-bottom:0;padding-bottom:0;">
                            <div>
                                <h5>Medical Services</h5>
                                <ul class="listing-item2 d-flex flex-column align-items-start justify-content-center gap-3 mt-3">
                                    <li>IV Drip Therapy & Supplementation</li>
                                    <li>Home Based Nurse & Teleconsultation</li>
                                    <li>Diagnostic Testing & Genetic Wellness Panels</li>
                                    <li>Wellness prevention Management</li>
                                    <li>Post Hospitalization & Preventive Care Programs</li>
                                </ul>                                
                            </div>

                        </div>
                    </div>
                    <div class="col-md-5 mb-3 mb-sm-0">

                            <div class="d-flex justify-content-end"><img src="<?= base_url() ?>assets/frontend/img/gala2.webp" alt="Healthcare Mission" height="400" class="rounded d-md-block d-none"></div>
                    </div>
                </div>

            </div>
            <div class="col-lg-10 mt-md-3 mt-1 mb-lg-5">
                <div class="row">
                    <div class="col-md-5 mb-3 mb-sm-0">

                            <div class=""><img src="<?= base_url() ?>assets/frontend/img/about-us-wellness.png" alt="Healthcare Mission" height="400" class="rounded d-md-block d-none"></div>
                  

                    </div>
                    <div class="col-md-7 mb-3 mb-sm-0">
                        <div class="card-style5 card-style6 same-height d-flex flex-column align-items-center justify-content-center">
                            <div>
                                <h5>Wellness & Lifestyle Therapies</h5>
                                <ul class="listing-item2 d-flex flex-column align-items-start justify-content-center gap-3 mt-3">
                                    <li>Oxygen Therapy</li>
                                    <li>LED Facial Light Therapy</li>
                                    <li>Aromatherapy & Sound Healing Rituals</li>
                                    <li>Mental Health Support Sessions</li>
                                    <li>Wellness Concierge for Hotel & Residential Clients</li>
                                </ul>                                
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-10 gap">
              

                <div class="card-style5 card-style6 same-height vision-mission">

                    <div class="vision-img">
                        <img src="<?= base_url() ?>assets/frontend/img/philosophy.svg" alt="Healthcarebia philosophy" class="img-fluid">
                    </div>

                    <div>
                        <h5>Our Philosophy</h5>
                        <p>We believe that healing begins with comfort, trust, and personalization. Our model is built on three core pillars. Clinical Integrity, with every service administered by DHA licensed professionals; Client Centric Care, where every detail is tailored for safety, convenience, and peace of mind; and Holistic Healing, addressing not only physical health, but also mental clarity and emotional wellbeing.
                        </p>
                    </div>

                </div>
            </div>
            <div class="col-lg-10 mt-lg-5 mt-2">
              

                <div class="card-style5 card-style6 same-height vision-mission">

                    <div class="vision-img">
                        <img src="<?= base_url() ?>assets/frontend/img/home-care.svg" alt="Healthcarebia operates at home" class="img-fluid">
                    </div>

                    <div>
                        <h5>Where We Operate</h5>
                        <p>Healthcarebia delivers in home and on site services across Dubai and the UAE. Whether at a private residence, hotel, yacht, or corporate suite we bring care where you are.
                        </p>
                    </div>
                    <a class="primary-btn hvr-bounce-to-right green-btn mt-2" href="https://wa.me/971547077476">
                    Book An Appointment Now
                </a>
                </div>
            </div>
        </div>

    </div>

</section>


<?php include 'includes/inc_footer.php'; ?>



<?php include 'includes/inc_footer_scripts.php'; ?>


</body>

</html>