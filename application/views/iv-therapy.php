<!doctype html>

<html lang="en">

<head>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    { "@type": "ListItem", "position": 1, "name": "Home", "item": "https://www.healthcarebia.ae/" },
    { "@type": "ListItem", "position": 2, "name": "IV Drip Dubai", "item": "https://www.healthcarebia.ae/iv-drip-dubai" }
  ]
}
</script>

</script>

    <?php include 'includes/inc_head_tag.php'; ?>



<style>
    .banner-list ul>li{
        list-style: none;
        color: white
    }
    @media(max-width:768px){
        .banner-list ul{
           flex-direction: column
        }
    }
    /* --- IV Steps (scoped) --- */
.iv-steps-section{
  background:var(--green); /* match your green */
  color:#fff;
  padding:28px 16px;
}

.iv-steps-wrap{
  max-width:1200px;
  margin:0 auto;
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:28px;
  align-items:start;
  position:relative;
}

/* Cards */
.iv-step-card{
  text-align:center;
  position:relative;
  padding:12px 10px 0;
}

.iv-step-media{
  position:relative;
  width:84px;
  height:84px;
  margin:0 auto 14px;
}

.iv-step-media img{
  width:100%;
  height:100%;
  object-fit:contain;
  display:block;
  filter: drop-shadow(0 2px 6px rgba(0,0,0,.15));
}

.iv-step-num{
  position:absolute;
  right:-10px; top:-10px;
  width:34px; height:34px;
  border-radius:50%;
  background:rgba(255,255,255,.18);
  border:1px solid rgba(255,255,255,.35);
  display:grid; place-items:center;
  font-weight:700;
  font-size:14px;
}

/* Headings & text */
.iv-step-content h4{
  font-size:18px;
  line-height:1.3;
  margin:0 0 8px;
  color: white;
  font-weight:800;
}

.iv-step-content p{
  margin:0;
  font-size:15px;
  line-height:1.55;
  font-weight:400;
  opacity:.95;
  color: white
}

/* link style for WhatsApp/CTA */
.iv-step-link{
  color:#fff;
  text-decoration:underline;
  text-underline-offset:3px;
}

.iv-step-count h3{
    color: white;
    border-radius: 50%;
}

/* Optional arrows between cards (desktop only) */
@media (min-width: 992px){
  /* .iv-step-card:not(:last-child)::after{
    content:"";
    position:absolute;
    right:-14px; top:42px;
    width:28px; height:2px;
    background:rgba(255,255,255,.35);
  } */
}

/* Tablet */
@media (max-width: 991.98px){
  .iv-steps-wrap{
    grid-template-columns:1fr 1fr;
  }
  .iv-step-card:nth-child(2)::after{ display:none; }
}

/* Mobile */
@media (max-width: 575.98px){
  .iv-steps-wrap{
    grid-template-columns:1fr;
    gap:18px;
  }
  .iv-step-media{ width:72px; height:72px; }
  .iv-step-content h4{ font-size:16px; }
  .iv-step-content p{ font-size:14px; }
  .iv-step-card::after{ display:none; }
}

</style>

</head>



<body>

<?php include 'includes/inc_header.php'; ?>





<!--======== banner ======-->

<div class="mob-inner-banner"

     style="background-image: url(<?= base_url() ?>assets/frontend/img/ocean.png);background-repeat: no-repeat;background-size: cover; background-position: center bottom;">

    <section class="sub-banner"

             style="background-image: url(<?= base_url() ?>assets/frontend/img/ocean.png);background-repeat: no-repeat;background-size: cover; background-position: bottom; min-height:600px">

        <div class="overlay">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <h2>IV Therapy Dubai</h2>

                        <nav aria-label="breadcrumb">

                            <ul class="breadcrumb">

                                <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>

                                <li><a class="hvr-underline-from-left menu-line">IV & Wellness</a></li>

                                <li class="active" aria-current="page">IV Therapy Dubai</li>

                            </ul>
                            <div class="mt-5" >
                                <p style="color:white;font-weight:700">IV drip home service Dubai | 24 &#215; 7 | Within 30 minutes at your doorstep</p>
                            </div>
                            <div class="banner-list">
                                <ul class="d-flex gap-lg-5">
                                    <li>&#10003; On demand and anywhere in the UAE</li>
                                    <li>&#10003; Feel better in less than 45 Minutes</li>
                                    <li>&#10003; Customized Vitamin Blends</li>
                                    <li>&#10003; DHA-Liscensed Nurses</li>
                                </ul>
                            </div>
                            <div class="my-3">
                                <a class="primary-btn hvr-bounce-to-right green-btn mt-2 me-2" href="<?= $whatsappHref ?>" target="_blank">
                                Book IV drip home service Dubai
                            </a><a class="primary-btn hvr-bounce-to-right green-btn mt-2" href="tel:+97142250823">
                                Call Now
                            </a>
                            </div>
                        </nav>

                    </div>

                </div>

            </div>

        </div>



    </section>

</div>



<section style="background-image: url(<?= base_url() ?>assets/frontend/img/iv-therapy-banner2.webp);"

         class="why-choose-therapy section-gap">

    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-md-4 d-flex flex-column justify-content-center align-items-center">

                <h2>Why choose Healthcarebia for

                    IV Therapy?</h2>



                <div class="row mt-4">

                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/iv-drip.svg" alt="IV Drip icon1" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>20% Off on IV Drip with Free Oxygen Therapy & Light Therapy on Your

                                    First Booking!*</p></div>

                        </div>

                    </div>



                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/doctors.svg" alt="IV Drip icon2" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>Free Home Visit & Free Doctor Consultation</p></div>

                        </div>

                    </div>



                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="IV Drip icon3" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>100% DHA and MOH Certified, fresh and active ingredients.</p></div>

                        </div>

                    </div>



                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/tick.svg" alt="IV Drip icon4" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>Complete attention to care and customer satisfaction.</p></div>

                        </div>

                    </div>



                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/home-care.svg" alt="IV Drip icon5" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>Specialised in IV Therapy and Home Health Care Services.</p></div>

                        </div>

                    </div>





                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/map-icon.svg" alt="IV Drip icon6" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>Tailored IV Drip home service anywhere in Dubai.</p></div>

                        </div>

                    </div>



                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/experience.svg" alt="IV Drip icon7" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>DHA Certified Team with 30+ years of collective experience</p></div>

                        </div>

                    </div>



                    <div class="col-md-4 mb-3">

                        <div class="therapy-choose-item">

                            <div>

                                <div class="img">

                                    <img src="<?= base_url() ?>assets/frontend/img/health.svg" alt="IV Drip icon8" loading="lazy">

                                </div>

                            </div>

                            <div class="text"><p>Your health is our priority.</p></div>

                        </div>

                    </div>





                </div>
                <a class="primary-btn hvr-bounce-to-right green-btn my-3" href="<?= $whatsappHref ?>" target="_blank">
                                Chat With Experts
                            </a>

            </div>

        </div>

    </div>

</section>

<section class="section-gap my-5" style="background-color: #f9f9f9;">

    <div class="container">

        <div class="row">

        <div class="col-md-12 text-center">

            <h2>Fast, Easy and Effective.<br> Get IV Drips at home in 3 easy steps</h2>
            
            <div class="iv-steps-section">
            <div class="iv-steps-wrap">
                <!-- Step 1 -->
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>1</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Book Your Appointment</h4>
                    <p>
                    Call or WhatsApp <a href="https://wa.me/97142250823" class="iv-step-link">+97142250823</a> to book your
                    IV drip at home in Dubai, choose from safe, effective options like a hydration drip.
                    </p>
                </div>
                </article>
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>2</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Nurse at Your Doorstep</h4>
                    <p>
                    Our DHA-licensed nurses ensure safe and professional IV drip administration for fast, effective results.
                    </p>
                </div>
                </article>
                <article class="iv-step-card">
                <div class="iv-step-count">
                    <h3>3</h3>
                </div>
                <div class="iv-step-content">
                    <h4>Get Recharged</h4>
                    <p>
                    Rejuvenate your body in ~45 minutes with home IV therapy, boost energy, immunity, and hydration fast.
                    </p>
                </div>
                </article>
            </div>
        </div>
        <div class="contact-buttons d-flex gap-3 justify-content-center align-items-center pb-5 pt-3">
            <a class="primary-btn hvr-bounce-to-right green-btn mt-2" href="tel:+97142250823">
                                WhatsApp IV therapy near me
                            </a><a class="primary-btn hvr-bounce-to-right green-btn mt-2" href="#contact_us">
                                Request a Call Back
                            </a>
        </div>
    </div>

    </div>

  </div>



<section class="section-gap what-therapy-bg"

         style="background-image: url(<?= base_url() ?>assets/frontend/img/gala-big-img.webp);">

    <div class="container">

        <div class="row">

            <div class="col-md-7">

                <h2>What is IV Therapy ?</h2>

                <p>
                IV infusion delivers fluids, medications, and nutrients directly into your bloodstream. It’s ideal for fast recovery,
                especially with a hydration drip after travel, heat, or illness. Our DHA-registered team provides IV drip at home across Dubai so you get clinical-grade care in total comfort.
                </p>

                <p>In the usual setting, you will be requested to seat yourself in a relaxed and comfortable manner.

                    With the necessary paperwork completed, your DHA registered nurse will inspect the IV site and

                    ensure its sanitation. Our nurses are specially trained for IV Therapy to ensure a safe and

                    enjoyable service. A simple prick and insertion of the IV cannula will allow your IV Drip to

                    commence. Once your IV Therapy session is complete, the cannula will be removed and discarded. It’s

                    truly as simple as that!</p>



                <h6 class="mt-4">Benefits of IV Therapy</h6>

                <ul class="listing-item">

                    <li>Rapid and direct delivery of fluids and nutrients into the bloodstream.</li>

                    <li>99% immediate absorption and availability of substances.</li>

                    <li>Improves your overall health and well-being.</li>

                    <li>Helps replenish electrolytes, vitamins, minerals and more.</li>

                    <li>Supports immune system function.</li>

                    <li>Quick, efficient, and easy IV Therapy at home.</li>

                    <li>Lasting effects on health and well-being.</li>

                </ul>
                <a class="primary-btn hvr-bounce-to-right green-btn my-3" href="<?= $whatsappHref ?>" target="_blank" style="">
                                Get A Free Consultation
                            </a>

            </div>

        </div>

        <div class="row d-block d-md-none mt-3">

            <div class="col-12">

                <img src="<?= base_url() ?>assets/frontend/img/gala-big-img-mob.webp" alt="IV Drip Dubai" class="img-fluid" loading="lazy">

            </div>

        </div>

    </div>

</section>


</section>


<!-- <section class="section-gap iv-drip-block">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 text-center">

                <h2>Express IV Drip</h2>



            </div>

        </div>



        <div class="row mt-4">

            <div class="col-md-4 mb-3">

                <div class="drip-box">



                    <div class="img">

                        <div class="img-inner"><img src="<?= base_url() ?>assets/frontend/img/hydration-iv-drip.webp" alt="Swift Hydration IV Drip Dubai" class="img-fluid" loading="lazy"></div>

                    </div>

                    <div class="text">

                        <h6>Swift Hydration IV Drip</h6>

                        <ul class="listing-item2">

                            <li>Rapid Skin Hydration</li>

                            <li>Increase in Energy</li>

                            <li>Reduced Skin inflammation</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>400* </h3>

                        <i>* T&C apply</i> 
                        </div>

                    </div>





                </div>

            </div>





            <div class="col-md-4 mb-3">

                <div class="drip-box">



                    <div class="img">

                        <div class="img-inner"><img src="<?= base_url() ?>assets/frontend/img/her-iv-drip.webp" alt="Her IV Drip Dubai" class="img-fluid" loading="lazy"></div>

                    </div>

                    <div class="text">

                        <h6>Her IV Drip</h6>

                        <ul class="listing-item2">

                            <li>Hydration</li>

                            <li>Relief from cramps &amp; belly aches</li>

                            <li>Nutrient boost</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>975* </h3>
                            <i>* T&C apply</i> 
                        </div>

                    </div>





                </div>

            </div>





            <div class="col-md-4 mb-3">

                <div class="drip-box">



                    <div class="img">

                        <div class="img-inner"><img src="<?= base_url() ?>assets/frontend/img/glow-skin-iv-drip.webp" alt="Glow Skin IV Drip Dubai" class="img-fluid" loading="lazy"></div>

                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>glutathione-iv-drip">
                            <h6>Glow Skin IV Drip</h6>
                        </a>

                        <ul class="listing-item2">



                            <li>Improve skin hydration</li>



                            <li>Reduce fine lines wrinkles</li>



                            <li>Promotes collagen production</li>



                            <li>Powerful anti-oxidant</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>720* </h3>
                            <i>* T&C apply</i> 
                        </div>

                    </div>





                </div>

            </div>





            <div class="col-md-4 mb-3">

                <div class="drip-box">



                    <div class="img">

                        <div class="img-inner"><img src="<?= base_url() ?>assets/frontend/img/energy-iv-drip.webp" alt="Energy IV Drip Dubai" class="img-fluid" loading="lazy"></div>

                    </div>

                    <div class="text">

                        <h6>Energy IV Drip</h6>

                        <ul class="listing-item2">



                            <li>Improved energy</li>



                            <li>Improved focus mental clarity</li>



                            <li>Improved athletic performance</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>715* </h3>
                            <i>* T&C apply</i> 
                        </div>

                    </div>





                </div>

            </div>





            <div class="col-md-4 mb-3">

                <div class="drip-box">



                    <div class="img">

                        <div class="img-inner"><img src="<?= base_url() ?>assets/frontend/img/mega-c-iv-drip.webp" alt="Mega C IV Drip Dubai" class="img-fluid" loading="lazy"></div>

                    </div>

                    <div class="text">

                        <h6>Mega C IV Drip</h6>

                        <ul class="listing-item2">

                            <li>Source of concentrated Vitamin C</li>

                            <li>Detox</li>

                            <li>Increased immunity</li>

                            <li>Reduced fatigue</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>650* </h3>
                            <i>* T&C apply</i> 
                        </div>

                    </div>





                </div>

            </div>





        </div>



    </div>

</section> -->





<section class="section-gap iv-drip-block light-bg-color">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 text-center">

                <h2>Signature IV Drip</h2>



            </div>

        </div>



        <div class="row mt-4">

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">

                        <div class="img-inner"><a href="<?= base_url() ?>myers-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/myers-cocktail.webp" alt="Myers Cocktail Dubai also energy iv drip dubai" class="img-fluid" loading="lazy"></a></div>

                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>myers-iv-drip">
                            <h6>Myers Cocktail</h6>
                        </a>
                        

                        <ul class="listing-item2">

                            <li>Immunity booster</li>

                            <li>Increased vitality &amp; energy</li>

                            <li>Improved digestion</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>2,300* </h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">

                        <div class="img-inner"><a href="<?= base_url() ?>hangover-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/hangover-iv-drip.webp" alt="Pre/Post Party IV drip Dubai" class="img-fluid" loading="lazy"></a></div>

                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>hangover-iv-drip">
                            <h6>Pre/Post Party IV drip</h6>
                        </a>
                        <ul class="listing-item2">

                            <li>Relief of Nausea, Headache and Body Pains</li>

                            <li>Alcohol detoxification</li>

                            <li>Energy increase</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>1,600* </h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">

                        <div class="img-inner"><a href="<?= base_url() ?>nad-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/nad-iv-drip.webp" alt="NAD+ IV Drip Dubai" class="img-fluid" loading="lazy"></a></div>

                    </div>

                    <div class="text">
                        <a href="<?= base_url() ?>nad-iv-drip">
                            <h6>NAD+ IV Drip</h6>
                        </a>
                        

                        <ul class="listing-item2">

                            <li>Reverse the biological clock on a cellular level</li>

                            <li>Promotes healthy brain function</li>

                            <li>Slows cognitive decline</li>

                            <li>Repairs damaged DNA</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>1,900* </h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">

                        <div class="img-inner"><a href="<?= base_url() ?>immune-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/immune-booster-iv-drip.webp" alt="Immune System Mega Boost IV Drip Dubai" class="img-fluid" loading="lazy"></a>

                        </div>

                    </div>

                    <div class="text">
                        <a href="<?= base_url() ?>immune-iv-drip">
                            <h6>Immune System Mega Boost IV Drip</h6>
                        </a>


                        <ul class="listing-item2">

                            <li>Improved immunity</li>

                            <li>Improved healing ability</li>

                            <li>Prevents infections</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>1,700*</h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">



                    <div class="img">

                        <div class="img-inner">
                            
                        <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/beauty-iv-drip.webp" alt="Beauty IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                    
                    </div>

                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>iv-drip-dubai"><h6>Beauty IV Drip</h6></a>

                        <ul class="listing-item2">

                            <li>Improved skin &amp; hair health</li>

                            <li>Fights against free radicals</li>

                            <li>Radiant &amp; glowing skin</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>1,600* </h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-4 mb-3">

        <div class="drip-box">

            <div class="img">

                <div class="img-inner">
                    
                    <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/cold-flu-iv-drip.webp" alt="Cold Flu IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                
                </div>

            </div>

            <div class="text">

                <a href="<?= base_url() ?>iv-drip-dubai"><h6>Cold &amp; Flu IV Drip</h6></a>

                <ul class="listing-item2">

                    <li>Boosts immune system</li>

                    <li>Relieves cold &amp; flu symptoms</li>

                    <li>Speeds up recovery</li>

                </ul>

                <div class="price-blockl mt-3">

                    <span>From AED</span>

                    <h3>1,800* </h3>
                    <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                    <i>* T&C apply</i> 

                </div>

            </div>

        </div>

        </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">

                        <div class="img-inner">
                            
                            <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/jet-lag-iv-drip.webp" alt="Jet Lag IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                        
                        </div>

                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>iv-drip-dubai"><h6>Jet Lag IV Drip</h6></a>

                        <ul class="listing-item2">

                            <li>Relieves jet lag fatigue</li>

                            <li>Rehydrates and reenergizes</li>

                            <li>Restores your natural body clock</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>1,500* </h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">
                        <div class="img-inner">
                            
                            <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/weight-loss-iv-drip.webp" alt="Weight Loss IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                            
                        </div>
                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>iv-drip-dubai"><h6>Weight Loss IV Drip</h6></a>

                        <ul class="listing-item2">
                            <li>Enhances metabolism and fat burning</li>
                            <li>Boosts energy and endurance</li>
                            <li>Supports weight management</li>
                        </ul>

                        <div class="price-blockl mt-3">
                            <span>From AED</span>
                            <h3>1,600*</h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i>
                        </div>

                    </div>

                </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="drip-box">

                        <div class="img">
                            <div class="img-inner">
                                <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/sunburn-iv-drip.webp" alt="Sunburn IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                            </div>
                        </div>

                        <div class="text">
                            <a href="<?= base_url() ?>iv-drip-dubai"><h6>Sunburn IV Drip</h6></a>
                            <ul class="listing-item2">
                                <li>Soothes sunburn symptoms</li>
                                <li>Rehydrates and cools the skin</li>
                                <li>Reduces inflammation and discomfort</li>
                            </ul>
                            <div class="price-blockl mt-3">
                                <span>From AED</span>
                                <h3>1,800*</h3>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                                </a><br>
                                <i>* T&C apply</i>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-md-4 mb-3">

                    <div class="drip-box">

                        <div class="img">
                            <div class="img-inner">
                                <a href="<?= base_url() ?>energy-focus-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/energy-focus-iv-drip.webp" alt="Energy and Focus IV Drip Dubai, Hydration drip" class="img-fluid" loading="lazy"></a>
                            </div>
                        </div>

                        <div class="text">
                            <a href="<?= base_url() ?>energy-focus-iv-drip">
                                <h6>Energy &amp; Focus IV Drip</h6>
                            </a>
                            
                            <ul class="listing-item2">
                                <li>Boosts mental clarity and focus</li>
                                <li>Enhances overall energy levels</li>
                                <li>Supports cognitive function and concentration</li>
                            </ul>
                            <div class="price-blockl mt-3">
                                <span>From AED</span>
                                <h3>1,100*</h3>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                                <i>* T&C apply</i>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-4 mb-3">

                    <div class="drip-box">

                        <div class="img">
                            <div class="img-inner">
                                <a href="<?= base_url() ?>good-sleep-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/good-sleep-iv-drip.webp" alt="Good Sleep IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                            </div>
                        </div>

                        <div class="text">
                            <a href="<?= base_url() ?>good-sleep-iv-drip">
                                <h6>Good Sleep IV Drip</h6>
                            </a>
                            
                            <ul class="listing-item2">
                                <li>Promotes relaxation and deep sleep</li>
                                <li>Enhances sleep quality</li>
                                <li>Supports stress relief for a peaceful night</li>
                            </ul>
                            <div class="price-blockl mt-3">
                                <span>From AED</span>
                                <h3>1,300*</h3>
                                <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                                <i>* T&C apply</i>
                            </div>
                        </div>

                    </div>

                </div>


            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">

                        <div class="img-inner">
                            
                            <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/ultra-detox.webp" alt="Ultra Detox IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                    
                        </div>

                    </div>

                    <div class="text">

                        <a href="<?= base_url() ?>iv-drip-dubai"><h6>Ultra Detox IV Drip</h6></a>

                        <ul class="listing-item2">

                            <li>Fights against Harmful Molecules</li>

                            <li>Powerful Antioxidant</li>

                            <li>Improved digestive system and liver functions</li>

                        </ul>

                        <div class="price-blockl mt-3">

                            <span>From AED</span>

                            <h3>1,300* </h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i> 
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">
                        <div class="img-inner">
                            <a href="<?= base_url() ?>gut-health-iv-drip"><img src="<?= base_url() ?>assets/frontend/img/food-poisoning-iv-drip.webp" alt="Food Poisoning IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                        </div>
                    </div>

                    <div class="text">
                        <a href="<?= base_url() ?>gut-health-iv-drip">
                            <h6>Gut Health IV Drip</h6>
                        </a>
                        
                        <ul class="listing-item2">
                            <li>Supports detoxification and rehydration</li>
                            <li>Boosts immunity to fight off toxins</li>
                            <li>Helps alleviate symptoms of food poisoning</li>
                        </ul>
                        <div class="price-blockl mt-3">
                            <span>From AED</span>
                            <h3>1,600*</h3>
                            <a class="primary-btn hvr-bounce-to-right green-btn" href="<?= $whatsappHref ?>" target="_blank">
                                Book Now
                            </a><br>
                            <i>* T&C apply</i>
                            
                        </div>
                    </div>

                </div>

            </div>


            <div class="col-md-4 mb-3">

                <div class="drip-box">

                    <div class="img">
                        <div class="img-inner">
                            <a href="<?= base_url() ?>iv-drip-dubai"><img src="<?= base_url() ?>assets/frontend/img/custom-iv-drip.webp" alt="Custom IV Drip Dubai" class="img-fluid" loading="lazy"></a>
                        </div>
                    </div>

                    <div class="text">
                        <a href="<?= base_url() ?>iv-drip-dubai"><h6>Custom IV Drip</h6></a>
                        <ul class="listing-item2">
                            <li>Tailored vitamin and mineral blend</li>
                            <li>Personalized to your specific health needs</li>
                            <li>Flexible treatment plans for optimal results</li>
                        </ul>
                        <div class="price-blockl mt-3">
                            <a class="primary-btn hvr-bounce-to-right green-btn mt-2" href="<?= $whatsappHref ?>" target="_blank">
                                Inquire Now*
                            </a>
                        </div>
                    </div>

            </div>

        </div>

        </div>

    </div>

</section>



<section class="drip-at-home section-gap" style="background-image: url(<?= base_url() ?>assets/frontend/img/gwyer-bg.webp);">

    <div class="container">

        <div class="row">

            <div class="col-md-7">

                <div class="drip-at-home-inner">

                    <h2>IV Drip at Home Dubai</h2>

                    <p>IV Drip at Home services in Dubai offers convenient and personalized intravenous treatments in

                        the comfort of your own residence.Home IV drip Dubai appointments are available 24×7 for your convenience. These services are provided by trained medical professionals

                        who bring all the necessary equipment and supplies to administer intravenous therapies safely

                        and efficiently. IV Drip at home in Dubai is becoming increasingly popular due to its numerous

                        benefits.</p>

                    <div class="mt-4">

                        <h3>Benefits of IV Therapy</h3>

                        <ul class="listing-item">

                            <li>Convenience: Patients can receive IV treatments without the need to visit a hospital or

                                clinic, saving time and reducing hassle.

                            </li>

                            <li>Comfort: Being in a familiar environment promotes relaxation and can enhance the overall

                                experience of receiving intravenous therapies.

                            </li>

                            <li>Personalized Care: IV Drip at Home allows for personalized treatment plans tailored to

                                individual needs and conditions.

                            </li>

                            <li>Privacy: Patients can maintain their privacy and confidentiality while receiving IV

                                therapy at home.

                            </li>

                            <li>Time-saving: By avoiding travel and waiting times, IV Drip at Home saves valuable time

                                for patients with busy schedules.

                            </li>

                        </ul>
                        <a class="primary-btn hvr-bounce-to-right green-btn my-3" href="<?= $whatsappHref ?>" target="_blank" style="">
                                Book Your IV Drip Now
                            </a>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<section class="section-gap" style="background-color: #f9f9f9;">

  <div class="container">

    <div class="row">

      <div class="col-md-12 text-center">

        <h2>Professional IV Therapy at Home in Dubai</h2>
        
        <p>
        Healthcarebia offers exceptional IV drip home service Dubai a convenient, clinical-grade
        home IV therapy delivered by DHA-certified nurses. Whether you need a rapid hydration drip at home,a targeted vitamin IV drip at home, or ongoing wellness support, we tailor your IV drip at home to your goals. Searching for an IV treatment near me or IV therapy near me in Dubai? We come to you anywhere in the city for safe, effective care.
        </p>

      </div>

    </div>

  </div>

</section>


<section class="faq-block section-gap">

    <div class="container">

        <h2><h2>IV Therapy At Home in Dubai FAQs</h2></h2>

        <div class="row">

            <div class="col-md-6">

                <div class="accordion pt-md-3">

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>1</span>  How long does an IV drip take at home in Dubai?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data" style="display: none;">
                            <p>Our IV Drips can take up to 1 hour and 30 minutes to complete. Although our Swift Drip can hydrate and replenish you in as low as 15 minutes!</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>2</span> Where can I have an IV drip in Dubai, at home, hotel, or office?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Our IV Therapy services are available across all of Dubai. Whether it's at home, your office, a friend’s house, or even a hotel, our team is certified to care for your health.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>3</span> Does IV Therapy Really Work?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Yes! IV Therapy is backed by science, as it allows for 100% absorption of vitamins and nutrients, bypassing the digestive system. Many people report immediate benefits, including increased energy, improved hydration, and enhanced immunity.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>4</span> Can I customize my IV drip at home?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Absolutely! IV Therapy can be tailored to individual needs, allowing healthcare providers to create custom blends of vitamins, minerals, and medications to address specific health concerns or wellness goals.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>5</span> What Is the Difference Between Medical IV Therapy and Wellness IV Therapy?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Medical IV Therapy is used in hospitals to treat conditions like dehydration, vitamin deficiencies, or certain diseases, while Wellness IV Therapy focuses on enhancing energy, hydration, detoxification, and overall health maintenance.</p>
                        </div>
                    </div>
                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>6</span> Who is an ideal candidate for IV therapy at home?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Ideal candidates are adults who have nutrient deficiencies, chronic fatigue, frequent dehydration from illness. It’s also beneficial for people seeking a quick nutrient boost.</p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="accordion pt-md-3">

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>7</span> How soon can I feel the effects of an IV drip?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>The effects of IV Therapy are immediate, although we recommend allowing a couple of hours for your body to fully benefit and absorb the nutrients.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>8</span> Does an IV drip hurt, and is it safe?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Rest assured our team of DHA-registered nurses and doctors are carefully trained and have many years of experience in IV Therapy. A small prick and it’ll be over before you know it! Plus, our ingredients are 100% DHA and MOH approved, ensuring the highest safety standards.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>9</span> Is IV Therapy FDA-approved?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>While IV drips containing vitamins and hydration fluids are widely used and safe, their approval varies based on local healthcare regulations. It’s important to choose certified providers who use FDA-approved ingredients.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>10</span> How do I know which IV Drip is best for me?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data" style="display: none;">
                            <p>Not sure? Don’t worry, our friendly team is just one call away to assist you in making the best decision for your optimum well-being.</p>
                        </div>
                    </div>

                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>11</span> How Is IV Therapy Different from Drinking Water and Taking Supplements?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>Unlike drinking water or taking supplements, IV Therapy bypasses the digestive system, ensuring 100% absorption of nutrients directly into the bloodstream. This makes it faster, more effective, and longer-lasting in addressing hydration and nutrient deficiencies.</p>
                        </div>
                    </div>
                    <div class="accordion-box">
                        <div class="accordion-item">
                            <h5><span>12</span> How often should I receive IV therapy to maintain optimal benefits?</h5>
                            <span class="plus-minus"></span>
                        </div>
                        <div class="data">
                            <p>The ideal frequency varies based on your individual needs and goals. For acute issues like dehydration or illness, a single session may suffice. For ongoing maintenance, such as immune support, athletic recovery, or chronic nutrient deficiencies, many people start with weekly or biweekly sessions and then taper to monthly tune-ups.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>





<section class="section-gap testimonials more-space-bottom">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center">

                <h2>Testimonials</h2>

            </div>

            <div class="col-md-12">

                <div class="testimonials-slider owl-carousel">

                    <div class="item">

                        <div class="testimonials-box no-testimonials-box ">





                            <div class="testimonials-text same">

                                <h4>Samman</h4>

                                <p>My first IV therapy in Dubai, and it was fantastic. I’d definitely recommend it. I tried the post party drip and
                                     felt the results the next day.</p>

                            </div>



                        </div>

                    </div>





                    <div class="item">

                        <div class="testimonials-box no-testimonials-box">

                            <div class="testimonials-text same">

                                <h4>Beaussen</h4>

                                <p>

                                    Very professional. 2 nurses are attentive assuring the good level of service.

                                    Tried NAD+ IV drip, and the results were fantastic. I recommend this company!

                                </p> 

                            </div>

                        </div>

                    </div>



                    <div class="item">

                        <div class="testimonials-box no-testimonials-box">

                            <div class="testimonials-text same">

                                <h4>Zahra</h4>

                                <p>Very efficient and excellent service provided by the team. I feel refreshed after the beauty IV drip.
                                    Definitely worth it.</p>

                            </div>

                        </div>

                    </div>



                    <div class="item">

                        <div class="testimonials-box no-testimonials-box">

                            <div class="testimonials-text same">

                                <h4>Ali</h4>

                                <p>Fantastic service! Well-being at your doorstop with great knowledge and experience.

                                    The staff is highly qualified and professional showing why they are DHA-certified. Highly recommended.</p>

                            </div>

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

</section>

<section class="section-gap" id="contact_us" style="background-image: url(<?= base_url() ?>assets/frontend/img/iv-therapy-banner.webp); background-size: cover; background-position: left;">
         <div class="container">
            <div class="row">
               <div class="col-md-7" style="background-color: white">
                  <div class="card-style6 p-5">
                     <h4 class="mb-4">Book an Appointment</h4>
                     <div class="row">
                        <div class="col-md-12">
                           <?php
                              $form_index = 'appointment';
                              
                              ?>
                           <form class="row request-form contact_form" method="post" id="form_<?= $form_index ?>">
                              <div class="col-md-12 mb-3"><input class="form-input" type="text"
                                 placeholder="Name"
                                 name="fname" required="required"></div>
                              <!-- <div class="col-md-12 mb-3"><input class="form-input" type="text"
                                 placeholder="Last Name" name="lname"></div> -->
                              <div class="col-md-12 mb-3"><input class="form-input" type="email" placeholder="Email"
                                 name="email" required="required"></div>
                              <div class="col-md-12 mb-3"><input class="form-input" type="text" placeholder="Phone"
                                 name="phone"
                                 onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                 maxlength="13"></div>
                              <div class="col-md-12 mb-3">
                                <!-- <select name="customer_type" class="form-input" required>
                                    <option value="" disabled selected>— Type —</option>
                                    <option value="b2b">Business</option>
                                    <option value="b2c">Consumer</option>
                                </select> -->
                              </div>
                              <div class="col-md-12 mb-3"><textarea class="form-textarea" placeholder="Message"
                                 name="message"></textarea>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <img src="<?= base_url() ?>mycaptcha/<?= $form_index ?>" width="100"
                                          height="50" alt="Security Captcha Code">
                                    </div>
                                    <div class="col-md-6">
                                       <input type="text" name="captcha" id="captcha" autocomplete="off"
                                          class="form-input"
                                          required placeholder="Enter Captcha Code *">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <input type="hidden" name="url_from" value="<?= current_url() ?>">
                                 <input type="hidden" name="form_name" value="<?= $form_index ?>">
                                 <input type="hidden" name="page_name" value="Contact Us Page">
                                 <input type="hidden" name="source" value="">
                                 <!-- <input class="primary-btn" type="submit" value="Submit"> -->
                                 <button id="submit_<?= $form_index ?>"
                                    class=" primary-btn hvr-bounce-to-right green-btn mt-2 primary-btn-submit"
                                    type="submit" value="Submit"><span>Submit</span></button>
                              </div>
                              <div class="col-md-12">
                                 <div style="font-weight:bold;color:#fb4c42; font-size: 17px !important;"
                                    id="error_<?= $form_index ?>">
                                 </div>
                                 <div style="font-weight:bold;color:#7ac142; font-size: 17px !important;"
                                    id="success_<?= $form_index ?>"></div>
                              </div>
                           </form>
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