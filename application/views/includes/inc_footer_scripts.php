<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

<script defer src="<?= base_url('assets/frontend/js/owl.carousel.min.js') ?>"></script>
<script defer src="<?= base_url('assets/frontend/js/fancybox.umd.js') ?>"></script>
<script defer src="<?= base_url('assets/frontend/js/tab-accordian.min.js') ?>"></script>
<script defer src="<?= base_url('assets/frontend/js/custom.js') ?>"></script>


<?= !empty($settings->script_body) ? $settings->script_body : '' ?>


<script>
    jQuery(document).ready(function () {


        // Initialize the second datepicker
        // $('#datepicker2').datepicker({
        //     format: 'm/d/yyyy', // Choose your desired date format
        //     autoclose: true
        // });


        jQuery('.contact_form').submit(function (e) {
            e.preventDefault();

            var id_str = jQuery(this).attr('id');
            var id_arr = id_str.split('_');
            var form_name = id_arr[1];

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


                    var flag = values.flag;

                    if (flag >= 1) {

                        jQuery('#form_' + form_name).trigger('reset');
                        window.location.href = "<?=base_url()?>success";
                        //jQuery('#success').html('Your message has been sent successfully').delay(5000).fadeOut();


                    } else if (flag == -1) {
                        //jQuery('#form_'+form_name).trigger('reset');
                        //window.location.href = "<?=base_url()?>success";

                        jQuery('#form_' + form_name).trigger('reset');
                        jQuery('#error_' + form_name).html('Sorry, please try again later !').delay(25000).fadeOut();


                        //jQuery('.submit-loader').hide();
                    }
//                        else if(flag == -2)
//                        {
//                            jQuery('#error').html(values.captchaError).delay(5000).fadeOut();
//                        }
                    else {
                        //jQuery('.submit-loader').hide();
                        var all_error = '';

                        if (values.emailError !== '' && values.emailError !== null)
                            all_error = values.emailError + '<br/>';

                        if (values.captchaError !== '' && values.captchaError !== null)
                            all_error += values.captchaError;


                        // jQuery('#emailError').html(values.emailError).delay(5000).fadeOut();
                        jQuery('#error_' + form_name).html(all_error).delay(25000).fadeOut();
                    }

                    jQuery('#submit_' + form_name).html('Submit');
                    jQuery('#submit_' + form_name).attr('disabled', false);

                }
            })
        })


        //newsletter-form submit
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

                    var flag = values.flag;

                    if (flag >= 1) {
                        jQuery('#subscribe-form').trigger('reset');
                        jQuery('#letter_success').html('You have successfully subscribed to our newsletter').delay(5000).fadeOut();

                    } else if (flag == -1) {
                        jQuery('#letter_error').html('You have already subscribed to our newsletter !').delay(5000).fadeOut();
                    } else {
                        jQuery('#letter_error').html(values.emailError).delay(5000).fadeOut();
                    }


                }
            })
        })

    })


</script>
<script>
    const START = 0.4;
const observer = new IntersectionObserver(
  (entries, obs) => {
    entries.forEach((entry) => {
      const animation = entry.target.getAttribute("data-animation");

      if (entry.isIntersecting && entry.intersectionRatio >= START) {
        entry.target.classList.add(animation);
        obs.unobserve(entry.target);
      }
    });
  },
  {
    root: null,
    threshold: START,
    rootMargin: "0px 0px -10% 0px",
  },
);
document.querySelectorAll(".animate").forEach((el) => observer.observe(el));
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    // Open handler uses delegation so it still works if the button is replaced later
    document.addEventListener('click', (e) => {
        const btn = e.target.closest('#iv-quiz-btn');
        if (!btn) return;

        // Prefer Bootstrap if the modal is a Bootstrap modal
        const modalEl = document.getElementById('iv-quiz-modal');
        if (!modalEl) {
        console.warn('iv-quiz-modal not found in DOM');
        return;
        }

        // If Bootstrap modal classes exist, use Bootstrap’s API
        if (typeof bootstrap !== 'undefined' && modalEl.classList.contains('modal')) {
        const bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
        bsModal.show();
        } else {
        // Fallback to custom modal
        modalEl.style.display = 'flex';
        }
    });

    // Safe wiring for the rest of your quiz logic
    function byId(id){ return document.getElementById(id); }
    function qs(sel, root=document){ return root.querySelector(sel); }

    const modal  = byId('iv-quiz-modal');
    if (!modal) return; // Stop here if there is no modal yet

    const close  = qs('.btn-outline-secondary', modal);
    const next   = byId('nextButton');
    const prev   = byId('prevButton');
    const progressBar = byId('progressBar');
    const currentStep = byId('currentStep');

    let currentQuestion = 1;
    let answers = { gender: '', age: '', symptoms: [] };

    // Close handlers
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
        hideModal();
        restartQuiz();
        }
    });
    if (close) {
        close.addEventListener('click', () => {
        hideModal();
        restartQuiz();
        });
    }

    function hideModal() {
        if (typeof bootstrap !== 'undefined' && modal.classList.contains('modal')) {
        const bsModal = bootstrap.Modal.getOrCreateInstance(modal);
        bsModal.hide();
        } else {
        modal.style.display = 'none';
        }
    }

    // Wire navigation only if controls exist
    if (next && prev && progressBar && currentStep) {
        next.addEventListener('click', () => {
        if (currentQuestion < 3) {
            swapSlide(currentQuestion, currentQuestion + 1);
        } else {
            showResults();
        }
        });
        prev.addEventListener('click', () => {
        if (currentQuestion > 1) swapSlide(currentQuestion, currentQuestion - 1);
        });
    }

    // Answer selection (guard against missing sections)
    const q1 = byId('question1');
    if (q1) q1.querySelectorAll('.option-button').forEach(b => b.addEventListener('click', () => selectOption(b, 'gender')));

    const q2 = byId('question2');
    if (q2) q2.querySelectorAll('.option-button').forEach(b => b.addEventListener('click', () => selectOption(b, 'age')));

    const q3 = byId('question3');
    if (q3) {
        q3.querySelectorAll('.checkbox-item').forEach(item => {
        item.addEventListener('click', e => {
            if (e.target.type !== 'checkbox') {
            const cb = item.querySelector('input[type="checkbox"]');
            if (cb) { cb.checked = !cb.checked; updateSymptomSelection(); }
            }
        });
        });
        q3.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.addEventListener('change', updateSymptomSelection));
    }

    function swapSlide(from, to){
        const a = byId(`question${from}`);
        const b = byId(`question${to}`);
        if (a && b) {
        a.classList.remove('active');
        b.classList.add('active');
        currentQuestion = to;
        updateProgress();
        updateNavigation();
        }
    }

    function selectOption(el, field) {
        el.parentNode.querySelectorAll('.option-button').forEach(b => b.classList.remove('selected'));
        el.classList.add('selected');
        answers[field] = el.dataset.value;
        updateNavigation();
    }

    function updateSymptomSelection() {
        const selected = [];
        document.querySelectorAll('#question3 input[type="checkbox"]:checked').forEach(cb => selected.push(cb.value));
        answers.symptoms = selected;
        document.querySelectorAll('#question3 .checkbox-item').forEach(item => {
        const cb = item.querySelector('input[type="checkbox"]');
        item.classList.toggle('selected', cb && cb.checked);
        });
        updateNavigation();
    }

    function updateProgress() {
        if (!progressBar || !currentStep) return;
        const pct = (currentQuestion / 3) * 100;
        progressBar.style.width = pct + '%';
        currentStep.textContent = String(currentQuestion);
    }

    function updateNavigation() {
        if (!next || !prev) return;
        prev.style.display = currentQuestion > 1 ? 'flex' : 'none';
        next.textContent = currentQuestion === 3 ? 'Get Results ✨' : 'Next →';
        let valid = false;
        if (currentQuestion === 1) valid = !!answers.gender;
        if (currentQuestion === 2) valid = !!answers.age;
        if (currentQuestion === 3) valid = answers.symptoms.length > 0;
        next.disabled = !valid;
    }

    function showResults() {
        const active = byId(`question${currentQuestion}`);
        if (active) active.classList.remove('active');
        const nav = document.querySelector('.quiz-navigation');
        if (nav) nav.style.display = 'none';
        if (progressBar) progressBar.style.width = '100%';
        if (currentStep) currentStep.textContent = '3';
        const iv = calculateRecommendation();
        const descs = {
        "Energy Drip": "Perfect for combating fatigue and boosting your energy levels naturally. This IV contains essential vitamins and minerals to revitalize your body.",
        "Immunity Booster": "Strengthen your immune system with this powerful blend of vitamins C, zinc, and antioxidants to help fight off illness and speed recovery.",
        "Jetlag Drip": "Specially formulated to help reset your body clock and combat the effects of jet lag and sleep deprivation.",
        "Myer's Cocktail": "Our signature wellness blend that addresses multiple concerns including fatigue, general wellness, and detoxification.",
        "NAD+": "The ultimate performance optimizer that enhances cellular energy production and cognitive function for peak performance."
        };
        const imgs = {
        "Energy Drip": "<?= base_url() ?>assets/frontend/img/energy-iv-drip.webp",
        "Jetlag Drip": "<?= base_url() ?>assets/frontend/img/jet-lag-iv-drip.webp",
        "Immunity Booster": "<?= base_url() ?>assets/frontend/img/immune-booster-iv-drip.webp",
        "Myer's Cocktail": "<?= base_url() ?>assets/frontend/img/myers-cocktail.webp",
        "NAD+": "<?= base_url() ?>assets/frontend/img/nad-iv-drip.webp"
        };
        const nameEl = byId('recommendedIV');
        const descEl = byId('ivDescription');
        const imgEl  = byId('ivImage');
        if (nameEl) nameEl.textContent = iv;
        if (descEl) descEl.textContent = descs[iv] || 'A custom IV tailored to your needs.';
        if (imgEl)  imgEl.src = imgs[iv] || '';
        const results = byId('results');
        if (results) results.style.display = 'block';
    }

    function calculateRecommendation() {
        if (!answers.symptoms.length) return "Myer's Cocktail";
        const key = answers.symptoms.sort().join(', ');
        // keep your big mapping object outside or inject it here
        const pick = {
        "Fatigued or Low on Energy": "Energy Drip",
        "Sick or Recovering": "Immunity Booster",
        "Jetlagged or Sleep Deprived": "Jetlag Drip",
        "Want to Prevent Illness": "Immunity Booster",
        "Looking to Optimize Performance": "NAD+",
        };
        const prio = ['Sick or Recovering','Want to Prevent Illness','Looking to Optimize Performance','Fatigued or Low on Energy','Jetlagged or Sleep Deprived'];
        if (pick[key]) return pick[key];
        for (let s of prio) if (answers.symptoms.includes(s)) return pick[s];
        return "Myer's Cocktail";
    }

    function restartQuiz() {
        answers = { gender: '', age: '', symptoms: [] };
        currentQuestion = 1;
        document.querySelectorAll('.question-slide').forEach(slide => slide.classList.remove('active'));
        const q1 = byId('question1');
        if (q1) q1.classList.add('active');
        const nav = document.querySelector('.quiz-navigation');
        if (nav) nav.style.display = 'flex';
        document.querySelectorAll('.option-button.selected').forEach(b => b.classList.remove('selected'));
        document.querySelectorAll('#question3 .checkbox-item.selected').forEach(i => i.classList.remove('selected'));
        document.querySelectorAll('#question3 input[type="checkbox"]').forEach(cb => cb.checked = false);
        updateProgress();
        updateNavigation();
    }

    // Initialize if elements exist
    updateProgress();
    updateNavigation();
    });
</script>




