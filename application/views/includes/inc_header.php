<style>
    /* pulsating glow for Whatsapp icon */
    .whatsapp-icon {
        display: inline-flex;               /* use flex to center */
        justify-content: center;
        align-items: center;
        width: 64px;                        /* larger clickable area */
        height: 64px;
        border-radius: 50%;
        position: relative;
        animation: pulse-glow 1.5s infinite ease-in-out;
        overflow: visible;                  /* ensure glow isn't clipped */
    }

    .whatsapp-icon i {
        font-size: 40px;                    /* bigger icon */
        color: #fff;                        /* keep icon white */
        z-index: 1;
        position: relative;
    }

    @keyframes pulse-glow {
        0% {
            box-shadow:
                0 0 5px   rgba(37,211,102,0.6),
                0 0 10px  rgba(37,211,102,0.4),
                0 0 20px  rgba(37,211,102,0.2);
            transform: scale(1);
        }
        50% {
            box-shadow:
                0 0 15px  rgba(37,211,102,0.8),
                0 0 30px  rgba(37,211,102,0.6),
                0 0 45px  rgba(37,211,102,0.4);
            transform: scale(1.1);
        }
        100% {
            box-shadow:
                0 0 5px   rgba(37,211,102,0.6),
                0 0 10px  rgba(37,211,102,0.4),
                0 0 20px  rgba(37,211,102,0.2);
            transform: scale(1);
        }
    }
</style>
<div class="floating-block">
    <ul>
        <li class="mb-2 d-block d-md-none mb-4">
            <a aria-label="Phone" class="whatsapp-icon phone-icon" href="tel:+971 4 225 0823" target="_blank"> <i class="fa fa-phone" aria-hidden="true" style="font-size:32px"></i> </a></li>
        <li>
            <div class="d-none d-md-block">
                <a aria-label="Whatsapp" class="whatsapp-icon" href="<?= $whatsappHref ?>" target="_blank"> <i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
            </div>
            <div class="d-block d-md-none">
                <a aria-label="Whatsapp" class="whatsapp-icon" href="<?= $whatsappHref ?>" target="_blank"> <i class="fab fa-whatsapp" aria-hidden="true"></i> </a>
            </div>
        </li>
    </ul>
</div>
<!--======== header ======-->
<header>
    <div class="header-main-menu">
        <div class="container-fluid">
            <a href="<?= base_url() ?>" class="logo"> 
                <img width="271" height="38" src="<?= base_url() ?>assets/frontend/img/logo.webp" class="img-fluid" alt="Healthcarebia"> 
            </a>
            <nav class="main-menu">
                <ul class="menu-list">
                    <li><a href="<?= base_url()?>" class="hvr-underline-from-left menu-line">Home</a></li>
                    <li><a href="<?= base_url()?>about-us" class="hvr-underline-from-left menu-line">About us</a></li>
                    <li><a href="<?= base_url()?>iv-drip-dubai" class="hvr-underline-from-left menu-line">IV & Wellness</a>
                        <div class="mega-drop">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img">
                                                        <img width="85" height="76" src="<?= base_url() ?>assets/frontend/img/iv-drip-thumb.webp" alt="Healthcarebia">
                                                    </div>
                                                    <div class="text">
                                                        <h4>IV Drip</h4>
                                                        <p>Revitalize with IV therapy in the comfort of home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>iv-drip-dubai" class="hvr-underline-from-left menu-line2">IV Therapy</a></li>
                                                <li><a href="<?= base_url() ?>glutathione-iv-drip" class="hvr-underline-from-left menu-line2">Glutathione IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>nad-iv-drip" class="hvr-underline-from-left menu-line2">NAD+ IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>hangover-iv-drip" class="hvr-underline-from-left menu-line">Post Party IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>gut-health-iv-drip" class="hvr-underline-from-left menu-line">Gut Health IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>good-sleep-iv-drip" class="hvr-underline-from-left menu-line">Good Sleep IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>energy-focus-iv-drip" class="hvr-underline-from-left menu-line">Energy & Focus IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>myers-iv-drip" class="hvr-underline-from-left menu-line">Myers Cocktail IV Drip</a></li>
                                                <li><a href="<?= base_url() ?>immune-iv-drip" class="hvr-underline-from-left menu-line">Immune System Boost IV Drip</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img">
                                                        <img width="85" height="76" src="<?= base_url() ?>assets/frontend/img/wellness-thumb.webp" alt="Healthcarebia">
                                                    </div>
                                                    <div class="text">
                                                        <h4>Wellness</h4>
                                                        <p>Elevate your wellness journey right at home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>oxygen-therapy" class="hvr-underline-from-left menu-line2">Oxygen Therapy</a></li>
                                                <li><a href="<?= base_url() ?>doctor-on-call" class="hvr-underline-from-left menu-line2">Doctor on Call</a></li>
                                                <li><a href="<?= base_url() ?>nurse-at-home" class="hvr-underline-from-left menu-line2">Nurse at Home</a></li>
                                                <li><a href="<?= base_url() ?>ebook" class="hvr-underline-from-left menu-line2">Download our Ebook</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?= base_url() ?>lab-test-at-home" class="hvr-underline-from-left menu-line">Lab Test at Home</a>
                        <div class="mega-drop">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img">
                                                        <img width="85" height="76" src="<?= base_url() ?>assets/frontend/img/women-health.webp" alt="Healthcarebia">
                                                    </div>
                                                    <div class="text">
                                                        <h4>Women's Health</h4>
                                                        <p>Convenient Women's Health Screening in the Comfort of Home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="<?= base_url() ?>female-cancer-screening" class="hvr-underline-from-left menu-line2">Female Cancer Screening</a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url() ?>thyroid-profile" class="hvr-underline-from-left menu-line2">Thyroid Profile</a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url() ?>female-hormone-profile" class="hvr-underline-from-left menu-line2">Female Hormone Profile </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url() ?>anaemia-profile" class="hvr-underline-from-left menu-line2">Anaemia Profile </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url() ?>female-fertility-profile" class="hvr-underline-from-left menu-line2">Female Fertility Profile </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url() ?>women-weight-loss-profile" class="hvr-underline-from-left menu-line2">Women Weight loss Profile </a>
                                                </li>
                                                <li>
                                                    <a href="<?= base_url() ?>pcos-package" class="hvr-underline-from-left menu-line2">PCOS Package </a></li>
                                                <li>
                                                    <a href="<?= base_url() ?>female-advanced-package" class="hvr-underline-from-left menu-line2">Female Advanced Package</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76" src="<?= base_url() ?>assets/frontend/img/mens-health.webp" alt="Healthcarebia"></div>
                                                    <div class="text">
                                                        <h4>Men's Health</h4>
                                                        <p>Proactive Men's Health Screening in the Comfort of Home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>male-cancer-screening"
                                                       class="hvr-underline-from-left menu-line2">Male Cancer
                                                        Screening</a></li>
                                                <li><a href="<?= base_url() ?>male-fertility-profile"
                                                       class="hvr-underline-from-left menu-line2">Male Fertility
                                                        Profile</a></li>
                                                <li><a href="<?= base_url() ?>male-weight-loss-profile"
                                                       class="hvr-underline-from-left menu-line2">Male Weight loss
                                                        Profile</a></li>
                                                <li><a href="<?= base_url() ?>men-advanced-package"
                                                       class="hvr-underline-from-left menu-line2">Men Advanced
                                                        Package</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76"
                                                                src="<?= base_url() ?>assets/frontend/img/functional-tests.webp"
                                                                alt="Healthcarebia"></div>
                                                    <div class="text">
                                                        <h4>Common and Functional Tests</h4>
                                                        <p>Unlocking Wellness: Functional Tests at Home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>cardiac-risk-markers"
                                                       class="hvr-underline-from-left menu-line2">Cardiac Risk
                                                        Markers</a></li>
                                                <li><a href="<?= base_url() ?>basic-immunity-check"
                                                       class="hvr-underline-from-left menu-line2">Basic Immunity
                                                        Check</a></li>
                                                <li><a href="<?= base_url() ?>liver-profile"
                                                       class="hvr-underline-from-left menu-line2">Liver Profile</a></li>
                                                <li><a href="<?= base_url() ?>basic-diabetes-screening"
                                                       class="hvr-underline-from-left menu-line2">Basic Diabetes
                                                        Screening</a></li>
                                                <li><a href="<?= base_url() ?>kidney-profile"
                                                       class="hvr-underline-from-left menu-line2">Kidney Profile</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>arthritis-profile"
                                                       class="hvr-underline-from-left menu-line2">Arthritis Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76"
                                                                src="<?= base_url() ?>assets/frontend/img/std-screening-profile.webp"
                                                                alt="Healthcarebia">
                                                    </div>
                                                    <div class="text">
                                                        <h4>Intimacy and Wellness</h4>
                                                        <p>Confidential STD Screening Profile in Your Home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>std-testing"
                                                       class="hvr-underline-from-left menu-line2">STD Screening
                                                        Profile</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76"
                                                                src="<?= base_url() ?>assets/frontend/img/dna-test2.webp"
                                                                alt="Healthcarebia"></div>
                                                    <div class="text">
                                                        <h4>DNA Test</h4>
                                                        <p>Genetic health insights with DNA test at home</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>dna-test" class="hvr-underline-from-left menu-line2">DNA TEST</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76"
                                                                src="<?= base_url() ?>assets/frontend/img/custom-blood-test.webp"
                                                                alt="Healthcarebia"></div>
                                                    <div class="text">
                                                        <h4>Custom Blood
                                                            Test</h4>
                                                        <p>Tailored Health Insights: Custom Blood Testing</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>custom-blood-test"
                                                       class="hvr-underline-from-left menu-line2">Custom Blood Test</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76"
                                                                src="<?= base_url() ?>assets/frontend/img/allergy-food.webp"
                                                                alt="Healthcarebia"></div>
                                                    <div class="text">
                                                        <h4>Allergy & Food Intolerance Tests</h4>
                                                        <p>Unlocking Dietary Wellness: Allergy and Intolerance
                                                            Testing</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>acne-investigation-allergy"
                                                       class="hvr-underline-from-left menu-line2">Acne Investigation
                                                        Allergy</a></li>
                                                <li><a href="<?= base_url() ?>allergy-test-general"
                                                       class="hvr-underline-from-left menu-line2">Allergy Test - General
                                                        (40+ Food Intolerance and Respiratory)</a></li>
                                                <li><a href="<?= base_url() ?>food-intolerance-test"
                                                       class="hvr-underline-from-left menu-line2">Food Intolerance -
                                                        Extended (200+ foods)</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mega-item same">
                                            <div class="hed">
                                                <div>
                                                    <div class="img"><img width="85" height="76"
                                                                src="<?= base_url() ?>assets/frontend/img/general-health.webp"
                                                                alt="Healthcarebia"></div>
                                                    <div class="text">
                                                        <h4>General Health</h4>
                                                        <p>Promoting Wellness through General Health Testing</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul>
                                                <li><a href="<?= base_url() ?>alopecia-test"
                                                       class="hvr-underline-from-left menu-line2">Alopecia Test</a></li>
                                                <li><a href="<?= base_url() ?>hair-loss-test"
                                                       class="hvr-underline-from-left menu-line2">Hair Loss Test</a>
                                                </li>
                                                <li><a href="<?= base_url() ?>vitiligo-test"
                                                       class="hvr-underline-from-left menu-line2">Vitiligo Test</a></li>
                                                <li><a href="<?= base_url() ?>psoriasis-investigation" class="hvr-underline-from-left menu-line2">Psoriasis Investigation</a></li>
                                                <li><a href="<?= base_url() ?>annual-health-check-up" class="hvr-underline-from-left menu-line2">Annual Health Check up</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?= base_url() ?>blog" class="hvr-underline-from-left menu-line">Blog</a></li>
                    <li><a href="<?= base_url() ?>contact-us" class="hvr-underline-from-left menu-line">Contact us</a>
                    </li>
                    <li class="mobile-off">
                        <a href="tel:+97142250823" class="white-color phone-icon2"><i class="fa fa-phone hvr-fade hv-opcity white-color"></i> <span  class="number-showing">+971 4 22 50823</span> </a>
                    </li>
                    <li><a href="<?= base_url() ?>contact-us" class="primary-btn hvr-bounce-to-right white-btn small-btn border-btn booking-btn">Book Now</a></li>
                </ul>
                <button class="menu-toggle" aria-label="menu-toggle"><span class="line a"></span> <span
                            class="line b"></span> <span class="line c"></span></button>
            </nav>
        </div>
    </div>
</header>
<div class="mobile-menu">
    <div class="container"></div>
</div>