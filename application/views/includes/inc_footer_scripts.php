<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
<!-- <script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js" defer preload></script> -->
<script src="<?= base_url() ?>assets/frontend/js/owl.carousel.min.js" defer preload></script>
<script src="<?= base_url() ?>assets/frontend/js/tab-accordian.min.js" defer preload></script>
<script src="<?= base_url() ?>assets/frontend/js/fancybox.umd.js" defer preload></script>
<script src="<?= base_url() ?>assets/frontend/js/custom.js" defer></script>


<?= !empty($settings->script_body) ? $settings->script_body : '' ?>


<script>
    jQuery(document).ready(function () {

        jQuery('.contact_form').submit(function (e) {
            e.preventDefault();

            var id_str   = jQuery(this).attr('id');   // e.g. form_callback
            var id_arr   = id_str.split('_');         // ["form","callback"]
            var form_name = id_arr[1];                // "callback"

            jQuery('#submit_' + form_name).html('Please wait');
            jQuery('#submit_' + form_name).attr('disabled', true);

            jQuery("#success_" + form_name).show();
            jQuery("#error_" + form_name).show();

            jQuery("#success_" + form_name).html('');
            jQuery("#error_" + form_name).html('');

            jQuery.ajax({
                type: 'post',
                url: '<?=base_url()?>booking/contact',
                data: jQuery('#form_' + form_name).serialize(),
                success: function (jsonData) {
                    var values = jQuery.parseJSON(jsonData);
                    var flag   = values.flag;

                    if (flag >= 1) {

                        jQuery('#form_' + form_name).trigger('reset');

                        // only redirect for normal forms
                        if (form_name !== 'callback') {
                            window.location.href = "<?=base_url()?>success";
                        } else {
                            // callback popup behaviour
                            jQuery('#success_' + form_name)
                                .html('Thank you, we will call you back shortly.')
                                .delay(8000).fadeOut();

                            // close popup if it exists
                            jQuery('#callback-popup-overlay').removeClass('active');
                            if (window.sessionStorage) {
                                sessionStorage.setItem('callbackPopupClosed', 'yes');
                            }
                        }

                    } else if (flag == -1) {

                        jQuery('#form_' + form_name).trigger('reset');
                        jQuery('#error_' + form_name)
                            .html('Sorry, please try again later !')
                            .delay(25000).fadeOut();

                    } else {

                        var all_error = '';

                        if (values.emailError !== '' && values.emailError !== null)
                            all_error = values.emailError + '<br/>';

                        if (values.captchaError !== '' && values.captchaError !== null)
                            all_error += values.captchaError;

                        jQuery('#error_' + form_name).html(all_error).delay(25000).fadeOut();
                    }

                    jQuery('#submit_' + form_name).html('Submit');
                    jQuery('#submit_' + form_name).attr('disabled', false);
                }
            });
        });

        // newsletter form submit stays same
        jQuery('#subscribe-form').submit(function (e) {
            e.preventDefault();

            jQuery("#letter_success").show();
            jQuery("#letter_error").show();

            jQuery("#letter_success").html('');
            jQuery("#letter_error").html('');

            jQuery.ajax({
                type: 'post',
                url: '<?=base_url()?>booking/newsletter',
                data: jQuery('#subscribe-form').serialize(),
                success: function (jsonData) {
                    var values = jQuery.parseJSON(jsonData);
                    var flag   = values.flag;

                    if (flag >= 1) {
                        jQuery('#subscribe-form').trigger('reset');
                        jQuery('#letter_success')
                            .html('You have successfully subscribed to our newsletter')
                            .delay(5000).fadeOut();

                    } else if (flag == -1) {
                        jQuery('#letter_error')
                            .html('You have already subscribed to our newsletter !')
                            .delay(5000).fadeOut();
                    } else {
                        jQuery('#letter_error')
                            .html(values.emailError)
                            .delay(5000).fadeOut();
                    }
                }
            });
        });

    });
</script>


<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn    = document.getElementById('iv-quiz-btn');
    const modal  = document.getElementById('iv-quiz-modal');
    modal.addEventListener('click', e => {
        if (e.target === modal) {
        modal.style.display = 'none';
        restartQuiz();
        }
    });
    const close  = modal.querySelector('.btn-outline-secondary'); // “Take Quiz Again” button
    const next   = document.getElementById('nextButton');
    const prev   = document.getElementById('prevButton');
    const progressBar = document.getElementById('progressBar');
    const currentStep = document.getElementById('currentStep');

    let currentQuestion = 1;
    let answers = { gender: '', age: '', symptoms: [] };

    // open modal
    btn.addEventListener('click', () => modal.style.display = 'flex');

    // close modal when user clicks “Take Quiz Again”
    close.addEventListener('click', () => {
        modal.style.display = 'none';
        restartQuiz();
    });

    // navigation
    next.addEventListener('click', () => {
        if (currentQuestion < 3) {
        document.getElementById(`question${currentQuestion}`).classList.remove('active');
        currentQuestion++;
        document.getElementById(`question${currentQuestion}`).classList.add('active');
        updateProgress();
        updateNavigation();
        } else {
        showResults();
        }
    });
    prev.addEventListener('click', () => {
        if (currentQuestion > 1) {
        document.getElementById(`question${currentQuestion}`).classList.remove('active');
        currentQuestion--;
        document.getElementById(`question${currentQuestion}`).classList.add('active');
        updateProgress();
        updateNavigation();
        }
    });

    // answer selection
    document.querySelectorAll('#question1 .option-button').forEach(btn => {
        btn.addEventListener('click', () => {
        selectOption(btn, 'gender');
        });
    });
    document.querySelectorAll('#question2 .option-button').forEach(btn => {
        btn.addEventListener('click', () => {
        selectOption(btn, 'age');
        });
    });
    document.querySelectorAll('#question3 .checkbox-item').forEach(item => {
        item.addEventListener('click', e => {
        if (e.target.type !== 'checkbox') {
            const cb = item.querySelector('input[type="checkbox"]');
            cb.checked = !cb.checked;
            updateSymptomSelection();
        }
        });
    });
    document.querySelectorAll('#question3 input[type="checkbox"]').forEach(cb => {
        cb.addEventListener('change', updateSymptomSelection);
    });

    // helper funcs
    function selectOption(el, field) {
        // clear siblings
        el.parentNode.querySelectorAll('.option-button').forEach(b => b.classList.remove('selected'));
        el.classList.add('selected');
        answers[field] = el.dataset.value;
        updateNavigation();
    }

    function updateSymptomSelection() {
        const selected = [];
        document.querySelectorAll('#question3 input[type="checkbox"]:checked')
                .forEach(cb => selected.push(cb.value));
        answers.symptoms = selected;
        // visual toggle
        document.querySelectorAll('#question3 .checkbox-item').forEach(item => {
        const cb = item.querySelector('input[type="checkbox"]');
        item.classList.toggle('selected', cb.checked);
        });
        updateNavigation();
    }

    function updateProgress() {
        const pct = (currentQuestion / 3) * 100;
        progressBar.style.width = pct + '%';
        currentStep.textContent = currentQuestion;
    }

    function updateNavigation() {
        prev.style.display = currentQuestion > 1 ? 'flex' : 'none';
        next.textContent = currentQuestion === 3 ? 'Get Results ✨' : 'Next →';
        // only enable “Next” if current step is answered
        let valid = false;
        if (currentQuestion === 1) valid = !!answers.gender;
        if (currentQuestion === 2) valid = !!answers.age;
        if (currentQuestion === 3) valid = answers.symptoms.length > 0;
        next.disabled = !valid;
    }

    function showResults() {
        document.getElementById(`question${currentQuestion}`).classList.remove('active');
        document.querySelector('.quiz-navigation').style.display = 'none';
        progressBar.style.width = '100%';
        currentStep.textContent = '3';
        // compute
        const iv = calculateRecommendation();
        document.getElementById('recommendedIV').textContent = iv;
        document.getElementById('ivDescription').textContent = ivDescriptions[iv] || 'A custom IV tailored to your needs.';
        document.getElementById('ivImage').src = ivImages[iv] || '';
        document.getElementById('results').style.display = 'block';
    }

    function calculateRecommendation() {
        if (!answers.symptoms.length) return "Myer's Cocktail";
        const key = answers.symptoms.sort().join(', ');
        if (ivRecommendations[key]) return ivRecommendations[key];
        // fallback priority
        const prio = ['Sick or Recovering','Want to Prevent Illness','Looking to Optimize Performance',
                    'Fatigued or Low on Energy','Jetlagged or Sleep Deprived'];
        for (let s of prio) if (answers.symptoms.includes(s)) return ivRecommendations[s];
        return "Myer's Cocktail";
    }

    function restartQuiz() {
        answers = { gender: '', age: '', symptoms: [] };
        currentQuestion = 1;
        document.querySelectorAll('.question-slide').forEach(slide => slide.classList.remove('active'));
        document.getElementById('question1').classList.add('active');
        document.querySelector('.quiz-navigation').style.display = 'flex';
        document.querySelectorAll('.option-button.selected').forEach(b => b.classList.remove('selected'));
        document.querySelectorAll('#question3 .checkbox-item.selected').forEach(i => i.classList.remove('selected'));
        document.querySelectorAll('#question3 input[type="checkbox"]').forEach(cb => cb.checked = false);
        updateProgress();
        updateNavigation();
    }

    const ivRecommendations = { 
        "Fatigued or Low on Energy":      "Energy Drip",
        "Sick or Recovering":             "Immunity Booster",
        "Jetlagged or Sleep Deprived":    "Jetlag Drip",
        "Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Want to Prevent Illness":        "Immunity Booster",
        "Looking to Optimize Performance":"NAD+",
        "Need a Skin or Detox Reset":     "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering": "Immunity Booster",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived": "Jetlag Drip",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Fatigued or Low on Energy, Want to Prevent Illness": "Immunity Booster",
        "Fatigued or Low on Energy, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived": "Immunity Booster",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Sick or Recovering, Want to Prevent Illness": "Immunity Booster",
        "Sick or Recovering, Looking to Optimize Performance": "NAD+",
        "Sick or Recovering, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Want to Prevent Illness": "Immunity Booster",
        "Jetlagged or Sleep Deprived, Looking to Optimize Performance": "NAD+",
        "Jetlagged or Sleep Deprived, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Myer's Cocktail",
        "Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness": "Immunity Booster",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Myer's Cocktail",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness": "Immunity Booster",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance": "NAD+",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Immunity Booster",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Sick or Recovering, Want to Prevent Illness, Need a Skin or Detox Reset": "Immunity Booster",
        "Sick or Recovering, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness, Need a Skin or Detox Reset": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Immunity Booster",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset": "Immunity Booster",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Immunity Booster",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Need a Skin or Detox Reset": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Immunity Booster",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "NAD+",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "NAD+",
        "Fatigued or Low on Energy, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Immunity Booster",
        "Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Immunity Booster",
        "Fatigued or Low on Energy, Sick or Recovering, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail",
        "Fatigued or Low on Energy, Sick or Recovering, Jetlagged or Sleep Deprived, Feeling 'Off' but Not Sure Why, Want to Prevent Illness, Looking to Optimize Performance, Need a Skin or Detox Reset": "Myer's Cocktail"
    };

    const ivDescriptions    = { 
        "Energy Drip":       "Perfect for combating fatigue and boosting your energy levels naturally. This IV contains essential vitamins and minerals to revitalize your body.",
        "Immunity Booster":  "Strengthen your immune system with this powerful blend of vitamins C, zinc, and antioxidants to help fight off illness and speed recovery.",
        "Jetlag Drip":       "Specially formulated to help reset your body clock and combat the effects of jet lag and sleep deprivation.",
        "Myer's Cocktail":   "Our signature wellness blend that addresses multiple concerns including fatigue, general wellness, and detoxification.",
        "NAD+":              "The ultimate performance optimizer that enhances cellular energy production and cognitive function for peak performance."
    };

    // drip to image URL mapping
    const ivImages = {
        "Energy Drip":       "<?= base_url() ?>assets/frontend/img/energy-iv-drip.webp",
        "Jetlag Drip":       "<?= base_url() ?>assets/frontend/img/jet-lag-iv-drip.webp",
        "Immunity Booster":  "<?= base_url() ?>assets/frontend/img/immune-booster-iv-drip.webp",
        "Myer's Cocktail":   "<?= base_url() ?>assets/frontend/img/myers-cocktail.webp",
        "NAD+":              "<?= base_url() ?>assets/frontend/img/nad-iv-drip.webp"
    };

    // initialize UI
    updateProgress();
    updateNavigation();
    });
</script>




