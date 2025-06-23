<?php 
$ctr=$this->uri->segment(1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="icon" href="<?=base_url()?>assets/frontend/lp/img/favicon.svg" type="image/svg+xml" sizes="16x16">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@400;700&display=swap" rel="stylesheet">

<link href="<?=base_url()?>assets/frontend/lp/css/bootstrap.min.css" rel="stylesheet"  rel="stylesheet" as="style" defer media="all">
<link href="<?=base_url()?>assets/frontend/lp/css/owl.carousel.min.css" rel="stylesheet"  rel="stylesheet" as="style" defer media="all">
<link href="<?=base_url()?>assets/frontend/lp/css/style.css" rel="stylesheet"  rel="stylesheet" as="style" defer media="all">
<link href="<?=base_url()?>assets/frontend/lp/css/responsive.css" rel="stylesheet"  rel="stylesheet" as="style" defer media="all">



<title><?=!empty($page_details->meta_title)?$page_details->meta_title:''?></title>
<meta name="description" content="<?=!empty($page_details->meta_description)?$page_details->meta_description:''?>" />
<meta name="keywords" content="<?=!empty($page_details->meta_keywords)?$page_details->meta_keywords:''?>" />
<?=!empty($this->data['c_settings']->header_script)?$this->data['c_settings']->header_script:''?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WX7WNF2');</script>
<!-- End Google Tag Manager -->


</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WX7WNF2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?=!empty($this->data['c_settings']->body_script)?$this->data['c_settings']->body_script:''?>
<header class="top-head mobile-banner">
  <div class="banner-outer">
	 <div class="container">
    <div class="row justify-content-between pt-4">
     <div class="col">
     <a href="<?=base_url()?>">
     <?php 
      if(!empty($this->data['c_settings']->header_logo)){
      ?>
     <img src="<?=base_url()?>uploads/header_logo/<?=!empty($this->data['c_settings']->header_logo)?$this->data['c_settings']->header_logo:''?>" class="img-fluid" alt="<?=!empty($this->data['c_settings']->header_logo_alt)?$this->data['c_settings']->header_logo_alt:''?>">

     <?php } ?>
   </a>
    </div>
     <div class="col-4 d-block d-md-none">
      <ul class="info-hed">
        <li><a href="mailto:<?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?>"><span><img src="<?=base_url()?>assets/frontend/lp/img/mail.svg" alt=""></span></a></li>
        <li><a class="phone-fix shake" href="tel:<?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?>"><span><img src="<?=base_url()?>assets/frontend/lp/img/phone.svg"></span></a></li>
       </ul>
     </div>
     <div class="col d-none d-sm-none  d-md-block">
       <ul class="info-hed">
        <li><a href="mailto:<?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?>" class="hvr-underline-from-left"><span><img src="<?=base_url()?>assets/frontend/lp/img/mail.svg" alt=""></span><?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?></a></li>
        <li><a class="hvr-underline-from-left" href="tel:<?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?>" ><span><img src="<?=base_url()?>assets/frontend/lp/img/phone.svg"></span><?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?></a></li>
       </ul>
     </div>
    </div>

    <div class="row justify-content-between banner-inner">
      <div class="col-12 col-md-6">
        <div class="banner-text">
        <h1>IV 
          Therapy <span>at Home</span></h1>
          <h4>Healing Body, Mind & Soul</h4>
          
          <ul class="banner-list">
            <li class="same"><span><img src="<?=base_url()?>assets/frontend/lp/img/drip.svg"></span><p>15% Off on IV Drip with Free Oxygen Therapy on <i>Your First Booking!* <b>Introductory offer</b></i>
             </p></li>

              <li class="same"><span><img src="<?=base_url()?>assets/frontend/lp/img/dha.png"></span><p>DHA Approved Fresh & Active<i> Ingredients</i></p></li>

              <li class="same"><span><img src="<?=base_url()?>assets/frontend/lp/img/quality.svg"></span><p>Quality Care Assured by Highly <i>Experienced DHA Certified Medical Team</i></p></li>
              <li class="same"><span><img src="<?=base_url()?>assets/frontend/lp/img/home.svg"></span><p>Free Home Visit & <i>Doctor Consultation* </i></p></li>
          </ul>
          <p class="mt-2 small-text">*T&Cs Apply</p>
        
        </div>
      </div>
      <div class="col-12 col-md-4"> 
        <div class="form-block">
           <h3 class="mb-4">Request a Call Back</h3>
          <form method="post" class="contact_form_header">
          <input type="text" class="form-control mb-3" aria-describedby="" placeholder="Name" name="name" required>
          <input type="email" class="form-control mb-3" aria-describedby="" placeholder="Email" required name="email">
          <input type="text" class="form-control mb-3" aria-describedby="" placeholder="Phone" name="mobile" required onkeypress="return onlyNumberKey(event)">
          <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message" required></textarea>
          <input type="hidden" name="url_from" value="<?=current_url()?>">

          <input type="hidden" name="form_name" value="request_a_call_back"> 
          <button type="submit" name="submit" class="primary-btn hvr-sweep-to-right mt-2">Submit</button>
          </form>
          <br/>

          <div class="msg"></div>

          <div class="loading"></div>
        </div>
      </div>
    </div>

   </div>
   </div>
</header>

<!--------------------------------------------- Page  Section  Start ---------------------------------------------->
<?php                    
if(isset($_view) && $_view)
$this->load->view($_view);
?> 

<!-------------------------------------------- Page Section  End ---------------------------------------------------->

<footer>
 <div class="container">
  <div class="row">
     <div class="col-md-4">
      <h3 class="mb-4">Contact Information</h3>
      <ul class="footer-list">
         <li><span><img src="<?=base_url()?>assets/frontend/lp/img/map.svg"></span>DIFC, Dubai, UAE</li>
          <li><span><img src="<?=base_url()?>assets/frontend/lp/img/phone.svg"></span>+971 4 225 0823</li>
          <li><span><img src="<?=base_url()?>assets/frontend/lp/img/phone.svg"></span>+971 54 7077 476</li>
          <li><span><img src="<?=base_url()?>assets/frontend/lp/img/mail.svg"></span>info@healthcarebia.ae</li>
      </ul>
     </div>
     <div class="col-md-4">
      <div class="form-block footer-form">
        <h3 class="mb-4">Request a Call Back</h3>
        <form method="post" class="contact_form_footer">
        <input type="text" class="form-control mb-3" aria-describedby="" placeholder="Name" name="name" required>
        <input type="email" class="form-control mb-3" aria-describedby="" placeholder="Email" required name="email">
        <input type="text" class="form-control mb-3" aria-describedby="" placeholder="Phone" name="mobile" required onkeypress="return onlyNumberKey(event)">
        <textarea class="form-control mb-3" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message" required></textarea>
        <input type="hidden" name="url_from" value="<?=current_url()?>">

        <input type="hidden" name="form_name" value="request_a_call_back">
        <button  type="submit" name="submit" class="primary-btn hvr-sweep-to-right mt-2">Submit</button>
        </form>
        </form><br/>
        <div class="msg1"></div>
        <div class="loading1"></div>
     </div>
     </div>
     <div class="col-md-4">
     
      <ul class="footer-list2 mt-3">
        <li><a href="#" class="hvr-underline-from-left">Terms and Conditions</a></li>
        <li><a href="#" class="hvr-underline-from-left">Patient Rights</a></li>
        <li><a href="#" class="hvr-underline-from-left">Cancellation/Refund Policy</a></li>
      </ul>
      <ul class="social-media">
         <li><a href="https://www.facebook.com/people/Healthcarebia/100091624650304/" target="_blank"><img src="<?=base_url()?>assets/frontend/lp/img/fb.svg"></a></li>
         <li><a href="https://www.instagram.com/p/CozTOq6pIPZ/" target="_blank"><img src="<?=base_url()?>assets/frontend/lp/img/insta.svg"></a></li>
         <li><a href="https://www.linkedin.com/company/healthcarebia/" target="_blank"><img src="<?=base_url()?>assets/frontend/lp/img/linkedin.svg"></a></li>
  
         

      </ul>
     </div>
  </div>
 </div>
 <div class="fot-btn">
   <div class="container">
     <div class="row">
       <div class="col-md-12 text-center">
         <p>Copyright © 2023 healthcarebia | All rights reserved. </p>
       </div>
     </div>
   </div>
 </div>
</footer>

<div class="whatsapp-icon"> <a href="<?=$this->data['whatsappHref']?>" target="_blank">                
<img src="<?=base_url()?>assets/frontend/img/whatsapp.png" alt="WhatsApp"> </a>        
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?=base_url()?>assets/frontend/lp/js/bootstrap.min.js" defer preload=""></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="<?=base_url()?>assets/frontend/lp/js/custom.js" defer preload=""></script>

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
</script>


<script>
        const splide = new Splide( '.splide', {
           type   : 'loop',
            // drag   : 'free',
            // focus  : 'center',
           
            autoScroll: {
              speed: 1,
            },
            perPage:8,
            gap    : '1rem',
            breakpoints: {
              768: {
                perPage:5,
                gap    : '.7rem',
               
              },
              480: {
                perPage: 3,
                gap    : '.7rem',
                height : '6rem',
              },
            },
          } );
          
          splide.mount(window.splide.Extensions);


        
</script>
<script>
   function minusMargin() {
            var winWidth = $(window).width();
            var containerWidth = $(".container").width();
            var csWidth = (winWidth - containerWidth) / 2;
            $(".touch-right").css({ 'margin-right': -csWidth});
            $(".touch-left").css({ 'margin-left': -csWidth });
        }
        minusMargin();
        $(window).resize(function () {
            minusMargin();
        });

</script>

<script>
  $('.drip-slider').owlCarousel({
    loop:true,
    margin:25,
    nav:true,

              navText: false,
              dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>


<script>
  $('.testimonials-slider').owlCarousel({
    loop:true,
    margin:5,
    nav:true,
    navText: false,
              dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
</script>



</body>
</html>