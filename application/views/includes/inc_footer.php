<style>
    @media (min-width: 992px) {
    footer .overlay {
        height: 440px;
    }
    }
     /* Only flex-center the quiz modal, not the whole page */
    #iv-quiz-modal {
      display: none;           /* hidden by default */
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.6);
      z-index: 9999;

      display: flex;
      align-items: center;
      justify-content: center;
    }
    /* Make the quiz box scrollable if it grows too tall */
    #iv-quiz-modal .quiz-container {
      max-height: 90vh;
      overflow-y: auto;
    }

    :root {
        --primary-green: #28a745;
        --dark-green: #1e7e34;
        --light-green: #d4edda;
        --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    /*
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: var(--gradient-bg);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
    }
    */

    .quiz-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
        max-width: 600px;
        width: 90%;
        position: relative;
    }

    .quiz-header {
        background: linear-gradient(135deg, var(--green), var(--green));
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
    }

    .quiz-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    .quiz-header h1 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 1;
    }

    .quiz-header p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
        position: relative;
        z-index: 1;
    }

    .progress-container {
        padding: 1rem 2rem;
        background: #f8f9fa;
    }

    .progress {
        height: 8px;
        border-radius: 10px;
        overflow: hidden;
        background: #e9ecef;
    }

    .progress-bar {
        background: linear-gradient(90deg, var(--green), var(--green));
        transition: width 0.6s ease;
    }

    .quiz-content {
        padding: 2rem;
        min-height: 400px;
    }

    .question-slide {
        display: none;
        animation: slideIn 0.5s ease;
    }

    .question-slide.active {
        display: block;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .question-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .question-icon {
        width: 40px;
        height: 40px;
        background: var(--green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--green);
        font-size: 1.2rem;
    }

    .option-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .option-button {
        padding: 1rem 1.5rem;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        background: white;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 1rem;
        text-align: left;
    }

    .option-button:hover {
        border-color: var(--green);
        background: var(--light-green);
        transform: translateY(-2px);
    }

    .option-button.selected {
        border-color: var(--green);
        background: var(--green);
        color: white;
    }

    .option-icon {
        font-size: 1.5rem;
        min-width: 30px;
    }

    .checkbox-group {
        display: grid;
        grid-template-columns: 1fr;
        gap: 0.8rem;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        border: 2px solid #e9ecef;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
    }

    .checkbox-item:hover {
        border-color: var(--green);
        background: var(--green);
    }

    .checkbox-item.selected {
        border-color: var(--green);
        background: var(--green);
    }

    .checkbox-item input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: var(--green);
    }

    .age-slider-container {
        margin: 2rem 0;
    }

    .age-slider {
        /* standard appearance first… */
        appearance: none;
        /* then the vendor prefixed */
        -webkit-appearance: none;
        width: 100%;
        height: 8px;
        border-radius: 5px;
        background: #e9ecef;
        outline: none;
    }

    .age-slider::-webkit-slider-thumb {
        /* standard appearance for compatibility */
        appearance: none;
        /* WebKit-specific */
        -webkit-appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: var(--green);
        cursor: pointer;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    .age-display {
        text-align: center;
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--green);
        margin-top: 1rem;
    }

    .quiz-navigation {
        padding: 1.5rem 2rem;
        background: #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-button {
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: var(--green);
        color: white;
    }

    .btn-primary:hover {
        background: var(--green);
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
    }

    .result-container {
        text-align: center;
        padding: 2rem;
    }

    .result-icon {
        width: 100px;
        height: 100px;
        background: var(--green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 3rem;
        color: var(--green);
    }

    .result-title {
        font-size: 2rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }

    .result-description {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .booking-cta {
        display: inline-block;
        padding: 1rem 2.5rem;
        background: linear-gradient(135deg, var(--green), var(--green));
        color: white;
        text-decoration: none;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }

    .booking-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        color: white;
    }

    @media (max-width: 768px) {
        .quiz-container {
            width: 95%;
            margin: 1rem;
        }
            
        .quiz-header h1 {
            font-size: 1.5rem;
        }
            
        .question-title {
            font-size: 1.3rem;
        }

        .ebook-form{
            margin-top: 3em;
        }
    }
    .ebook-btn:hover{
        box-shadow: 0 0 20px 0 rgba(255,255,255,0.8);
        filter: brightness(1.05);
    }
  
</style>
<footer>
    <div class="overlay">
        <div class="container">
        <div class="row">
            <div class="col-md-4 footer-banner">
                <img loading="lazy" decoding="async" width="271" height="37" src="<?= base_url() ?>assets/frontend/img/logo.webp" class="mb-3" alt="Healthcarebia">
                <p>Premium At-Home Healthcare in Dubai |
                    Expert IV therapy, comprehensive lab tests, and personalized wellness solutions delivered directly to your home.
                </p>
                <div href="#" class="google-reviews" style="display: flex; align-items: center">
                    <div class="google-review">
                        <img width="136" height="61" class="img-fluid"
                        src="<?= base_url() ?>assets/frontend/img/google-review.svg"
                        alt="">
                        <div class="review-item">
                        <h5>5.0</h5>
                        <span>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <!-- <i class="fa fa-star-half-o"></i>  -->
                        </span>
                        </div>
                        <a href="https://www.google.com/search?q=healthcarebia&oq=healthcarebia+&gs_lcrp=EgZjaHJvbWUyDAgAEEUYORiABBiiBDIKCAEQABiABBiiBDIHCAIQABjvBTIGCAMQRRg8MgYIBBBFGDwyBggFEEUYPDIGCAYQRRg8MgYIBxBFGDzSAQg2MDM4ajBqN6gCALACAA&sourceid=chrome&ie=UTF-8#vhid=zephyr:1&vssid=atritem-&lrd=0x3e5f437ad48ce8ab:0x1441da8daee852a8,1,,,," target="_blank">Based on 49 reviews </a>
                    </div>
                    <div class="icon-box"><div class="images"><img src="<?= base_url() ?>assets/frontend/img/dha.svg" alt="dha"><img id="fda" src="<?= base_url() ?>assets/frontend/img/fda.png" alt="fda"><img src="<?= base_url() ?>assets/frontend/img/nabidh.svg" alt="nabidh"></div></div>
                    
                </div>
            </div>
            <div class="col-md-1">
                <ul class="fot-link">
                    <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>
                    <li><a href="<?= base_url() ?>about-us" class="hvr-underline-from-left menu-line">About us</a>
                    </li>
                    <li><a href="<?= base_url() ?>blog" class="hvr-underline-from-left menu-line">Blog</a></li>
                    <li><a href="<?= base_url() ?>contact-us" class="hvr-underline-from-left menu-line">Contact
                    us</a>
                    </li>
                    <li><a href="<?= base_url() ?>faq" class="hvr-underline-from-left menu-line">FAQs</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="fot-link" >
                    <!-- <li><a href="<?= base_url() ?>iv-drip-dubai" class="hvr-underline-from-left menu-line">IV
                    Therapy Dubai</a></li>
                    <li><a href="<?= base_url() ?>glutathione-iv-drip" class="hvr-underline-from-left menu-line">Glutathione
                    IV
                    Drip</a></li> -->
                    <li><a href="<?= base_url() ?>nad-iv-drip" class="hvr-underline-from-left menu-line">NAD IV
                    Drip Dubai</a>
                    </li>
                    <li><a href="<?= base_url() ?>hangover-iv-drip" class="hvr-underline-from-left menu-line">Post Party
                    IV Drip</a>
                    </li>
                    <li><a href="<?= base_url() ?>gut-health-iv-drip" class="hvr-underline-from-left menu-line">Gut Health    
                    IV Drip</a>
                    </li>
                    <li><a href="<?= base_url() ?>good-sleep-iv-drip" class="hvr-underline-from-left menu-line">Good Sleep   
                    IV Drip</a>
                    </li>
                    <li><a href="<?= base_url() ?>energy-focus-iv-drip" class="hvr-underline-from-left menu-line">Energy & Focus
                    IV Drip</a>
                    </li>
                    <li><a href="<?= base_url() ?>myers-iv-drip" class="hvr-underline-from-left menu-line">Myers Cocktail
                    IV Drip</a>
                    </li>
                    <li><a href="<?= base_url() ?>immune-iv-drip" class="hvr-underline-from-left menu-line">Immune System Boost    
                    IV Drip</a>
                    </li>
                    <li><a href="<?= base_url() ?>doctor-on-call" class="hvr-underline-from-left menu-line">Doctor
                    on Call</a>
                    </li>
                    <li><a href="<?= base_url() ?>nurse-at-home" class="hvr-underline-from-left menu-line">Nurse at
                    Home</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="fot-link">
                    <li><a href="<?= base_url() ?>std-testing" class="hvr-underline-from-left menu-line">STD
                    Test Dubai</a>
                    </li>
                    <li><a href="<?= base_url() ?>dna-test" class="hvr-underline-from-left menu-line">DNA Test Dubai</a>
                    </li>
                    <li><a href="<?= base_url() ?>food-intolerance-test" class="hvr-underline-from-left menu-line">Food
                    Intolerance Test</a>
                    </li>
                    <li><a href="<?= base_url() ?>custom-blood-test" class="hvr-underline-from-left menu-line">Custom
                    Blood
                    Test</a>
                    </li>
                </ul>
                <div class="social-media mt-3">
                    <ul>
                    <li><a aria-label="facebook" href="https://www.facebook.com/healthcarebia/" target="_blank"><i class="fab fa-facebook-f hvr-fade hv-opcity"></i></a></li>
                    <li><a aria-label="instagram" href="https://www.instagram.com/healthcarebia" target="_blank"><i class="fab fa-instagram hvr-fade hv-opcity"></i></a></li>
                    <li><a aria-label="linkedin" href="https://www.linkedin.com/company/healthcarebia/" target="_blank"><i class="fab fa-linkedin-in hvr-fade hv-opcity"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 ebook-form">
                <h6 style="font-size: 18px;color: white;text-align: center">Download Our Free Precision Of Wellness eBook</h6>
                <form action="/ebooks/download" method="POST" style="display:flex;flex-direction: column; justify-content: start;align-items: center; width:100%; gap:1em" class="mt-4">
                    <div class="col-md-12 mb-3">
                    <input class="form-input" type="email" placeholder="Enter your email" name="email" required style="width:100%;height:100%;padding: 13px 32px;border-radius:30px;border:none">
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="yes" id="consent" name="consent">
                    <label class="form-check-label" for="consent">
                    <span style="color: white;font-size:14px; text-align: start">I Consent to receive more information from Healthcarebia</span>
                    </label>
                    </div>
                    <button class="mt-3 ebook-btn" type="submit" style="padding: 8px 26px; border-radius: 30px; background-color: var(--green);color:white;border:none; width: 100%">Download Ebook</button>
                </form>
            </div>
        </div>
    </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>Copyright © 2025 healthcarebia | All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="copyright-list">
                            <li><a href="<?= base_url() ?>terms-and-conditions"
                                   class="hvr-underline-from-left menu-line">Terms and
                                    Conditions</a></li>
                            <li><a href="<?= base_url() ?>patient-rights" class="hvr-underline-from-left menu-line">Patient
                                    Rights</a></li>
                            <li><a href="<?= base_url() ?>cancellation-and-refund-policy"
                                   class="hvr-underline-from-left menu-line">Cancellation/Refund
                                    Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <video style="object-fit: cover; background-size: cover; width: 100%; height: 100%;" preload="auto" playsinline="" autoplay="" loop="" muted="" width="320" height="200">
        <source src="<?= base_url() ?>assets/frontend/img/footer.mp4" type="video/mp4">
    </video>
        <div id="iv-quiz-modal" style="display:none; position:fixed; top:0; left:0;
        width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:9999;
        align-items:center; justify-content:center;">

        <div class="quiz-container">
            <div class="quiz-header">
                <h1><i class="fas fa-vial me-2"></i>IV Drip Finder</h1>
                <p>Let's find the right IV for you</p>
            </div>

            <div class="progress-container">
                <div class="progress">
                    <div class="progress-bar" id="progressBar" style="width: 33%"></div>
                </div>
                <small class="text-muted mt-2 d-block">Step <span id="currentStep">1</span> of 3</small>
            </div>

            <div class="quiz-content">
                <!-- Question 1: Gender -->
                <div class="question-slide active" id="question1">
                    <div class="question-title">
                        <div class="question-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        Gender
                    </div>
                    <div class="option-group">
                        <div class="option-button" data-value="male">
                            <div class="option-icon">👨</div>
                            <div>Male</div>
                        </div>
                        <div class="option-button" data-value="female">
                            <div class="option-icon">👩</div>
                            <div>Female</div>
                        </div>
                        <div class="option-button" data-value="other">
                            <div class="option-icon">🧑</div>
                            <div>Other</div>
                        </div>
                    </div>
                </div>

                <!-- Question 2: Age Group -->
                <div class="question-slide" id="question2">
                    <div class="question-title">
                        <div class="question-icon">
                            <i class="fas fa-birthday-cake"></i>
                        </div>
                        Age Group
                    </div>
                    <div class="option-group">
                        <div class="option-button" data-value="18-25">
                            <div class="option-icon">🌱</div>
                            <div>18-25 years</div>
                        </div>
                        <div class="option-button" data-value="26-35">
                            <div class="option-icon">🌿</div>
                            <div>26-35 years</div>
                        </div>
                        <div class="option-button" data-value="36-45">
                            <div class="option-icon">🌳</div>
                            <div>36-45 years</div>
                        </div>
                        <div class="option-button" data-value="46-60">
                            <div class="option-icon">🍃</div>
                            <div>46-60 years</div>
                        </div>
                        <div class="option-button" data-value="60+">
                            <div class="option-icon">🌺</div>
                            <div>60+ years</div>
                        </div>
                    </div>
                </div>

                <!-- Question 3: Symptoms -->
                <div class="question-slide" id="question3">
                    <div class="question-title">
                        <div class="question-icon">
                            <i class="fas fa-heart-pulse"></i>
                        </div>
                        What are you feeling today?
                    </div>
                    <p class="text-muted mb-3">Select all that apply</p>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom1" value="Fatigued or Low on Energy">
                            <label for="symptom1">⚡ Fatigued or Low on Energy</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom2" value="Sick or Recovering">
                            <label for="symptom2">🤒 Sick or Recovering</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom3" value="Jetlagged or Sleep Deprived">
                            <label for="symptom3">😴 Jetlagged or Sleep Deprived</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom4" value="Feeling 'Off' but Not Sure Why">
                            <label for="symptom4">🤔 Feeling "Off" but Not Sure Why</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom5" value="Want to Prevent Illness">
                            <label for="symptom5">🛡️ Want to Prevent Illness</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom6" value="Looking to Optimize Performance">
                            <label for="symptom6">🚀 Looking to Optimize Performance</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="symptom7" value="Need a Skin or Detox Reset">
                            <label for="symptom7">✨ Need a Skin or Detox Reset</label>
                        </div>
                    </div>
                </div>

                <!-- Results -->
                <div class="question-slide" id="results" style="display: none;">
                    <div class="result-container">
                    <!-- image for the recommended drip -->
                    <img
                        id="ivImage"
                        src=""
                        alt="IV Drip Image"
                        style="max-width:150px; margin-bottom:1rem;"
                    />

                    <div class="result-icon">
                        <i class="fas fa-vial"></i>
                    </div>
                    <div class="result-title" id="recommendedIV">Your Perfect IV Match</div>
                    <div class="result-description" id="ivDescription">
                        …
                    </div>
                    <a href="<?= $whatsappHref ?>" class="booking-cta" id="bookingButton">
                        <i class="fab fa-whatsapp me-2"></i>Book Your IV Session
                    </a>
                    <div class="mt-4">
                        <button class="btn btn-outline-secondary" onclick="restartQuiz()">
                            <i class="fas fa-redo me-2"></i>Take Quiz Again
                        </button>
                    </div>
                </div>
            </div>

            <div class="quiz-navigation">
                <button class="nav-button btn-secondary" id="prevButton" onclick="previousQuestion()" style="display: none;">
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
                <button class="nav-button btn-primary" id="nextButton" onclick="nextQuestion()">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
</footer>
<script>
    const form = document.querySelector('.ebook-form');
    const button = document.querySelector('.ebook-btn');
    form.addEventListener('submit',(e)=>{
        button.innerText = 'Thank you !';
        form.reset();
        setTimeout(()=>{
            form.reset();
            button.innerText = 'Download Ebook';
        },3000)
    })
</script>
