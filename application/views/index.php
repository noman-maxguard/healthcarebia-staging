<!doctype html>

<html lang="en">
<head>
    <meta name="msvalidate.01" content="4FD335F27089556A6B30B3EEC6440862" />

    <?php include 'includes/inc_head_tag.php'; ?>
<style>
    .video-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease-in-out;
    }

    .video-modal-overlay {
        position: relative;
        width: 90%;
        max-width: 800px;
        height: 90%;
        max-height: 450px;
    }

    .video-modal-content {
        position: relative;
        width: 100%;
        height: 100%;
        background: #000;
        border-radius: 8px;
        overflow: hidden;
        animation: slideIn 0.3s ease-in-out;
    }

    .video-modal-close {
        position: absolute;
        top: -40px;
        right: 0;
        background: none;
        border: none;
        color: #fff;
        font-size: 30px;
        cursor: pointer;
        z-index: 10000;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        transition: background 0.3s ease;
    }

    .video-modal-close:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .video-container {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .video-container iframe {
        border-radius: 8px;
    }

    /* Testimonial image container positioning */
    .testimonials-img-out {
        position: relative;
        overflow: hidden;
    }

    /* Play button styles */
    .video-play-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        z-index: 10;
    }

    .video-play-btn:hover {
        background: rgba(255, 255, 255, 1);
        transform: translate(-50%, -50%) scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .video-play-btn img {
        margin-left: 3px; /* Slight offset to center the play icon */
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { 
            opacity: 0;
            transform: scale(0.8);
        }
        to { 
            opacity: 1;
            transform: scale(1);
        }
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .video-modal-overlay {
            width: 95%;
            height: 80%;
            max-height: 300px;
        }
        
        .video-modal-close {
            top: -35px;
            font-size: 25px;
            width: 35px;
            height: 35px;
        }
        
        .video-play-btn {
            width: 50px;
            height: 50px;
        }
    }

    @media (max-width: 480px) {
        .video-modal-overlay {
            width: 98%;
            height: 70%;
            max-height: 250px;
        }
        
        .video-play-btn {
            width: 45px;
            height: 45px;
        }
    }

    /* Prevent body scroll when modal is open */
    body.modal-open {
        overflow: hidden;}

        .pulse-glow-cta {
        display: inline-block;
        position: relative;
        z-index: 1;
        animation: pulse-glow-cta 1.5s infinite ease-in-out;
        }

        @keyframes pulse-glow-cta {
        0% {
            box-shadow:
            0 0 10px 2px rgba(37,211,102,0.6),
            0 0 20px 4px rgba(37,211,102,0.4);
            transform: scale(1);
        }
        50% {
            box-shadow:
            0 0 20px 6px rgba(37,211,102,0.8),
            0 0 40px 8px rgba(37,211,102,0.6);
            transform: scale(1.1);
        }
        100% {
            box-shadow:
            0 0 10px 2px rgba(37,211,102,0.6),
            0 0 20px 4px rgba(37,211,102,0.4);
            transform: scale(1);
        }
        }
        /* Custom styles for the service grid */
    /* Custom styles for the service grid */
    .services-slider-item {
        display: block; /* Make the link a block-level element */
        position: relative;
        overflow: hidden; /* Ensures the image respects the border-radius */
        width: 100%;
        border-radius: 8px; /* Optional: adds rounded corners */
    }

    .services-slider-item .img-fluid {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the area without distortion */
        transition: transform 0.4s ease; /* Smooth zoom effect on hover */
    }

    .services-slider-item:hover .img-fluid {
        transform: scale(1.05); /* Zoom effect on hover */
    }

    .services-slider-item .services-title {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        /* Reduced padding for smaller blocks */
        padding: 15px;
        z-index: 2;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
    }

    .services-slider-item .services-title h3 {
        color: #fff;
        margin: 0;
        /* You might also want to adjust font size if needed for smaller blocks */
        /* font-size: 1.1rem;  */
    }

    /* Define the specific heights for the grid items (reduced) */
    .item-tall {
        height: 350px; /* Reduced from 450px */
    }

    .item-medium {
        height: 252px; /* Reduced from 320px */
    }

    .item-short {
        height: 180px; /* Reduced from 250px */
    }
</style>
</head>


<body>
<noscript>
  <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXX"
          height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<?php include 'includes/inc_header.php'; ?>
<!--======== banner ======-->

<section class="main-banner">

    <div class="overlay">

        <div class="container">

            <div class="row">

                <div class="col-12 col-sm-7">

                    <div class="banner-inner">

                        <h1>Healing Body, Mind and Soul.</h1>

                        <p>Healthcarebia is the GCC’s First Concierge Wellness Service merging Luxury, Diagnostics & Rejuvenation with Privacy & Precision to your doorstep.</p>

                        <p>Get your DHA-certified IV drip at home in just 60 minutes, anywhere in Dubai.</p>

                        <a href="<?= $whatsappHref ?>" class="primary-btn hvr-bounce-to-right white-btn my-3">Book IV Drip at Home</a>
                        <br>
                        <button
                            id="iv-quiz-btn"
                            class="primary-btn hvr-bounce-to-right green-btn mt-2" style="border: 1px solid white; background-color: transparent;color: white;">
                            Get Your Personalized IV Drip
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <video style="object-fit: cover; background-size: cover; width: 100%; height: 100%;" preload="auto" playsinline="" autoplay="" loop="" muted="" width="320" height="200">

        <source src="<?= base_url() ?>assets/frontend/img/home-banner-video2.mov">

    </video>
    <ul id="downArrow">
        <li style="--i:1"></li>
        <li style="--i:2"></li>
        <li style="--i:3"></li>
    </ul>
</section>
<section class="trust-section animate my-3" data-animation="fadeInUp">
    <div class="container d-flex justify-content-center align-items-center">
        <div>
            <img src="<?= base_url() ?>assets/frontend/img/google-logo-banner.svg" alt="google logo" class="google">
            <h3>Trusted on Google</h3>
            <p>Real reviews and high ratings from clients in Dubai.</p>
        </div>

        <div>
            <img src="<?= base_url() ?>assets/frontend/img/fda-logo-banner.svg" alt="fda logo" class="fda">
            <h3>FDA compliant formulations</h3>
            <p>Products sourced from FDA compliant manufacturers for added safety.</p>
        </div>

        <div>
            <img src="<?= base_url() ?>assets/frontend/img/nabidh.svg" alt="nabidh logo" class="nabidh">
            <h3>NABIDH ready records</h3>
            <p>Your IV therapy records can be shared securely through NABIDH.</p>
        </div>

        <div>
            <img src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="dha logo" class="dha">
            <h3>DHA licensed nurses</h3>
            <p>Care delivered at home by DHA licensed and experienced nurses.</p>
        </div>
    </div>
    


</section>
<section class="trust-section-mobile animate" data-animation="fadeInUp">

  

        <div class="container">

            <div class="row">

                <div class="col-12 mt-4">

                    <div class="services-slider owl-carousel">

                        <div class="item">
                            <div>
                                <img src="<?= base_url() ?>assets/frontend/img/google-logo-banner.svg" alt="google logo" class="google">
                                <h3>Trusted on Google</h3>
                                <p>Real reviews and high ratings from clients in Dubai.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div>
                                <img src="<?= base_url() ?>assets/frontend/img/fda-logo-banner.svg" alt="fda logo" class="fda">
                                <h3>FDA compliant formulations</h3>
                                <p>Products sourced from FDA compliant manufacturers for added safety.</p>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div>
                                <img src="<?= base_url() ?>assets/frontend/img/nabidh.svg" alt="nabidh logo" class="nabidh">
                                <h3>NABIDH ready records</h3>
                                <p>Your IV therapy records can be shared securely through NABIDH.</p>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div>
                                <img src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="dha logo" class="dha">
                                <h3>DHA licensed nurses</h3>
                                <p>Care delivered at home by DHA licensed and experienced nurses.</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

  
</section>
<section class="about-block py-5 no-soacing-bottom ">

    <div class="container">

        <div class="row d-flex align-items-center justify-content-center gap-lg-5 gap-md-5 gap-1">

            <div class="col-lg-6 col-12 p-2 animate" data-animation="fadeInLeft">

                <div class="about-text">

                    <!-- <h5>Welcome to</h5> -->

                    <h2 class="mb-3" >Welcome to Healthcarebia
                    Premium At Home Healthcare in Dubai</h2>

                    <p>HEALTHCAREBIA is Dubai's premier luxury mobile healthcare provider, delivering elite medical services to UAE's discerning clientele. Our DHA-certified professionals offer 24/7 concierge medicine, including premium IV therapy, executive health screenings, and diagnostics within the privacy of your residence. Trusted by royal families and business leaders, we combine world-class expertise with discretion, providing bespoke wellness solutions from preventive care to longevity treatments. Experience healthcare reimagined, where luxury meets medical excellence, exclusively for Dubai's high-net-worth individuals and VIP residents.</p>

                    <div id="counters_3" class="statistics">

                        <div class="row">

                            <div class="col-6 col-md-3 text-center">

                                <div class="counter-box"><span class="counter" data-TargetNum="1" data-Speed="1000">1</span><i>K+</i>

                                    <h6>Happy Clients</h6>

                                </div>

                            </div>

                            <div class="col-6 col-md-3 text-center">

                                <div class="counter-box"><span class="counter" data-TargetNum="10" data-Speed="4000">10</span><i>+</i>

                                    <h6>Professionals</h6>

                                </div>

                            </div>

                            <div class="col-6 col-md-3 text-center">

                                <div class="counter-box"><span class="counter" data-TargetNum="100" data-Speed="7000">100</span><i>%</i>

                                    <h6>Satisfaction</h6>

                                </div>

                            </div>

                            <div class="col-6 col-md-3 text-center">

                                <div class="counter-box"><span class="counter" data-TargetNum="100" data-Speed="10000">100</span><i>%</i>

                                    <h6>DHA Certified Team</h6>

                                </div>

                            </div>

                        </div>

                    </div>

                    <a href="<?= base_url() ?>about-us" class="primary-btn hvr-bounce-to-right green-btn mt-2">Discover more About Healthcarebia</a></div>

            </div>
            <div
                class="about-us-right col-lg-4 d-md-none d-lg-block col-12 d-flex justify-content-center align-items-center p-2 animate" data-animation="fadeInRight"
                >
                <div class="image">
                    <img src="<?= base_url() ?>assets/frontend/img/img4.webp" alt="about us section image" loading="lazy" />
                </div>
            </div>

        </div>

    </div>

</section>
<section class="services-block service-block1 animate" data-animation="fadeInUp">
    <div class="overlay section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Our services</h2>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="<?= base_url() ?>lab-test-at-home" class="services-slider-item item-tall mb-4" 
                       style="
                           background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 20%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/lab-test.jpg');
                           background-size: cover;
                           background-position: center;
                           background-repeat: no-repeat;
                           display: block; /* Ensure the anchor takes up space */
                       ">
                        <div class="services-title">
                            <h3>Lab Test at Home</h3>
                            <p>Certified diagnostics without leaving home.</p>
                        </div>
                    </a>
                    
                    <a href="<?= base_url() ?>nurse-at-home" class="services-slider-item item-short"
                       style="
                           background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 20%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/nurse-at-home.webp');
                           background-size: cover;
                           background-position: center;
                           background-repeat: no-repeat;
                           display: block;
                       ">
                        <div class="services-title">
                            <h3>Nurse At Home</h3>
                            <p>Professional nursing, discreet and on time.</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="<?= base_url() ?>iv-drip-dubai" class="services-slider-item item-medium mb-5"
                       style="
                           background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 20%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/iv-therapy.jpg');
                           background-size: cover;
                           background-position: top;
                           background-repeat: no-repeat;
                           display: block;
                       ">
                        <div class="services-title">
                            <h3>IV Therapy</h3>
                            <p>Fast nutrients, zero downtime, real results.</p>
                        </div>
                    </a>
                    <a href="<?= base_url() ?>oxygen-therapy" class="services-slider-item item-medium"
                       style="
                           background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 20%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/oxygen-therapy.png');
                           background-size: cover;
                           background-position: 100% right;
                           background-repeat: no-repeat;
                           display: block; 
                       ">
                        <div class="services-title">
                            <h3>Oxygen therapy</h3>
                            <p>Breathe better and absorb faster.</p>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="<?= base_url() ?>doctor-on-call" class="services-slider-item item-short mb-4"
                       style="
                           background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 20%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/tele-consultation.jpg');
                           background-size: cover;
                           background-position: center;
                           background-repeat: no-repeat;
                           display: block;
                       ">
                        <div class="services-title">
                            <h3>Doctor on Call</h3>
                            <p>Tele-health with DHA doctor.</p>
                        </div>
                    </a>
                    <a href="<?= base_url() ?>iv-drip-dubai" class="services-slider-item item-tall"
                       style="
                           background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 20%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/face-led.jpg');
                           background-size: cover;
                           background-position: center;
                           background-repeat: no-repeat;
                           display: block;
                       ">
                        <div class="services-title">
                            <h3>Red Light Therapy</h3>
                            <p>Calm inflammation, boost glow without needles.</p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="services-block service-block2 animate" data-animation="fadeInUp">

    <div class="overlay section-gap">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center">

                    <h2>Our services</h2>

                </div>

                <div class="col-12 mt-4">

                    <div class="services-slider owl-carousel">

                        <div class="item">
                            <a href="<?= base_url() ?>iv-drip-dubai" class="services-slider-item"
                                style="
                                        background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 30%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/iv-therapy.jpg');
                                        background-size: cover;
                                        background-position: top; /* Adjusted from center to top for IV Therapy as in service-block1 */
                                        background-repeat: no-repeat;
                                        display: block; 
                                        min-height: 428px;
                                    ">
                                <div class="services-title">
                                    <h3>IV Therapy</h3>
                                    <p>Fast nutrients, zero downtime, real results.</p>
                                </div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="<?= base_url() ?>lab-test-at-home" class="services-slider-item"
                                style="
                                        background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.3) 30%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/lab-test.jpg');
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        display: block;
                                        min-height: 428px;
                                    ">
                                <div class="services-title">
                                    <h3>Lab Test at Home</h3>
                                    <p>Certified diagnostics without leaving home.</p>
                                </div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="<?= base_url() ?>doctor-on-call" class="services-slider-item"
                                style="
                                        background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.3) 30%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/tele-consultation.jpg');
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        display: block;
                                        min-height: 428px;
                                    ">
                                <div class="services-title">
                                    <h3>Doctor on Call</h3>
                                    <p>Tele-health with DHA doctor.</p>
                                </div>
                            </a>
                        </div>

                        <div class="item">
                            <a href="<?= base_url() ?>nurse-at-home" class="services-slider-item"
                                style="
                                        background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 30%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/nurse-at-home.webp');
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        display: block;
                                        min-height: 428px;
                                    ">
                                <div class="services-title">
                                    <h3>Nurse At Home</h3>
                                    <p>Professional nursing, discreet and on time.</p>
                                </div>
                            </a>
                        </div>
                        
                        <div class="item">
                            <a href="<?= base_url() ?>oxygen-therapy" class="services-slider-item"
                                style="
                                        background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 30%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/oxygen-therapy.png');
                                        background-size: cover;
                                        background-position: 100% right; /* Adjusted from center to 100% right for Oxygen Therapy as in service-block1 */
                                        background-repeat: no-repeat;
                                        display: block;
                                        min-height: 428px;
                                    ">
                                <div class="services-title">
                                    <h3>Oxygen therapy</h3>
                                    <p>Breathe better and absorb faster.</p>
                                </div>
                            </a>
                        </div>
                        
                        <div class="item">
                            <a href="<?= base_url() ?>iv-drip-dubai" class="services-slider-item"
                                style="
                                        background-image: linear-gradient(to top, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 60%),linear-gradient(to right, rgba(0,0,0,0.5) 30%, rgba(0,0,0,0) 50%), url('<?= base_url() ?>assets/frontend/img/face-led.jpg'); /* Changed image from .webp to .jpg as per block 1 and updated title to match description in block 2 */
                                        background-size: cover;
                                        background-position: center;
                                        background-repeat: no-repeat;
                                        display: block;
                                        min-height: 428px;
                                    ">
                                <div class="services-title">
                                    <h3>Red Light Therapy</h3> <p>Calm inflammation, boost glow without needles.</p>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
<section class="why-choose why-choose-grid pt-5">
    <h2 class="why-choose-heading-one animate" data-animation="fadeInUp">Why Choose Us</h2>
  <div class="container">
    <div class="row align-items-end">

      <!-- Left column -->
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="row g-lg-3 d-flex justify-content-center">
          <!-- Expertise -->
          <div class="col-lg-12 col-md-5 why-choose-item animate" data-animation="fadeInUp">
            <div class="choose-item card-like">
              <div class="item-icon">
                <span>
                  <img loading="lazy" decoding="async" width="50" height="60"
                       class="img-fluid" src="<?= base_url() ?>assets/frontend/img/expertise.svg" alt="Expertise">
                </span>
              </div>
              <div class="text">
                <h3>DHA-Certified Multinational Nurses</h3>
                <p>Our highly experienced team of DHA-certified multinational nurses and doctors are ready to care for all your needs, customizing your experience for the best service.</p>
              </div>
            </div>
          </div>

          <!-- Custom-made -->
          <div class="col-lg-12 col-md-5 why-choose-item animate" data-animation="fadeInUp">
            <div class="choose-item card-like" >
              <div class="item-icon">
                <span>
                  <img loading="lazy" decoding="async" width="29" height="58"
                       src="<?= base_url() ?>assets/frontend/img/custom-made.svg" alt="Custom-made">
                </span>
              </div>
              <div class="text">
                <h3>FDA-Approved IV Formulas</h3>
                <p>We use only FDA-approved Grade A products from USA/UK, providing personalized treatments and maintaining a strict policy against one size fits all.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Center column (title + image) -->
      <div class="col-lg-4 col-md-12 mb-lg-0 text-center">
        <h2 class="why-choose-heading-two animate" data-animation="fadeInUp">Why Choose Us</h2>
        <div class="why-image-wrap animate mb-4" data-animation="fadeInUp">
          <img
            src="<?= base_url() ?>assets/frontend/img/why-choose-section-image.jpg"
            alt="Why choose us"
            class="img-fluid shadow-sm rounded-4"
            loading="lazy" style="height:550px;width: 400px">
        </div>
      </div>

      <!-- Right column -->
      <div class="col-lg-4 col-md-12 mb-4">
        <div class="row g-lg-3 d-flex justify-content-center">
          <!-- Quality -->
          <div class="col-lg-12 col-5 why-choose-item animate" data-animation="fadeInUp">
            <div class="choose-item card-like">
              <div class="item-icon">
                <span>
                  <img loading="lazy" decoding="async" width="38" height="46"
                       src="<?= base_url() ?>assets/frontend/img/quality.svg" alt="Quality">
                </span>
              </div>
              <div class="text">
                <h3>Freshly prepared for optimal results.</h3>
                <p>All our products are DHA &amp; MOH approved, and we take pride in preparing them freshly for better results.</p>
              </div>
            </div>
          </div>

          <!-- Excellence -->
          <div class="col-lg-12 col-5 why-choose-item animate" data-animation="fadeInUp">
            <div class="choose-item card-like">
              <div class="item-icon">
                <span>
                  <img loading="lazy" decoding="async" width="61" height="54"
                       src="<?= base_url() ?>assets/frontend/img/excellence.svg" alt="Excellence">
                </span>
              </div>
              <div class="text">
                <h3>VIP Privacy & Discretion Protocol.</h3>
                <p>With over 30+ years of collective expertise in IV Therapy, we are committed to enhancing your well being through our excellence in service.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> <!-- /row -->
  </div> <!-- /container -->
</section>
<section class="section-gap testimonials">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center animate" data-animation="fadeInUp">

                <h2>Testimonials</h2>

            </div>

            <div class="col-md-12 mt-4 animate" data-animation="fadeInUp">

                <div class="testimonials-slider owl-carousel">

                    <div class="item">

                        <div class="testimonials-box">

                            <div class="testimonials-img-out">

                                <img loading="lazy" decoding="async" width="369" height="311" alt="Healthcarebia Testimonial1" src="<?= base_url() ?>assets/frontend/img/mo-aziz.webp"
                                     class="img-fluid">

                                <button class="play video-play-btn" data-video-id="Cke0_5vsi8Q" data-video-title="Mo Aziz Testimonial">

                                    <img loading="lazy" decoding="async" width="17" height="20" alt="Healthcarebia" src="<?= base_url() ?>assets/frontend/img/play.svg" class="img-fluid">

                                </button>

                            </div>

                            <div class="testimonials-text">

                                <h4>Mo Aziz</h4>
                                <h5>Co-Founder & CEO, Pluto</h5>
                                <p>"I just had a NAD+ drip via Healthcarebia’s IV drip home service in Dubai, and I feel absolutely incredible.
                                     Their IV therapy is efficient, reliable, and truly top-notch, making a real difference in my productivity and energy level."</p>

                            </div>

                        </div>

                    </div>

                    <div class="item">

                        <div class="testimonials-box">

                            <div class="testimonials-img-out">

                                <img loading="lazy" decoding="async" width="369" height="311" alt="Healthcarebia Testimonial2" src="<?= base_url() ?>assets/frontend/img/gala-testimonial.webp"
                                     class="img-fluid">

                                <button class="play video-play-btn" data-video-id="ipUMjVFkipc" data-video-title="Gala Testimonial">

                                    <img loading="lazy" decoding="async" width="17" height="20" alt="Healthcarebia" src="<?= base_url() ?>assets/frontend/img/play.svg" class="img-fluid">

                                </button>

                            </div>

                            <div class="testimonials-text">

                                <h4>Gala</h4>
                                <h5>Marketing, nutritionist & wellness consultant</h5>
                                <p>"After trying Healthcarebia’s immune booster IV drip, I experienced a noticeable boost in energy and overall wellness.
                                     The treatment was effective, professionally administered, and made me feel confident about my health journey."</p>

                            </div>

                        </div>

                    </div>

                    <div class="item">

                        <div class="testimonials-box">

                            <div class="testimonials-img-out">

                                <img loading="lazy" decoding="async" width="369" height="311" alt="Healthcarebia Testimonial3" src="<?= base_url() ?>assets/frontend/img/jeremy-gwyer.webp"
                                     class="img-fluid">

                                <button class="play video-play-btn" data-video-id="AkeO7vjzBYQ" data-video-title="Jeremy Gwyer Testimonial">

                                    <img loading="lazy" decoding="async" width="17" height="20" alt="Healthcarebia" src="<?= base_url() ?>assets/frontend/img/play.svg" class="img-fluid">

                                </button>

                            </div>

                            <div class="testimonials-text">

                                <h4>Jeremy Gwyer</h4>
                                <h5>Personal Trainer</h5>
                                <p>"Healthcarebia’s at home IV therapy in Dubai is really convenient. Their team arrived promptly, making the process smooth and stress-free.
                                     I had the Myers Cocktail, and the personalized care made the experience so comfortable."</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<div class="ebook-form p-4" id="ebookFormMobile">
    <h6 style="font-size: 18px;color: white;text-align: center">Download Our Free Precision Of Wellness eBook</h6>
    <form action="/ebooks/download" method="POST" style="display:flex;flex-direction: column; justify-content: start;align-items: center; width:100%; gap:1em" class="mt-4">
        <div class="col-md-12 mb-3">
        <input class="form-input" type="email" placeholder="Enter your email" name="email" required style="width:100%;height:100%;padding: 13px 32px;border-radius:30px;border:none">
        </div>
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="yes" id="consent" name="consent">
        <label class="form-check-label" for="consent">
        <span style="color: white;font-size:14px; text-align: start">I Consent to receive more information from Healthcarebia</span>
        </label>
        </div>
        <button class="mt-3 ebook-btn" type="submit" style="padding: 8px 26px; border-radius: 30px; background-color: var(--green);color:white;border:none; width: 100%">Download Ebook</button>
    </form>
</div>
<div class="video-modal" id="videoModal" style="display: none;">
    <div class="video-modal-overlay">
        <div class="video-modal-content">
            <button class="video-modal-close" id="videoModalClose">&times;</button>
            <div class="video-container">
                <iframe id="videoIframe" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<section class="healing-body section-gap mt-5 animate" data-animation="fadeInUp">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center testimonial-inner">

                    <h2>Your health. Our mission. Anytime, Anywhere.</h2>

                    <a href="<?= base_url() ?>contact-us" class="primary-btn hvr-bounce-to-right green-btn book-now">Your Wellness Journey Starts Here.</a>

                    <ul class="contact-info-list d-lg-flex justify-content-center align-items-center">

                        <li><a class="phone-nmber" href="tel:+97142250823">

                                <div class="inner">
                                    
                                    <span>
                                        
                                        <img class="img-fluid" width="25" height="25" src="<?= base_url() ?>assets/frontend/img/phone.svg" alt="Phone" loading="lazy">
                                    
                                    </span>

                                    <h5>+971 4 225 0823</h5>

                                </div>

                            </a></li>

                        <li>

                            <a class="phone-nmber  d-none d-sm-block"

                               href="<?= $whatsappHref ?>">

                                <div class="inner">
                                    
                                    <span>
                                        
                                        <img class="img-fluid" width="35" height="35" src="<?= base_url() ?>assets/frontend/img/whatsapp.svg" alt="Whatsapp" loading="lazy">
                                    
                                    </span>

                                    <h5>+971 54 707 7476</h5>

                                </div>

                            </a>
                            <a class="phone-nmber d-block d-sm-none"

                               href="<?= $whatsappHref ?>">

                                <div class="inner">
                                    
                                    <span>
                                        
                                        <img class="img-fluid" width="35" height="35" src="<?= base_url() ?>assets/frontend/img/whatsapp.svg" alt="Whatsapp" loading="lazy">
                                    
                                    </span>

                                    <h5>+971 54 707 7476</h5>

                                </div>

                            </a>

                        </li>

                        <li>
                            <a class="phone-nmber" href="mailto:info@healthcarebia.ae">

                                <div class="inner">
                                    
                                    <span>
                                        
                                        <img class="img-fluid" width="29" height="20" src="<?= base_url() ?>assets/frontend/img/email.svg" alt="mail" loading="lazy">
                                    
                                    </span>

                                    <h5>info@healthcarebia.ae</h5>

                                </div>

                            </a>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- <section class="section-gap">

    <div class="container">

        <div class="row">

            <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>



            <div class="elfsight-app-0f5a1024-4605-437a-b978-bd308b024ae9"></div>





        </div>

    </div>

</section> -->


<?php include 'includes/inc_footer.php'; ?>



<?php include 'includes/inc_footer_scripts.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videoModal = document.getElementById('videoModal');
        const videoIframe = document.getElementById('videoIframe');
        const videoModalClose = document.getElementById('videoModalClose');
        const videoPlayBtns = document.querySelectorAll('.video-play-btn');
        
        // Open video modal
        videoPlayBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const videoId = this.getAttribute('data-video-id');
                const videoTitle = this.getAttribute('data-video-title');
                
                // Set the iframe source with autoplay
                videoIframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&modestbranding=1`;
                videoIframe.title = videoTitle;
                
                // Show modal
                videoModal.style.display = 'flex';
                document.body.classList.add('modal-open');
            });
        });
        
        function closeVideoModal() {
            videoModal.style.display = 'none';
            videoIframe.src = ''; // Stop the video
            document.body.classList.remove('modal-open');
        }
        
        videoModalClose.addEventListener('click', closeVideoModal);
        
        videoModal.addEventListener('click', function(e) {
            if (e.target === videoModal) {
                closeVideoModal();
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && videoModal.style.display === 'flex') {
                closeVideoModal();
            }
        });
    });
    function debounce(fn, wait) {
    let t; return function() { clearTimeout(t); t = setTimeout(() => fn.apply(this, arguments), wait); };
  }

  function initTrustCarousel() {
    var $el = $('.trust-section-mobile .services-slider');

    // only mobile
    var isMobile = window.matchMedia('(max-width: 767.98px)').matches;

    if (isMobile) {
      if (!$el.hasClass('owl-loaded')) {
        $el.owlCarousel({
          items: 3,                // show two items
          margin: 16,
          loop: true,
          autoplay: true,          // auto scroll
          autoplayTimeout: 1500,
          autoplayHoverPause: false,
          smartSpeed: 500,
          nav: false,              // hide arrows
          dots: false,              // show dots (optional)
          touchDrag: true,
          mouseDrag: true,
        //   responsive: {
        //     0:   { items: 1.2, margin: 12 }, 
        //     360: { items: 2 },
        //     480: { items: 2   },             
        //     576: { items: 2   }
        //   }
        });
      }
    } else {
      // destroy when not mobile
      if ($el.hasClass('owl-loaded')) {
        $el.trigger('destroy.owl.carousel');
        // unwrap Owl markup
        $el.find('.owl-stage-outer').children().unwrap();
        $el.removeClass('owl-center owl-loaded owl-text-select-on');
      }
    }
  }

  $(document).ready(initTrustCarousel);
  $(window).on('resize orientationchange', debounce(initTrustCarousel, 150));
</script>

</body>

</html>
