<!doctype html>

<html lang="en">

<head>

    <?php include 'includes/inc_head_tag.php'; ?>

<style>

  .why-choose-therapy{
        background-color: #F2F2F2 !important;
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
    padding: 30px 0 0px;
}

.sub-banner {
    background-position: 70% 80%;
    background-size: cover;
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
    font-size: 26px;
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

 }

  
@media (max-width: 992px) {
.lab-tests-section {
    gap: 30px;
}

.lab-tests-section .test-row {
    flex: 0 0 calc((100% - 60px) / 2);
}

.lab-tests-section .icon-col p {
    font-size: 14px;
}

}

  /* ==========   ≤ 768 px  (tablets / large phones)  ========== */
  @media (max-width: 768px) {

.sub-banner {
    background-position: 70% 80%;
}

.lab-tests-section .test-row {
    flex: 0 0 calc((100% - 10px) / 1);
}
.lab-tests-section .test-row .lab-test-grid-image img {
        height: 17em;
    }

  }

  /* ==========   ≤ 480 px  (phones)  ========== */
  @media (max-width: 480px) {
    .lab-tests-section .test-row .lab-test-grid-image img {
        height: 15em;
    }
}

</style>



</head>



<body>

<?php include 'includes/inc_header.php'; ?>





<!--======== banner ======-->

<div class="mob-inner-banner"

     style="background-image: url(<?= base_url() ?>assets/frontend/img/lab-test-at-home-banner.webp);">

    <section class="sub-banner" style="background-image: url(<?= base_url() ?>assets/frontend/img/lab-test-at-home-banner.webp);">

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


<section class="why-choose-therapy section-gap">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center"><h2 class="text-center mb-4">Home diagnostic test</h2>

                    <p>At Healthcarebia, we provide the convenience of access to lab testing right at the comfort of your home. Get tested within the safety and privacy of your own space with results delivered quickly and securely.</p>

                    <!-- Begin new lab-tests layout -->
                    <div class="lab-tests-section">

                      <!-- Lab Test Categories 1 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>annual-health-check-up">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/common-and-functional-test.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-1.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>Common<br> & Functional Tests</h4>
                                <p>Comprehensive routine testing for overall health assessment and early detection of common conditions.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 2 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>allergy-test-general">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/allergy-and-food-Intolerance.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-2.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>Allergy<br> & Food Intolerance</h4>
                                <p>Identify triggers and sensitivities to help you make informed dietary and lifestyle choices.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 3 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>dna-test">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/dna-and-genetic-testing.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-3.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>DNA<br> & Genetic Testing</h4>
                                <p>Unlock insights into your genetic makeup for personalized health recommendations and risk assessment.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 4 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>custom-blood-test">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/custom-blood-testing.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-4.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>Custom <br> Blood Testing</h4>
                                <p>Tailored blood panels designed to meet your specific health concerns and monitoring needs.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 5 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>annual-health-check-up">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/general-health-tests.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-5.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>General<br> & Health Tests</h4>
                                <p>Essential health screenings to maintain optimal wellness and track your health metrics over time.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 6 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>std-testing">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/intimacy-and-wellness.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-6.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>Intimacy<br> & Wellness</h4>
                                <p>Confidential testing for sexual health and wellness to support your intimate well-being.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 7 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>men-advanced-package">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/mens-health-screening.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-7.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>Men's <br> Health Screening</h4>
                                <p>Specialized health assessments focusing on male-specific health concerns and preventive care.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
                      </div>

                      <!-- Lab Test Categories 8 -->
                      <div class="test-row">
                        <a href="<?= base_url() ?>female-advanced-package">
                          <div class="lab-test-grid-image">
                            <img src="<?= base_url() ?>assets/frontend/img/womens-health-screening.webp" alt="Common & Functional Tests">
                          </div>
                          <div class="icon-col">
                              <div class="lab-icon">
                                <img src="<?= base_url() ?>assets/frontend/img/labtest-8.svg" alt="Common & Functional Tests">
                              </div>
                                <h4>Women's<br> Health Screening</h4>
                                <p>Comprehensive women’s health testing including hormonal, reproductive, and preventive screenings.
                                <strong>Read more</strong>
                                </p>
                          </div>
                        </a>
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