jQuery(document).ready(function () {
  // Contact form submission
  jQuery(".contact_form").submit(function (e) {
    e.preventDefault();

    var id_str = jQuery(this).attr("id");
    var id_arr = id_str.split("_");
    var form_name = id_arr[1];

    jQuery("#submit_" + form_name).html("Please wait");
    jQuery("#submit_" + form_name).attr("disabled", true);

    jQuery("#success_" + form_name).show();
    jQuery("#error_" + form_name).show();

    jQuery("#success_" + form_name).html("");
    jQuery("#error_" + form_name).html("");

    jQuery.ajax({
      type: "post",
      url: "<?=base_url()?>booking/contact",
      data: jQuery("#form_" + form_name).serialize(),
      success: function (jsonData) {
        var values = jQuery.parseJSON(jsonData);
        var flag = values.flag;

        if (flag >= 1) {
          jQuery("#form_" + form_name).trigger("reset");
          window.location.href = "<?=base_url()?>success";
        } else if (flag == -1) {
          jQuery("#form_" + form_name).trigger("reset");
          jQuery("#error_" + form_name)
            .html("Sorry, please try again later!")
            .delay(25000)
            .fadeOut();
        } else {
          var all_error = "";
          if (values.emailError) all_error = values.emailError + "<br/>";
          if (values.captchaError) all_error += values.captchaError;
          jQuery("#error_" + form_name)
            .html(all_error)
            .delay(25000)
            .fadeOut();
        }

        jQuery("#submit_" + form_name).html("Submit");
        jQuery("#submit_" + form_name).attr("disabled", false);
      },
    });
  });

  // Newsletter form submission
  jQuery("#subscribe-form").submit(function (e) {
    e.preventDefault();

    jQuery("#letter_success").show();
    jQuery("#letter_error").show();

    jQuery("#letter_success").html("");
    jQuery("#letter_error").html("");

    jQuery.ajax({
      type: "post",
      url: "<?=base_url()?>booking/newsletter",
      data: jQuery("#subscribe-form").serialize(),
      success: function (jsonData) {
        var values = jQuery.parseJSON(jsonData);
        var flag = values.flag;

        if (flag >= 1) {
          jQuery("#subscribe-form").trigger("reset");
          jQuery("#letter_success")
            .html("You have successfully subscribed to our newsletter")
            .delay(5000)
            .fadeOut();
        } else if (flag == -1) {
          jQuery("#letter_error")
            .html("You have already subscribed to our newsletter!")
            .delay(5000)
            .fadeOut();
        } else {
          jQuery("#letter_error").html(values.emailError).delay(5000).fadeOut();
        }
      },
    });
  });
});
