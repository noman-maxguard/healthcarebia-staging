<!doctype html>
<html lang="en">
<head>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://healthcarebia.ae/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "General Health",
      "item": "https://healthcarebia.ae/general-health"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Hair Loss Test",
      "item": "https://healthcarebia.ae/hair-loss-test"
    }
  ]
}
</script>


    <?php include 'includes/inc_head_tag.php'; ?>


</head>
<body>
<?php include 'includes/inc_header.php'; ?>


<section class="sub-banner sub-banner-3"
         style="background-image: url(<?= base_url() ?>assets/frontend/img/sub-banner-3.png);">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12"><h2>Hair Loss Test</h2>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>
                            <li><a class="hvr-underline-from-left menu-line">General Health</a></li>
                            <li class="active" aria-current="page">Hair Loss Test</li>
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
            <div class="col-md-5 mb-3"><img src="<?= base_url() ?>assets/frontend/img/hair-loss.png" alt=""
                                            class="img-fluid rounded "></div>
            <div class="col-md-7">
                <div class="inner-page-right">
                    <div class="mt-4"><p>The Hair Loss Test offers insights into potential factors contributing to hair
                            loss. It examines genetics, lifestyle, and health, providing a comprehensive understanding.
                            This assessment aids in making informed decisions about hair care. Remember, hair health can
                            reflect overall well-being.</p>
                        <ul class="listing-item3">
                            <li><img src="<?= base_url() ?>assets/frontend/img/biomarkers.svg" alt="">8 Biomarkers
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
                    <div class="mt-4"><span class="price-tag">AED 500</span></div>
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
                                <li>Complete Blood Count</li>
                                <li>Ferritin in Serum</li>
                                <li>Iron in Serum</li>
                                <li>DHEA-S</li>
                                <li>Vitamin B12</li>
                                <li>Vitamin D</li>
                                <li>Zinc in Plasma</li>
                                <li>TSH</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <ul class="listing-item4">
                                <li>Duration and Severity of Hair Loss</li>
                                <li>Stressed individuals</li>
                                <li>Suffering hair, skin, and nail health decline</li>
                                <li>Family or Personal History</li>
                                <li>Diet and Nutrition Changes</li>
                                <li>Medications</li>
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