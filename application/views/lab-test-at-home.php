<!doctype html>

<html lang="en">

<head>

    <?php include 'includes/inc_head_tag.php'; ?>

    <style>
      .lab-tests-section {
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content : center;
        align-items: center;
      }
      
      .lab-tests-section .test-row {
        display: flex;
        margin: 2rem;
        max-width: 900px;
        background: #ffffff;
        border-radius: 100px;
        padding:1rem;
        border: 1px solid #e8e8e8;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        justify-content:center;
        align-items: center;
        gap: 1rem;
      }

      .lab-tests-section .test-row:hover{
        box-shadow: 0 12px 36px rgba(0, 0, 0, 0.15);
        transform: translateY(-4px);
      }
      
      .lab-tests-section .test-row:nth-child(odd) {
        flex-direction: row;
        margin-left: 100px;
      }
      
      .lab-tests-section .test-row:nth-child(even) {
        flex-direction: row-reverse;
        margin-right: 100px;
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
        width: 140px;
        flex-shrink: 0;
        z-index: 2;
        position: relative;
      }
      
      .lab-tests-section .lab-icon {
        width: 100%;
        aspect-ratio: 1/1; 
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
        background-color: var(--green)
      }
      
      .lab-tests-section .lab-icon img {
        object-fit: contain;
        /* height: 10rem; */
      }
      
      
     @media (max-width: 992px) {

        /* card */
        .lab-tests-section .test-row {
          max-width: 700px;
          padding: 1rem;
          gap: 1rem;
          border-radius: 80px;
        }

        /* icon */
        .lab-tests-section .icon-col { width: 110px; }

        /* text */
        .lab-tests-section .text-box h5 { font-size: 1.2rem; }
        .lab-tests-section .text-box p  { font-size: 0.95rem; }
      }

      /* ==========   ≤ 768 px  (tablets / large phones)  ========== */
      @media (max-width: 768px) {

        /* stack icon above text */
        .lab-tests-section .test-row {
          flex-direction: column;
          margin: 1.25rem 1rem;
          padding: 0.9rem 1rem;
          text-align: center;
          border-radius: 60px;
        }

        /* cancel the 80-px stagger margins */
        .lab-tests-section .test-row:nth-child(odd),
        .lab-tests-section .test-row:nth-child(even) {
          margin-left: 0;
          margin-right: 0;
        }

        /* icon */
        .lab-tests-section .icon-col {
          width: 90px;
          margin-bottom: 0.75rem;
        }

        /* text */
        .lab-tests-section .text-box h5 { font-size: 1.1rem; }
        .lab-tests-section .text-box p  { font-size: 0.9rem; }
      }

      /* ==========   ≤ 576 px  (phones)  ========== */
      @media (max-width: 576px) {

        .lab-tests-section .test-row {
          max-width: 100%;
          margin: 1rem 0.5rem;
          padding: 1rem 0.8rem;
          gap: 0.75rem;
          border-radius: 60px;
        }

        .lab-tests-section .icon-col { width: 70px; }

        .lab-tests-section .text-box h5 { font-size: 1rem; }
        .lab-tests-section .text-box p  { font-size: 0.85rem; }
      }

      .lab-tests-section .lab-icon img { height:400px}
    </style>



</head>



<body>

<?php include 'includes/inc_header.php'; ?>





<!--======== banner ======-->

<div class="mob-inner-banner"

     style="background-image: url(<?= base_url() ?>assets/frontend/img/lab-test-at-home-mob-banner.webp);">

    <section class="sub-banner" style="background-image: url(<?= base_url() ?>assets/frontend/img/lab-test-at-home-desk-banner.webp);">

        <div class="overlay">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <h2>Lab Test at Home</h2>

                        <nav aria-label="breadcrumb">

                            <ul class="breadcrumb">

                                <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>

                                <li class="active" aria-current="page">Lab Test at Home</li>

                            </ul>

                        </nav>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<section class="why-choose-therapy section-gap light-blue">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center"><h2 class="text-center mb-4"> Lab test at home</h2>

                    <p>At Healthcarebia, we provide the convenience of access to lab testing right at the comfort of your home. Get tested within the safety and privacy of your own space with results delivered quickly and securely.</p>

                    <h5 class="mt-4 mb-4">We offer an extensive list of laboratory tests as your health and well-being is our priority:</h5>

                    <!-- Begin new lab-tests layout -->
                    <div class="lab-tests-section">

                      <!-- ROW 1 -->
                      <div class="test-row">
                        <div class="icon-col">
                          <a href="<?= base_url() ?>annual-health-check-up">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/common-and-functional-tests.svg"
                                  alt="Common & Functional Tests">
                            </div>
                          </a>
                        </div>

                        <a href="<?= base_url() ?>annual-health-check-up">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>Common &amp; Functional Tests</h5>
                              <p>Comprehensive routine testing for overall health assessment and early detection of common conditions.</p>
                            </div>
                          </div>
                        </a>
                      </div>

                      <!-- ROW 2 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>allergy-test-general">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>Allergy &amp; Food Intolerance</h5>
                              <p>Identify triggers and sensitivities to help you make informed dietary and lifestyle choices.</p>
                            </div>
                          </div>
                        </a>

                        <div class="icon-col">
                          <a href="<?= base_url() ?>allergy-test-general">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/allergy-and-food-intolerance.svg"
                                  alt="Allergy & Food Intolerance">
                            </div>
                          </a>
                        </div>
                      </div>

                      <!-- ROW 3 -->
                      <div class="test-row">
                        <div class="icon-col">
                          <a href="<?= base_url() ?>dna-test">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/dna-genetic-testing.svg"
                                  alt="DNA & Genetic Testing">
                            </div>
                          </a>
                        </div>

                        <a href="<?= base_url() ?>dna-test">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>DNA &amp; Genetic Testing</h5>
                              <p>Unlock insights into your genetic makeup for personalized health recommendations and risk assessment.</p>
                            </div>
                          </div>
                        </a>
                      </div>

                      <!-- ROW 4 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>custom-blood-test">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>Custom Blood Testing</h5>
                              <p>Tailored blood panels designed to meet your specific health concerns and monitoring needs.</p>
                            </div>
                          </div>
                        </a>

                        <div class="icon-col">
                          <a href="<?= base_url() ?>custom-blood-test">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/custom-blood-testing.svg"
                                  alt="Custom Blood Testing">
                            </div>
                          </a>
                        </div>
                      </div>

                      <!-- ROW 5 -->
                      <div class="test-row">
                        <div class="icon-col">
                          <a href="<?= base_url() ?>annual-health-check-up">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/general-health-tests.svg"
                                  alt="General Health Tests">
                            </div>
                          </a>
                        </div>

                        <a href="<?= base_url() ?>annual-health-check-up">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>General Health Tests</h5>
                              <p>Essential health screenings to maintain optimal wellness and track your health metrics over time.</p>
                            </div>
                          </div>
                        </a>
                      </div>

                      <!-- ROW 6 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>std-testing">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>Intimacy &amp; Wellness</h5>
                              <p>Confidential testing for sexual health and wellness to support your intimate well-being.</p>
                            </div>
                          </div>
                        </a>

                        <div class="icon-col">
                          <a href="<?= base_url() ?>std-testing">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/intimacy-and-wellness.svg"
                                  alt="Intimacy & Wellness">
                            </div>
                          </a>
                        </div>
                      </div>

                      <!-- ROW 7 -->
                      <div class="test-row">
                        <div class="icon-col">
                          <a href="<?= base_url() ?>men-advanced-package">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/mens-health-screening.svg"
                                  alt="Men's Health Screening">
                            </div>
                          </a>
                        </div>

                        <a href="<?= base_url() ?>men-advanced-package">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>Men's Health Screening</h5>
                              <p>Specialized health assessments focusing on male-specific health concerns and preventive care.</p>
                            </div>
                          </div>
                        </a>
                      </div>

                      <!-- ROW 8 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>female-advanced-package">
                          <div class="text-col">
                            <div class="text-box">
                              <h5>Women's Health Screening</h5>
                              <p>Comprehensive women’s health testing including hormonal, reproductive, and preventive screenings.</p>
                            </div>
                          </div>
                        </a>

                        <div class="icon-col">
                          <a href="<?= base_url() ?>female-advanced-package">
                            <div class="lab-icon">
                              <img src="<?= base_url() ?>assets/frontend/img/womens-health-screening.svg"
                                  alt="Women's Health Screening">
                            </div>
                          </a>
                        </div>
                      </div>

                    </div>

                    <!-- End lab-tests-section -->

                </div>

            </div>

        </div>

    </div>

</section>


<?php include 'includes/inc_footer.php'; ?>

<?php include 'includes/inc_footer_scripts.php'; ?>

</body>

</html>