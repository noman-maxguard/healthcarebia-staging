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
</style>
</head>


<body>

<?php include 'includes/inc_header.php'; ?>

<!--======== banner ======-->

<section class="main-banner">

    <div class="overlay">

        <div class="container">

            <div class="row">

                <div class="col-12 col-sm-7">

                    <div class="banner-inner">

                        <h1>Healing Body, Mind and Soul.</h1>

                        <p>IV Therapy by Healthcarebia; your trusted partner in IV Infusion Therapy, is now available in

                            Dubai.</p>

                        <a href="<?= base_url() ?>about-us" class="primary-btn hvr-bounce-to-right white-btn mt-2">Read More About Us</a>
                        <br>
                        <button
                            id="iv-quiz-btn"
                            class="primary-btn hvr-bounce-to-right white-btn mt-2" style="border: none">
                            Get Your Personalized IV Drip
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <video style="object-fit: cover; background-size: cover; width: 100%; height: 100%;" preload="auto" playsinline="" autoplay="" loop="" muted="" width="320" height="200">

        <source src="<?= base_url() ?>assets/frontend/img/banner-video.mp4">

    </video>

</section>


<!--======== about ======-->


<section class="about-block section-gap no-soacing-bottom">

    <div class="container">

        <div class="row">

            <div class="col-md-6">

                <div class="about-text">

                    <!-- <h5>Welcome to</h5> -->

                    <h2  ><span>Welcome to</span> Healthcarebia</h2>
                    <h3>Premium At-Home Healthcare in Dubai</h3>

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

        </div>

    </div>

    <div class="d-block d-sm-none">

        <img width="619" height="268" src="<?= base_url() ?>assets/frontend/img/about-block-mob.webp" alt="Home Healthcare Dubai" class="img-fluid">

    </div>

</section>

<section class="services-block">

    <div class="overlay section-gap">

        <div class="container">

            <div class="row">

                <div class="col-12 text-center">

                    <h2>Our services</h2>

                </div>

                <div class="col-12 mt-4">

                    <div class="services-slider owl-carousel">

                        <div class="item">

                            <a href="<?= base_url() ?>iv-drip-dubai" class="services-slider-item">

                                <div class="services-title">

                                    <h3>IV Therapy</h3>

                                </div>

                                <img loading="lazy" decoding="async" width="335" height="428" src="<?= base_url() ?>assets/frontend/img/iv-drip-img.webp" class="img-fluid"
                                     alt="IV Drip Dubai">

                            </a>

                        </div>

                        <div class="item">

                            <a href="<?= base_url() ?>custom-blood-test" class="services-slider-item">

                                <div class="services-title">

                                    <h3>Lab Test at Home</h3>

                                </div>

                                <img loading="lazy" decoding="async" width="335" height="428" src="<?= base_url() ?>assets/frontend/img/lab-testing.webp" class="img-fluid"
                                     alt="Lab Test Dubai">

                            </a>

                        </div>

                        <div class="item">

                            <a href="<?= base_url() ?>doctor-on-call" class="services-slider-item">

                                <div class="services-title">

                                    <h3>Doctor on Call</h3>

                                </div>

                                <img loading="lazy" decoding="async" width="335" height="428" src="<?= base_url() ?>assets/frontend/img/doctor-on-call.webp" class="img-fluid"
                                     alt="Doctor on Call Dubai">

                            </a>

                        </div>

                        <div class="item">

                            <a href="<?= base_url() ?>glutathione-iv-drip" class="services-slider-item">

                                <div class="services-title">

                                    <h3>Glutathione IV Drip</h3>

                                </div>

                                <img loading="lazy" decoding="async" width="335" height="428" src="<?= base_url() ?>assets/frontend/img/glutathione-img.webp" class="img-fluid"
                                     alt="Glutathione IV Drip Dubai">

                            </a>

                        </div>

                        <div class="item">

                            <a href="<?= base_url() ?>nad-iv-drip" class="services-slider-item">

                                <div class="services-title">

                                    <h3>NAD+ IV Drip</h3>

                                </div>

                                <img loading="lazy" decoding="async" width="335" height="428" src="<?= base_url() ?>assets/frontend/img/nad-iv.webp" class="img-fluid"
                                     alt="NAD+ IV Drip Dubai">

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <video style="object-fit: cover; background-size: cover; width: 100%; height: 100%;" preload="auto" playsinline="" autoplay="" loop="" muted="" width="320" height="200">

        <source src="<?= base_url() ?>assets/frontend/img/beach.mp4" type="video/mp4">

    </video>

</section>

<section class="section-gap why-choose" style="background-image: url(<?= base_url() ?>assets/frontend/img/why-choose-bg.webp);">

    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-md-4">

                <div class="why-choose-out">

                    <h2>Why choose us?</h2>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="choose-item">

                                <div class="item-icon">
                                    
                                    <span>
                                        
                                        <img loading="lazy" decoding="async" width="50" height="60" class="img-fluid" src="<?= base_url() ?>assets/frontend/img/expertise.svg"
                                             alt="Expertise">
                                    
                                    </span>

                                </div>

                                <div class="text">

                                    <h4>Expertise</h4>

                                    <p>Our highly experienced team of DHA-certified multinational nurses and doctors are

                                        ready to care for all your needs, customizing your experience for the best

                                        service.</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="choose-item">

                                <div class="item-icon">

                                    <span>
                                        
                                        <img loading="lazy" decoding="async" width="61" height="54" src="<?= base_url() ?>assets/frontend/img/excellence.svg" alt="Excellence">
                                    
                                    </span>

                                </div>

                                <div class="text">

                                    <h4>Excellence</h4>

                                    <p>With over 30+ years of collective expertise in IV Therapy, we are committed to

                                        enhancing your well-being through our excellence in service.</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="choose-item">

                                <div class="item-icon">
                                    
                                    <span>
                                        
                                        <img loading="lazy" decoding="async" width="29" height="58" src="<?= base_url() ?>assets/frontend/img/custom-made.svg" alt="Custom-made">
                                    
                                    </span>

                                </div>

                                <div class="text">

                                    <h4>Custom-made</h4>

                                    <p>We use only FDA-approved Grade A products from USA/UK, providing personalized

                                        treatments and maintaining a strict policy against one-size-fits-all.</p>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="choose-item">

                                <div class="item-icon">
                                    
                                    <span>
                                        
                                        <img loading="lazy" decoding="async" width="38" height="46" src="<?= base_url() ?>assets/frontend/img/quality.svg" alt="Quality">
                                    
                                    </span>

                                </div>

                                <div class="text">

                                    <h4>Quality</h4>

                                    <p>All our products are DHA & MOH approved, and we take pride in preparing them

                                        freshly for better results.</p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="section-gap testimonials">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center">

                <h2>Testimonials</h2>

            </div>

            <div class="col-md-12 mt-4">

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

                                <p>"I just had a NAD+ drip via Healthcarebia’s IV drip home service in Dubai, and I feel absolutely incredible.
                                     Their IV therapy is efficient, reliable, and truly top-notch, making a real difference in my productivity and energy level."</p>

                            </div>

                        </div>

                    </div>

                    <div class="item">

                        <div class="testimonials-box">

                            <div class="testimonials-img-out">

                                <img loading="lazy" decoding="async" width="369" height="311" alt="Healthcarebia Testimonial2" src="<?= base_url() ?>assets/frontend/img/gala.webp"
                                     class="img-fluid">

                                <button class="play video-play-btn" data-video-id="ipUMjVFkipc" data-video-title="Gala Testimonial">

                                    <img loading="lazy" decoding="async" width="17" height="20" alt="Healthcarebia" src="<?= base_url() ?>assets/frontend/img/play.svg" class="img-fluid">

                                </button>

                            </div>

                            <div class="testimonials-text">

                                <h4>Gala</h4>

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

<section class="healing-body section-gap mt-5">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center testimonial-inner">

                    <h2>Healing Body, Mind & Soul</h2>

                    <a href="<?= base_url() ?>contact-us" class="primary-btn hvr-bounce-to-right green-btn book-now">Book your Appointment with us now</a>

                    <ul class="contact-info-list">

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
</script>

</body>

</html>
