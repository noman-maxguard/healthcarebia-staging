<?php 

$ctr=$this->uri->segment(1);

?>

<!doctype html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">	

<link rel="icon" href="<?=base_url()?>assets/frontend/landingpage/img/favicon.svg" type="image/svg+xml" sizes="16x16">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<!-- <link href="css/bootstrap.min.css" rel="stylesheet" defer media="all" as="style"> -->

<link href="<?=base_url()?>assets/frontend/landingpage/css/owl.carousel.min.css" rel="stylesheet">

<link href="<?=base_url()?>assets/frontend/landingpage/css/jquery.fancybox.min.css" rel="stylesheet">

<link href="<?=base_url()?>assets/frontend/landingpage/css/fontawesome.min.css" rel="stylesheet">

<link
  rel="stylesheet"
  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<link href="<?=base_url()?>assets/frontend/landingpage/css/style.css" rel="stylesheet">
<link href="<?=base_url()?>assets/frontend/landingpage/css/responsive.css" rel="stylesheet">

<title><?=!empty($page_details->meta_title)?$page_details->meta_title:''?></title>

<meta name="description" content="<?=!empty($page_details->meta_description)?$page_details->meta_description:''?>" />

<meta name="keywords" content="<?=!empty($page_details->meta_keywords)?$page_details->meta_keywords:''?>" />

<?=!empty($page_details->header_script)?$page_details->header_script:''?>

</head>

<body>
<?=!empty($page_details->body_script)?$page_details->body_script:''?>
<!--======== header ======-->

<header class="header">	

	<div class="container">

		<a class="logo" href="<?=base_url()?>">

        

        <img class="img-fluid" src="<?=base_url()?>assets/frontend/img/new-logo.png" alt="Best IV Drip Dubai"></a>


 
		<ul class="header-right">

			<li class="d-none d-md-block"><a href="tel:<?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?>" class="d-flex align-items-center link"><img src="<?=base_url()?>assets/frontend/img/call-icon.png" alt="mobile icon" style="width: 70px;"> <?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?></a></li>

			<li class="d-none d-md-block"><a href="mailto:<?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?>" class="d-flex align-items-center link"><img src="<?=base_url()?>assets/frontend/img/email-icon.png" alt="mail icon" style="width: 70px;"> <?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?></a></li>

			<?php 

       if($ctr!='success'){



        ?>

			<!-- <li><button data-fancybox data-src="#dialog-content" class="primary-btn">Book Now</button></li> -->

			<?php } ?>

		</ul>

	</div>

</header>



<div id="dialog-content" class="contact-form-block p-0" style="display:none;max-width:500px;">

	<div class="contact-form">

		<h4>Request a Call Back</h4>

		<form class="row request-form contact_form_header" method="post">

			<div class="col-md-6 mb-3">

				<input class="form-input" type="text" placeholder="Name" name="name" required>

			</div>

			<div class="col-md-6 mb-3">

				<input class="form-input" type="text" placeholder="Last Name" name="lastname" required>

			</div>

			<div class="col-md-6 mb-3">

				<input class="form-input" type="text" placeholder="Phone" name="mobile" required onkeypress="return onlyNumberKey(event)">

			</div>

			<div class="col-md-6 mb-3">

				<input class="form-input" type="email" placeholder="Email" required name="email">

			</div>

			<div class="col-md-12 mb-3">

				<textarea class="form-textarea" placeholder="Message" name="message" required></textarea>

            <input type="hidden" name="url_from" value="<?=current_url()?>">

            <input type="hidden" name="form_name" value="request_a_call_back"> 

			</div>

			<div class="col-md-12">

				<input class="primary-btn" type="submit" value="Submit" name="submit">

			</div>

		</form>

        <br/>

          <div class="msg"></div>

          <div class="loading"></div>

	</div>

</div>



<!--------------------------------------------- Page  Section  Start ---------------------------------------------->

<?php                    

if(isset($_view) && $_view)

$this->load->view($_view);

?> 



<!-------------------------------------------- Page Section  End ---------------------------------------------------->

</main>



<div class="whatsapp-icon"> 

	<a href="<?=$this->data['whatsappHref']?>" target="_blank">                

		<i class="fab fa-whatsapp"></i>

	</a>        

</div>


<a href="tel:+971547077476" class="phone-number d-flex d-md-none">

	<i class="fas fa-phone-alt"></i>

</a>



<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- <script src="js/jquery.min.js"></script>

<script src="js/bootstrap.bundle.min.js" defer preload></script> -->

<script src="<?=base_url()?>assets/frontend/landingpage/js/owl.carousel.min.js"></script>

<script src="<?=base_url()?>assets/frontend/landingpage/js/jquery.fancybox.min.js"></script>

<script src="<?=base_url()?>assets/frontend/landingpage/js/custom.js"></script>





<script>

   



$(document).ready(function(){





      $(".contact_form_header").submit(function (e){

      e.preventDefault();

      $('.msg').html('');

      $('.loading').html('');

      $('.msg').show('');

      $('.loading').show('');

      var formData = new FormData(this); 

      $.ajax({

      url:'<?=base_url()?>welcome/cform',

      type:'POST',

      data:formData,

      dataType:'json',

      processData:false,

      contentType:false,

      beforeSend: function () {

      $('.loading').css("color","green","text-align", "center").text("Please wait...");



      },



      success: function (data)

      {



         $(".contact_form_header")[0].reset();

         $('.loading').hide();

         if(data.flag==1)

         {



            $('.msg').html("<div class='alert alert-success'>" + data.status + "</div>");

            setTimeout(function (){

            $(".msg").hide();

            window.location.href = '<?=base_url()?>success';



            }, 1000);



         }



         if(data.flag == 0)

         {



            $('.msg').html("<div class='alert alert-warning'>" + data.status + "</div>");

            setTimeout(function () {

            $(".msg").hide();



            }, 2000);



         }



      }







      });







      });







      $(".contact_form_footer").submit(function (e){

      e.preventDefault();

      $('.msg1').html('');

      $('.loading1').html('');

      $('.msg1').show('');

      $('.loading1').show('');

      var formData = new FormData(this); 

      $.ajax({

      url:'<?=base_url()?>welcome/cform',

      type:'POST',

      data:formData,

      dataType:'json',

      processData:false,

      contentType:false,

      beforeSend: function () {

      $('.loading1').css("color","green","text-align", "center").text("Please wait...");



      },



      success: function (data)

      {



         $(".contact_form_footer")[0].reset();

         $('.loading1').hide();

         if(data.flag==1)

         {



            $('.msg1').html("<div class='alert alert-success'>" + data.status + "</div>");

            setTimeout(function (){

            $(".msg1").hide();

            window.location.href = '<?=base_url()?>success';



            }, 1000);



         }

         if(data.flag == 0)

         {



            $('.msg1').html("<div class='alert alert-warning'>" + data.status + "</div>");

            setTimeout(function () {

            $(".msg1").hide();



            }, 2000);



         }



      }







      });







      });





});





function onlyNumberKey(evt)

{



  // Only ASCII character in that range allowed

  var ASCIICode = (evt.which) ? evt.which : evt.keyCode

  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))

      return false;

  return true;

}





// $(document).ready(function() { 

//     if($(window).width() <=767 ) {

//         Fancybox.show([{ src: "#dialog-content", type: "inline" }]);

//     }

// });

</script>

</body>

</html>

