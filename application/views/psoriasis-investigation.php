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
                <div class="col-12"><h2>Psoriasis Investigation</h2>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>
                            <li><a class="hvr-underline-from-left menu-line">General Health</a></li>
                            <li class="active" aria-current="page">Psoriasis Investigation</li>
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
            <div class="col-md-5 mb-3"><img src="<?= base_url() ?>assets/frontend/img/psoriasis.png" alt=""
                                            class="img-fluid rounded "></div>
            <div class="col-md-7">
                <div class="inner-page-right">
                    <div class="mt-4"><p>A medical assessment designed to aid in the diagnosis of psoriasis, a chronic
                            skin condition. Through examination, this test provides valuable insights to healthcare
                            professionals, helping them formulate accurate treatment plans and improve patients' quality
                            of life.</p>
                        <ul class="listing-item3">
                            <li><img src="<?= base_url() ?>assets/frontend/img/biomarkers.svg" alt="">2 Biomarkers
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
                            <li><img src="<?= base_url() ?>assets/frontend/img/12-hour.svg" alt="">Results in as little
                                as 12 hours.
                            </li>
                            <li><img src="<?= base_url() ?>assets/frontend/img/results-icon.svg" alt="">Fast, secure,
                                and confidential results.
                            </li>
                        </ul>
                    </div>
                    <div class="mt-4"><span class="price-tag">AED 700</span></div>
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
                                    aria-selected="true"> Markers Tested
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false"> Related Symptoms
                            </button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-why-healthcarebia" type="button" role="tab"
                                    aria-controls="nav-profile" aria-selected="false"> Why Healthcarebia
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <ul class="listing-item4">
                                <li>HLA B27</li>
                                <li>Anti CCP Abs</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <ul class="listing-item4">
                                <li>Experience of red, scaly patches of skin</li>
                                <li>Itchy and painful skin</li>
                                <li>Health History</li>
                                <li>Flaky and irritated skin</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-why-healthcarebia" role="tabpanel"
                             aria-labelledby="nav-profile-tab">
                            <ul class="listing-item5">
                                <li>First in the MENA region to achieve the ISO 15189-2012 accreditation.</li>
                                <li>State of the art incorporation of technology and equipment to ensure maximum
                                    efficiency, accuracy, and quality of results.
                                </li>
                                <li>Customized end to end laboratory information system, co-developed with expert
                                    Pathologists.
                                </li>
                                <li>Global Investigation Laboratories from around the world.</li>
                                <li>Incorporating Next Gen Technologies – Genomics, Proteomics, Metabolomics, Molecular
                                    Biology, Digital Pathology.
                                </li>
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