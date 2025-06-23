<!doctype html>
<html lang="en">
<head>
    <?php include 'includes/inc_head_tag.php'; ?>


</head>
<body>

<?php include 'includes/inc_header.php'; ?>


<section class="sub-banner sub-banner-3"
         style="background-image: url(<?= base_url() ?>assets/frontend/img/sub-banner-3.png);">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12"><h2>Female Cancer Screening</h2>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>
                            <li><a class="hvr-underline-from-left menu-line">Women’s Health</a></li>
                            <li class="active" aria-current="page">Female Cancer Screening</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-3"><img src="<?= base_url() ?>assets/frontend/img/female-cancer-screening.png"
                                            alt="" class="img-fluid rounded ">
            </div>
            <div class="col-md-7">
                <div class="inner-page-right">
                    <div class="mt-4"><p>Promoting women's health and well-being, female cancer screening tests are
                            essential preventive measures. These tests aim to detect potential signs of cancer at early
                            stages, enabling timely medical intervention. Prioritizing women's comfort and health, these
                            screenings are crucial components of comprehensive healthcare.</p>
                        <ul class="listing-item3">
                            <li><img src="<?= base_url() ?>assets/frontend/img/biomarkers.svg" alt="">7 Biomarkers
                                tested
                            </li>
                            <li><img src="<?= base_url() ?>assets/frontend/img/hormones.svg" alt=""> Hormones,
                                Cholesterol, Blood Sugar & More
                            </li>
                            <li><img src="<?= base_url() ?>assets/frontend/img/home.svg" alt="">At home blood sample
                                collection
                            </li>
                            <li><img src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="">DHA-licensed nurses & lab
                                partners
                            </li>
                        </ul>
                    </div>
                    <div class="mt-4"><span class="price-tag">AED 600</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="tabs-block section-gap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tabs-design">
                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Markers Tested
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Related Symptoms
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <ul class="listing-item4">
                                <li>Alpha Feto Protein (AFP)</li>
                                <li>CA - 125</li>
                                <li>CA - 15.3</li>
                                <li>Carcino Embryonic Antigen (CEA)</li>
                                <li>Beta HCG Quantitative</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <ul class="listing-item4">
                                <li>Personal or Family History of Cancer</li>
                                <li>Recommended for Women over 40 years old</li>
                                <li>Unusual Lumps</li>
                                <li>Chronic Cough</li>
                                <li>Unexplained Weight Loss</li>
                                <li>Abnormal Bowel Habits</li>
                                <li>Exposure to carcinogens - Smoking</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/inc_footer.php'; ?>



<?php include 'includes/inc_footer_scripts.php'; ?>
</body>
</html>