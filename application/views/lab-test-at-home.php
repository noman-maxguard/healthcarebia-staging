<!doctype html>

<html lang="en">

<head>

    <?php include 'includes/inc_head_tag.php'; ?>

    <style>
      /* Lab Tests Single Column Alternating Style */
      .lab-tests-section {
        max-width: 900px;
        margin: 0 auto;
      }
      
      .lab-tests-section .test-row {
        display: flex;
        align-items: center;
        margin-bottom: 4rem;
        position: relative;
      }
      
      /* Alternating layout - odd rows (icon-text) */
      .lab-tests-section .test-row:nth-child(odd) {
        flex-direction: row;
        /* padding-left: 80px; */
      }
      
      /* Alternating layout - even rows (text-icon) */
      .lab-tests-section .test-row:nth-child(even) {
        flex-direction: row-reverse;
        /* padding-right: 80px; */
      }
      
      .lab-tests-section .text-col {
        flex: 1;
        z-index: 1;
      }
      
      /* Curved rectangle text box */
      .lab-tests-section .text-box {
        background: #ffffff;
        border-radius: 25px;
        padding: 2rem 2.5rem;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        border: 1px solid #e8e8e8;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
      }
      
      .lab-tests-section .text-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.15);
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
      
      /* Icon positioning for overlap */
      .lab-tests-section .test-row:nth-child(odd) .icon-col {
        margin-left: -80px;
        margin-right: 40px;
      }
      
      .lab-tests-section .test-row:nth-child(even) .icon-col {
        margin-right: -80px;
        margin-left: 40px;
      }
      
      /* Clickable circular icon design */
      .lab-tests-section .lab-icon-link {
        display: block;
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: #4a90e2;
        box-shadow: 0 10px 30px rgba(74, 144, 226, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-decoration: none;
        position: relative;
        overflow: hidden;
      }
      
      .lab-tests-section .lab-icon-link:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(74, 144, 226, 0.4);
        text-decoration: none;
      }
      
      .lab-tests-section .lab-icon {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
      }
      
      .lab-tests-section .lab-icon img {
        max-width: 60px;
        max-height: 60px;
        filter: brightness(0) invert(1);
      }
      
      /* Different solid colors for variety */
      .lab-tests-section .test-row:nth-child(1) .lab-icon-link {
        background: #667eea;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(2) .lab-icon-link {
        background: #f093fb;
        box-shadow: 0 10px 30px rgba(240, 147, 251, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(3) .lab-icon-link {
        background: #4facfe;
        box-shadow: 0 10px 30px rgba(79, 172, 254, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(4) .lab-icon-link {
        background: #43e97b;
        box-shadow: 0 10px 30px rgba(67, 233, 123, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(5) .lab-icon-link {
        background: #fa709a;
        box-shadow: 0 10px 30px rgba(250, 112, 154, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(6) .lab-icon-link {
        background: #a8edea;
        box-shadow: 0 10px 30px rgba(168, 237, 234, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(7) .lab-icon-link {
        background: #ff9a9e;
        box-shadow: 0 10px 30px rgba(255, 154, 158, 0.3);
      }
      
      .lab-tests-section .test-row:nth-child(8) .lab-icon-link {
        background: #a18cd1;
        box-shadow: 0 10px 30px rgba(161, 140, 209, 0.3);
      }
      
      /* Mobile responsiveness */
      @media (max-width: 767px) {
        .lab-tests-section .test-row,
        .lab-tests-section .test-row:nth-child(odd),
        .lab-tests-section .test-row:nth-child(even) {
          flex-direction: column;
          text-align: center;
          padding: 0;
          margin-bottom: 3rem;
        }
        
        .lab-tests-section .test-row:nth-child(odd) .icon-col,
        .lab-tests-section .test-row:nth-child(even) .icon-col {
          margin: 0 0 -30px 0;
          z-index: 2;
        }
        
        .lab-tests-section .text-box {
          padding: 3rem 1.5rem 1.5rem 1.5rem;
        }
        
        .lab-tests-section .lab-icon-link {
          width: 100px;
          height: 100px;
        }
        
        .lab-tests-section .lab-icon img {
          max-width: 45px;
          max-height: 45px;
        }
      }
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

            <!-- ROW 1 - Icon then Text -->
            <div class="test-row">
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/common-and-functional-tests.svg"
                         alt="Common & Functional Tests">
                  </div>
                </a>
              </div>
              <div class="text-col">
                <div class="text-box">
                  <h5>Common &amp; Functional Tests</h5>
                  <p>Comprehensive routine testing for overall health assessment and early detection of common conditions.</p>
                </div>
              </div>
            </div>

            <!-- ROW 2 - Text then Icon -->
            <div class="test-row">
              <div class="text-col">
                <div class="text-box">
                  <h5>Allergy &amp; Food Intolerance</h5>
                  <p>Identify triggers and sensitivities to help you make informed dietary and lifestyle choices.</p>
                </div>
              </div>
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/allergy-and-food-intolerance.svg"
                         alt="Allergy & Food Intolerance">
                  </div>
                </a>
              </div>
            </div>

            <!-- ROW 3 - Icon then Text -->
            <div class="test-row">
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/dna-genetic-testing.svg"
                         alt="DNA & Genetic Testing">
                  </div>
                </a>
              </div>
              <div class="text-col">
                <div class="text-box">
                  <h5>DNA &amp; Genetic Testing</h5>
                  <p>Unlock insights into your genetic makeup for personalized health recommendations and risk assessment.</p>
                </div>
              </div>
            </div>

            <!-- ROW 4 - Text then Icon -->
            <div class="test-row">
              <div class="text-col">
                <div class="text-box">
                  <h5>Custom Blood Testing</h5>
                  <p>Tailored blood panels designed to meet your specific health concerns and monitoring needs.</p>
                </div>
              </div>
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/custom-blood-testing.svg"
                         alt="Custom Blood Testing">
                  </div>
                </a>
              </div>
            </div>

            <!-- ROW 5 - Icon then Text -->
            <div class="test-row">
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/general-health-tests.svg"
                         alt="General Health Tests">
                  </div>
                </a>
              </div>
              <div class="text-col">
                <div class="text-box">
                  <h5>General Health Tests</h5>
                  <p>Essential health screenings to maintain optimal wellness and track your health metrics over time.</p>
                </div>
              </div>
            </div>

            <!-- ROW 6 - Text then Icon -->
            <div class="test-row">
              <div class="text-col">
                <div class="text-box">
                  <h5>Intimacy &amp; Wellness</h5>
                  <p>Confidential testing for sexual health and wellness to support your intimate well-being.</p>
                </div>
              </div>
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/intimacy-and-wellness.svg"
                         alt="Intimacy & Wellness">
                  </div>
                </a>
              </div>
            </div>

            <!-- ROW 7 - Icon then Text -->
            <div class="test-row">
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
                  <div class="lab-icon">
                    <img src="<?= base_url() ?>assets/frontend/img/mens-health-screening.svg"
                         alt="Men's Health Screening">
                  </div>
                </a>
              </div>
              <div class="text-col">
                <div class="text-box">
                  <h5>Men's Health Screening</h5>
                  <p>Specialized health assessments focusing on male-specific health concerns and preventive care.</p>
                </div>
              </div>
            </div>

            <!-- ROW 8 - Text then Icon -->
            <div class="test-row">
              <div class="text-col">
                <div class="text-box">
                  <h5>Women's Health Screening</h5>
                  <p>Comprehensive women's health testing including hormonal, reproductive, and preventive screenings.</p>
                </div>
              </div>
              <div class="icon-col">
                <a href="#" class="lab-icon-link">
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