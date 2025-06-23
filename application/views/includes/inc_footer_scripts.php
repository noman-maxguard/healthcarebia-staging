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




