<!doctype html>

<html lang="en">

<head>

    <?php include 'includes/inc_head_tag.php'; ?>


<!-- Desktop -->
<link rel="preload" as="image" href="<?= base_url() ?>assets/frontend/img/lab-test-at-home-banner.webp" media="(min-width: 769px)">

<!-- Mobile -->
<link rel="preload" as="image" href="<?= base_url() ?>assets/frontend/img/lab-test-at-home-banner-mobile.webp" media="(max-width: 768px)">

<style>

  .why-choose-therapy{
        background-color: #F2F2F2 !important;
  }

  .bg-white{
    background: #fff !important;
  }

  .lab-tests-section {
    width: 100%;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 70px;
}
  
.lab-tests-section .test-row {
    display: flex;
    max-width: 100%;
    background: #ffffff;
    border-radius: 20px;
    padding: 1rem;
    border: 1px solid #e8e8e8;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    justify-content: start;
    text-align: left;
    align-items: center;
    gap: 1rem;
    flex-direction: column;
    flex: 0 0 calc((100% - 140px) / 3);
}

.lab-tests-section .test-row .lab-test-grid-image {
    width: 100%;
}

.lab-tests-section .test-row a {
    display: block;
    width: 100%;
}

.lab-tests-section .test-row .lab-test-grid-image img {
    border-radius: 12px;
    width: 100%;
    height: 16em;
    object-fit: cover;
}


  .lab-tests-section .test-row:hover{
    box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
    transform: translateY(-4px);
  }
  
  .lab-tests-section .text-col {
    flex: 1;
    z-index: 1;
    height: 60px;
  }
  
  .lab-tests-section .text-box {
    border-radius: 25px;
    /* padding: 2rem 2.5rem; */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  
  .lab-tests-section .text-box h5 {
    font-size: 1.4rem;
    color: #2c3e50;
    margin-bottom: 0.75rem;
    font-weight: 600;
  }
  
  .lab-tests-section .text-box p {
    margin: 0;
    color: #5a6c7d;
    font-size: 1rem;
    line-height: 1.5;
  }
  
.lab-tests-section .icon-col {
    width: 100%;
    z-index: 2;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    padding: 25px 10px 0px;
}

.lab-tests-section .lab-icon img {
    height: 50px;
    width: auto;
    object-fit: contain;
    margin-top: 5px;
    max-width: 70px;
}

.lab-tests-section .icon-col .lab-icon {
    display: flex;
    flex-direction: row;
    width: auto;
    justify-content: flex-start;
    margin-right: 15px;
}

.lab-tests-section .icon-col h4 {
    display: flex;
    flex-direction: row;
    width: auto;
    margin: 0;
    font-size: 28px;
    color: #356438;
}

.lab-tests-section .icon-col p {
    display: flex;
    flex-direction: column;
    margin: 0;
    padding: 20px 0 10px;
    line-height: 22px;
}

.lab-tests-section .icon-col p strong {
    display: flex;
    flex-direction: column;
    margin: 0;
    font-weight: 700;
    padding: 30px 0 0px;
}

.sub-banner {
    background-position: 70% 80%;
    background-size: cover;
    min-height: 600px;
}

.lab-test-trust-box img.trust-google {
    width: 80px !important;
}

.lab-test-trust-box img {
    margin: 10px 0 20px !important;
    height: 50px !important;
    width: 60px !important;
}

.lab-test-trust-box .trust-dha {
    width: 60px;
}

.lab-test-trust-signals {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-wrap: wrap;
    gap: 2%;
}

.lab-test-trust-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    width: 32%;
}

.lab-test-trust-box h5 {
    font-size: 18px;
    margin-top: -5px;
    margin-bottom: 5px;
}

.lab-test-trust-box p {
    font-size: 14px;
}


.sub-banner h1 {
    font-size: 46px;
    color: #fff;
}

.sub-banner P {
    font-size: 16px;
    color: #fff;
}


.iv-steps-section {
     background: transparent; 
    color: #fff;
     padding: 0; 
}

.iv-step-card {
    border-radius: 10px;
    padding: 30px 10px 28px;
    background: var(--green);
    width: 25%;
    align-self: stretch;
}

.iv-step-count h3 {
    color: white;
    border-radius: inherit;
    font-size: 22px;
}

.iv-steps-wrap {
    gap: 40px;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* lab-tests-section-slider */

.lab-tests-section-slider.owl-carousel .owl-nav.disabled{
    display: block;
}


.lab-tests-section-slider .owl-nav{
    display: flex;
    justify-content: space-between;
}
.lab-tests-section-slider .owl-nav button{
    position: absolute;
}
.lab-tests-section-slider{
    position: relative
}
.lab-tests-section-slider .owl-nav .owl-prev {
    left: -30px;
    top: 50%;
    transform: translateY(-50%);
}

.lab-tests-section-slider .owl-nav .owl-next{
    right: -30px;
    top: 50%;
    transform: translateY(-50%);
}
.lab-tests-section-slider .owl-nav span{
    color: var(--green);
    font-size: 48px;
}

.lab-tests-section-slider .test-row .lab-test-grid-image img {
    height: 100% !important;
}
.lab-tests-section-slider .test-row a {
    display: flex;
    width: 100% !important;
    align-items: center;
    justify-content: center;
    max-width: 150px;
}

.lab-tests-section-slider .icon-col .text{
    width: 100%;
}

.lab-tests-section-slider .test-row .lab-test-grid-image, .lab-tests-section-slider .lab-tests-section .icon-col{
    width: 50% !important;
}


.lab-tests-section-slider.lab-tests-section .test-row {
    flex-direction: unset !important;
    align-items: stretch;
    overflow: hidden;
    background-size: cover;
    background-position: center left;
}

.test-row.item:after {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: #fffffff2;
    left: 0;
    top: 0;
}

.lab-tests-section-slider.lab-tests-section .icon-col p {
    padding: 5px 0 10px;
    font-size: 16px;
    width: 100%;
}

.lab-tests-section-slider.lab-tests-section .owl-item {
    padding: 10px;
}

.lab-tests-section-slider .test-row:hover {
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
}

.lab-tests-section-slider .icon-col {
    padding: 10px 10px 0px;
}

.lab-tests-section-slider .icon-col h4{
    font-size: 26px;
}

.lab-tests-section-cards .icon-col h4{
    font-size: 24px;
}
.lab-tests-section-slider.lab-tests-section.lab-tests-section-cards .icon-col p {
    padding: 15px 0 5px;
    min-height: 100px;
}
.lab-tests-section-slider .icon-col ul.listing-item2 {
    min-height: 145px;
}


/* lab-tests-section-slider */


section.lab-test-trust-signals-parent {
    position: relative;
}


.drip-at-home-inner {
    background: #ffffffde;
    padding: 45px;
    border-radius: 20px;
}

.sub-banner h1 {
    font-size: 60px;
}


 @media (max-width: 1400px) {
  .lab-tests-section .test-row {
    flex: 0 0 calc((100% - 100px) / 3);
}

.lab-tests-section {
    gap: 50px;
}

.lab-tests-section .icon-col {
    padding: 25px 5px 0px;
}

.lab-tests-section .test-row .lab-test-grid-image img {
    height: 13em;
}

.lab-tests-section .icon-col h4 {
    font-size: 22px;
}

.lab-tests-section-slider.lab-tests-section .icon-col p {
    padding: 5px 0 10px;
    font-size: 14px;
}

.sub-banner .banner-list ul{
    gap: 1rem !important;
}

.iv-steps-wrap {
    gap: 20px;
}

.lab-tests-section-cards .icon-col h4 {
    font-size: 20px !important;
    align-items: center;
}

h2.mb-4 {
    font-size: 44px;
}

.lab-test-trust-signals {
    margin-bottom: 0 !important;
}


 }

@media (max-width: 1200px) {
  .lab-tests-section .test-row {
    flex: 0 0 calc((100% - 80px) / 3);
}

.lab-tests-section {
    gap: 40px;
}

.lab-tests-section .icon-col {
    padding: 25px 5px 0px;
}

.lab-tests-section .test-row .lab-test-grid-image img {
    height: 11em;
}

.lab-tests-section .icon-col h4 {
    font-size: 22px;
}

.lab-tests-section .lab-icon img {
    height: 40px;
    max-width: 50px;
}

.lab-tests-section .icon-col p {
    padding: 20px 0 5px;
    line-height: 18px;
}
.lab-tests-section .icon-col p strong {
    padding: 20px 0 0px;
}

.lab-test-trust-box h5 {
    font-size: 16px;
}


.iv-step-content h4 {
    font-size: 16px;
}

.iv-step-content p {
    font-size: 13px;
    line-height: 1.2;
}

section.why-choose-therapy.section-gap.lab-test-categories {
    padding-top: 0;
}

.sub-banner h1 {
    font-size: 50px;
}


 }

  
@media (max-width: 992px) {
.lab-tests-section {
    gap: 30px;
}

.lab-tests-section .test-row {
    flex: 0 0 calc((100% - 60px) / 2);
}

.lab-test-trust-box p {
    font-size: 12px;
}

.lab-test-trust-box h5 {
        font-size: 16px !important;
    }

.sub-banner {
    min-height: 670px;
}


.sub-banner .banner-list ul {
    gap: 10px 0px !important;
    flex-direction: row;
    flex-wrap: wrap;
}

.sub-banner .banner-list ul li {
    width: 100%;
}

.iv-step-card {
    width: 48%;
    margin-bottom: 20px;
}

.iv-steps-wrap {
        gap: 4%  !important;
        flex-wrap: wrap;
    }

.lab-tests-section.lab-tests-section-cards .icon-col h4 {
    font-size: 18px !important;
}

h2.mb-4 {
        font-size: 34px;
    }


.lab-test-trust-box {
    width: 49%;
}

.drip-at-home a.primary-btn {
    margin-bottom: 0 !important;
}


.sub-banner h1 {
    font-size: 46px;
}


}

  /* ==========   ≤ 768 px  (tablets / large phones)  ========== */
  @media (max-width: 768px) {

.sub-banner {
    background-position: 70% 80%;
}

.lab-tests-section .icon-col h4 {
    font-size: 28px;
    font-weight: bold;
}

.lab-tests-section .test-row {
    flex: 0 0 calc((100% - 10px) / 1);
    padding: 0.8rem;
}
.lab-tests-section .test-row .lab-test-grid-image img {
        height: 17em;
    }

 .lab-tests-section .icon-col p {
        font-size: 14px;
        width: 80%;
        padding: 10px 0 5px;
    }

    .lab-tests-section .icon-col p strong{
        padding: 25px 0 0px;
    }

    .why-choose-therapy p {
    font-size: 13px;
}
.why-choose-therapy h2 {
    font-size: 30px;
}


.lab-test-trust-box h5 {
    font-size: 13px;
}

.lab-test-trust-signals {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 0 !important;
}

.lab-test-trust-box {
    display: flex;
    width: 50%;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.sub-banner {
        min-height: 580px;
    }

.lab-tests-section-slider.lab-tests-section .owl-item {
    padding: 10px 20px;
}

.lab-test-trust-box h5 {
        font-size: 14px !important;
    }

.sub-banner h1 {
        font-size: 36px;
    }
  }

  /* ==========   ≤ 480 px  (phones)  ========== */
  @media (max-width: 480px) {

    .sub-banner h1 {
        font-size: 28px;
    }

    .lab-tests-section .test-row .lab-test-grid-image img {
        height: 13em;
    }
    .lab-tests-section .icon-col h4 {
        font-size: 22px;
    }
    .lab-test-trust-box h5 {
    font-size: 12px;
}


.sub-banner a.primary-btn {
    width: 100%;
    font-size: 11px;
}

.sub-banner {
        background-position: 55% 100%;
    }
.iv-step-card {
        width: 100%;
        margin-bottom: 10px;
    }


.lab-tests-section.lab-tests-section-cards .icon-col h4 {
        font-size: 16px !important;
    }

.lab-tests-section .lab-icon img {
        height: 30px;
        max-width: 45px;
        margin-top: 3px;
    }

.lab-tests-section-slider.lab-tests-section.lab-tests-section-cards .icon-col p {
    padding: 15px 0 0px;
    min-height: 90px;
    font-size: 12px;
}


.lab-test-trust-box {
    width: 100%;
    margin-bottom: 10px;
}
.drip-at-home h2 {
    font-size: 30px !important;
}

    .drip-at-home-inner {
    background: #ffffffde;
    padding: 25px;
    border-radius: 20px;
}
}


</style>

</head>

<body>

<?php include 'includes/inc_header.php'; ?>





<!--======== banner ======-->

<div class="mob-inner-banner">

    <section class="sub-banner">

        <picture style="width: 100%;">
          <!-- Mobile -->
          <source media="(max-width: 768px)" 
                  srcset="<?= base_url() ?>assets/frontend/img/lab-test-at-home-banner-mobile.webp">

          <!-- Desktop -->
          <img src="<?= base_url() ?>assets/frontend/img/lab-test-at-home-banner.webp" alt="Luxury private lab testing at home in Dubai" fetchpriority="high" loading="eager" width="1920" height="600" style="height:600px; width:100%; object-fit:cover; object-position: bottom;">

        </picture>

        <div class="overlay">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <h1>Lab Test at Home Dubai</h1>

                        <nav aria-label="breadcrumb">

                            <ul class="breadcrumb">

                                <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>

                                <li class="active" aria-current="page">Lab Test at Home</li>

                            </ul>
                            <div class="mt-5" >
                                <p style="color:white;font-weight:700">Private diagnostic testing performed by licensed professionals, with samples analyzed by ISO-certified laboratories and results delivered securely.</p>
                            </div>
                            <div class="banner-list">
                                <ul class="d-flex gap-lg-5">
                                    <li>&#10003; ⭐ 5-Star Rated Healthcare Provider</li>
                                    <li>&#10003; ISO-Certified Laboratory Partners</li>
                                    <li>&#10003; DHA-Licensed Medical Professionals</li>
                                    <li>&#10003; Confidential & At-Home Testing</li>
                                </ul>
                            </div>
                            <div class="my-3">
                                <a class="primary-btn hvr-bounce-to-right green-btn mt-2 me-2" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer">
                                Book a Home Lab Test</a>
                                <a class="primary-btn hvr-bounce-to-right green-btn mt-2 me-2" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer">
                                Get Test Recommendation on WhatsApp</a>
                            </div>
                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<section class="section-gap" style="background-color: #f9f9f9;">

    <div class="container">

        <div class="row">

        <div class="col-md-12 text-center">

            <h2 class="mb-4"> How It Works</h2>
            
            <div class="iv-steps-section">
            <div class="iv-steps-wrap">
                <!-- Step 1 -->
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>1</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Choose Your Test</h4>
                    <p>Select a health panel or request guidance.</p>
                </div>
                </article>
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>2</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Book Your Appointment</h4>
                    <p>Schedule a convenient home visit at your preferred time.</p>
                </div>
                </article>
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>3</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Sample Collection at Home</h4>
                    <p>A licensed Healthcarebia professional collects your sample.</p>
                </div>
                </article>
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>4</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Secure Lab Results</h4>
                    <p>Results delivered digitally with optional medical follow-up.</p>
                </div>
                </article>
            </div>
        </div>
    </div>

    </div>

  </div>
</section>


<section class="why-choose-therapy section-gap">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center"><h2 class="text-center mb-4">Featured Health Test Packages</h2>

                    <!-- Begin new lab-tests layout -->
                    <div class="lab-tests-section lab-tests-section-slider owl-carousel">

                      <!-- Featured Lab Test 1 -->
                      <div class="test-row item" style="background-image: url(<?= base_url() ?>assets/frontend/img/common-and-functional-test.webp);">
                            <div class="icon-col">
                                <h4>Essential Health Panel</h4>
                                <p>Routine health biomarkers.</p>

                                <div class="text">
                                <ul class="listing-item2">
                                    <li>Complete Blood Count</li>
                                    <li>Vitamin D</li>
                                    <li>Cholesterol Profile</li>
                                    <li>Kidney Function</li>
                                    <li>Liver Function</li>
                                </ul>

                                <div class="price-blockl mt-3">
                                    <span>From AED</span>
                                    <h3>1,260* </h3>
                                    <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer">
                                        Book Test
                                    </a><br>
                                    <i>* T&amp;C apply</i>
                                </div>
                            </div>
                          </div>
                      </div>

                      <!-- Featured Lab Test 2 -->
                      <div class="test-row item" style="background-image: url(<?= base_url() ?>assets/frontend/img/womens-health-screening.webp);">
                            <div class="icon-col">
                                <h4>Advanced Health Screening</h4>
                                <p>Comprehensive diagnostic analysis.</p>

                                <div class="text">
                                <ul class="listing-item2">
                                    <li>Hormones</li>
                                    <li>Blood sugar markers</li>
                                    <li>Inflammation markers</li>
                                    <li>Cardiovascular risk indicators</li>
                                </ul>

                                <div class="price-blockl mt-3">
                                    <span>From AED</span>
                                    <h3>1,550* </h3>
                                    <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer">
                                        Book Test
                                    </a><br>
                                    <i>* T&amp;C apply</i>
                                </div>
                            </div>
                          </div>
                      </div>

                      <!-- Featured Lab Test 3 -->
                      <div class="test-row item" style="background-image: url(<?= base_url() ?>assets/frontend/img/allergy-and-food-Intolerance.webp);">
                            <div class="icon-col">
                                <h4>Food Intolerance Test</h4>
                                <p>Identify dietary sensitivities.</p>

                                <div class="text">
                                <ul class="listing-item2">
                                    <li>200+ food markers</li>
                                </ul>

                                <div class="price-blockl mt-3">
                                    <span>From AED</span>
                                    <h3>1,600* </h3>
                                    <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer">
                                        Book Test
                                    </a><br>
                                    <i>* T&amp;C apply</i>
                                </div>
                            </div>
                          </div>
                      </div>

                    </div>

                    <!-- End lab-tests-section -->

                </div>

            </div>

        </div>

    </div>

</section>


<section class="why-choose-therapy section-gap lab-test-categories">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center"><h2 class="text-center mb-4">Blood Test at Home Dubai</h2>

                   <!--  <p class="mb-3">At Healthcarebia, we provide the convenience of access to lab testing right at the comfort of your home. Get tested within the safety and privacy of your own space with results delivered quickly and securely.</p> -->

                    <!-- Begin new lab-tests layout -->
                    <div class="lab-tests-section lab-tests-section-slider lab-tests-section-cards owl-carousel">

                      <!-- Lab Test Categories 1 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-1.svg" alt="General Health Panels Tests" width="43" height="50">
                              </div>
                                <h4>General<br> Health Panels</h4>
                                <p>Comprehensive routine testing for overall health assessment and early detection of common conditions.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>annual-health-check-up" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                      <!-- Lab Test Categories 2 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-3.svg" alt="DNA & Genetic Testing" width="50" height="50">
                              </div>
                                <h4>DNA<br> & Genetic Testing</h4>
                                <p>Unlock insights into your genetic makeup for personalized health recommendations and risk assessment.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>dna-test" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                       <!-- Lab Test Categories 3 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-2.svg" alt="Allergy & Food Intolerance Testing" width="29" height="50">
                              </div>
                                <h4>Allergy<br> & Food Intolerance Testing</h4>
                                <p>Identify triggers and sensitivities to help you make informed dietary and lifestyle choices.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>allergy-test-general" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                      <!-- Lab Test Categories 4 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-4.svg" alt="Custom Blood Testing" width="50" height="50">
                              </div>
                                <h4>Custom <br> Blood Panels</h4>
                                <p>Tailored blood panels designed to meet your specific health concerns and monitoring needs.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>custom-blood-test" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                      <!-- Lab Test Categories 5 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-5.svg" alt="Hormone Testing" width="50" height="50">
                              </div>
                                <h4>Hormone<br> Testing</h4>
                                <p>Essential health screenings to maintain optimal wellness and track your health metrics over time.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>annual-health-check-up" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                      <!-- Lab Test Categories 6 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-6.svg" alt="STD Testing" width="70" height="50">
                              </div>
                                <h4>STD<br> Testing</h4>
                                <p>Confidential testing for sexual health and wellness to support your intimate well-being.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>std-testing" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                      <!-- Lab Test Categories 7 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-7.svg" alt="Men's Health Tests" width="50" height="50">
                              </div>
                                <h4>Men's <br> Health Tests</h4>
                                <p>Specialized health assessments focusing on male-specific health concerns and preventive care.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>men-advanced-package" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                      <!-- Lab Test Categories 8 -->
                      <div class="test-row item">
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-8.svg" alt="Womens Health Tests" width="35" height="50">
                              </div>
                                <h4>Women's<br> Health Tests</h4>
                                <p>Comprehensive women’s health testing including hormonal, reproductive, and preventive screenings.
                                </p>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= base_url() ?>female-advanced-package" target="_blank" rel="noopener noreferrer">Book Test</a>
                          </div>
                      </div>

                    </div>

                    <!-- End lab-tests-section -->

                    

                </div>

            </div>

        </div>

    </div>

</section>


<section class="lab-test-trust-signals-parent section-gap" style="background: url(<?= base_url() ?>/assets/frontend/img/bg-why-choose-healthcarebia-lab-testing.webp);">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

     <h2 class="text-center mb-4 pb-3">Why choose Healthcarebia for Lab Testing?</h2>

        <div class="lab-test-trust-signals mb-5">

          <div class="lab-test-trust-box">
            <img src="<?= base_url() ?>assets/frontend/img/google-reviews.svg" width="80" height="50" alt="google reviews icon" class="trust-google">
            <h5>5-Star Rated Healthcare Provider</h5>
            <p>Trusted by residents and executives across Dubai</p>
          </div>

          <div class="lab-test-trust-box">
            <img src="<?= base_url() ?>assets/frontend/img/iso.svg" alt="fda icon" width="60" height="50" class="trust-fda">
            <h5>ISO-Certified Laboratory Partners</h5>
            <p>Samples analyzed by internationally accredited laboratories.</p>
          </div>

          <div class="lab-test-trust-box">
            <img src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="dha icon" width="60" height="50" class="trust-nabidh">
            <h5>DHA-Licensed Medical Professionals</h5>
            <p>Qualified healthcare staff conducting safe and accurate sample collection.</p>
          </div>

          <div class="lab-test-trust-box">
            <img src="<?= base_url() ?>assets/frontend/img/home-service.svg" alt="Home service" width="60" height="50" class="trust-dha mt-4">
            <h5>Discreet At-Home Testing</h5>
            <p>Private medical home blood test Dubai services without clinic visits.</p>
          </div>

          <div class="lab-test-trust-box">
            <img src="<?= base_url() ?>assets/frontend/img/fast-result.svg" alt="dha" width="60" height="50" class="trust-dha mt-4">
            <h5>Fast Results</h5>
            <p>Many tests returned within 12–24 hours.</p>
          </div>

          <div class="lab-test-trust-box">
            <img src="<?= base_url() ?>assets/frontend/img/medical-record.svg" alt="dha" width="60" height="50" class="trust-dha mt-4">
            <h5>Secure Digital Results</h5>
            <p>Access your lab reports safely through encrypted digital delivery.</p>
          </div>

    </div>

   
     </div>
            </div>
        </div>
</section>


<section class="lab-test-trust-signals-parent section-gap pt-0" style="background: url(<?= base_url() ?>/assets/frontend/img/bg-why-choose-healthcarebia-lab-testing.webp);">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

    <div class="col-md-12">
        <h2 class="text-center mb-4">Testimonials</h2>
    </div>

    <div class="testimonials-slider owl-carousel py-3 mb-5">
        <div class="item">
            <div class="testimonials-box no-testimonials-box ">
                <div class="testimonials-text same">
                    <h4>Zuzana</h4>
                    <p>Very good services. The nurse was very good and professional. Very calm and friendly. Explained everything to my 8 year old. Highly recommend to all mums and people who need to be tested without stress.</p>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="testimonials-box no-testimonials-box ">
                <div class="testimonials-text same">
                    <h4>Reya</h4>
                    <p>The team was so quick and efficient and the nurses are lovely. Overall great experience, from booking till the end. Very punctual, and I feel so much better!!</p>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="testimonials-box no-testimonials-box ">
                <div class="testimonials-text same">
                    <h4>Zulfran</h4>
                    <p>Highly recommended! From start to finish these guys kept me in the loop throughout and did not disappoint in the bespoke service they promised they would offer.</p>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="testimonials-box no-testimonials-box ">
                <div class="testimonials-text same">
                    <h4>Flo</h4>
                    <p>Very friendly team, very straightforward service. I sent a quick WhatsApp message with my request, received a reply immediately and arranged an appointment within two hours.</p>
                </div>
            </div>
        </div>

    </div>
     </div>
            </div>
        </div>
</section>

<section class="drip-at-home section-gap" style="background-image: url(<?= base_url() ?>assets/frontend/img/take-control.webp);">

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="drip-at-home-inner">
                    <h2 style="font-size: 40px;">Take Control of Your Health Without Leaving Home</h2>

                    <div class="mt-4">
                    <a class="primary-btn hvr-bounce-to-right green-btn my-3 me-2" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer" style="">Book Lab Test</a>
                    <a class="primary-btn hvr-bounce-to-right green-btn my-3" href="<?= $whatsappHref ?>" target="_blank" rel="noopener noreferrer" style="">WhatsApp Consultation</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/inc_footer.php'; ?>

<?php include 'includes/inc_footer_scripts.php'; ?>


<?php include 'includes/inc_footer_scripts.php'; ?>
<script>
$(document).ready(function () {

    $('.lab-tests-section-slider').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: false,
        responsive: {
            0: { items: 1 },
            767: { items: 2, margin: 15 },
            992: { items: 2, margin: 15 },
            1200: { items: 3, margin: 30 }
        }
    });

    // $('.lab-test-trust-signals').owlCarousel({
    //     loop: true,
    //     margin: 10,
    //     nav: false,
    //     dots: false,
    //     autoplay: false,
    //     responsive: {
    //         0: { items: 1 },
    //         767: { items: 2 },
    //         992: { items: 5 }
    //     }
    // });


});
</script>

</body>

</html>