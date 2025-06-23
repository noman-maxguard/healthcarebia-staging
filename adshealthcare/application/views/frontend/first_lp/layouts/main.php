<?php 
$ctr=$this->uri->segment(1);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="icon" href="<?=base_url()?>assets/frontend/img/favicon.png" type="image/svg+xml" sizes="16x16">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<link href="<?=base_url()?>assets/frontend/css/library.css" rel="stylesheet">
<link href="<?=base_url()?>assets/frontend/css/style.css" rel="stylesheet">
<link href="<?=base_url()?>assets/frontend/css/responsive.css" rel="stylesheet">
<link href=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css " rel="stylesheet">
<title><?=!empty($page_details->meta_title)?$page_details->meta_title:''?></title>
<meta name="description" content="<?=!empty($page_details->meta_description)?$page_details->meta_description:''?>" />
<meta name="keywords" content="<?=!empty($page_details->meta_keywords)?$page_details->meta_keywords:''?>" />
<?=!empty($this->data['c_settings']->header_script)?$this->data['c_settings']->header_script:''?>
</head>

<body>
<?=!empty($this->data['c_settings']->body_script)?$this->data['c_settings']->body_script:''?>
<section class="top-block light-yellow" style="background: url('<?=base_url()?>assets/frontend/img/banner.webp') #fcf9f4;">
 <div class="container">
   <div class="row justify-content-sm-start justify-content-lg-between mb-4">
    <div class="col-sm-4 col-7">
     <a href="<?=base_url()?>">
      <?php 
      if(!empty($this->data['c_settings']->header_logo)){
      ?>
      <img src="<?=base_url()?>uploads/header_logo/<?=!empty($this->data['c_settings']->header_logo)?$this->data['c_settings']->header_logo:''?>" class="img-fluid" <?=!empty($this->data['c_settings']->header_logo_alt)?$this->data['c_settings']->header_logo_alt:''?>>
     <?php } ?>
     </a>
    </div>
    <div class="col-sm-8 col-5">
      <ul class="info-block">
            <li>
              <a class="hvr-underline-from-left" href="tel:<?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?>"><i class="fa fa-phone"></i><?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?></a>
            </li>
            <li>
              <a class="hvr-underline-from-left" href="mailto:<?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?>"><i class="fa fa-envelope"></i><?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?></a>
            </li>
        </ul>
    </div>

    <!-- <div class="col-4 d-block d-sm-none">45</div> -->


   </div>

<!--------------------------------------------- Page  Section  Start ---------------------------------------------->
<?php                    
if(isset($_view) && $_view)
$this->load->view($_view);
?> 

<!-------------------------------------------- Page Section  End ---------------------------------------------------->

 <section class="footer">
   <div class="container">
    <div class="row">
<?php 
if($ctr!='success'){

?>
    <div class="col-lg-4 col-md-6">
      <div class="card-style-3">
        <h5 class="mb-4">
        Contact Information
        </h5>
       <ul class="list-fot">
         <li>
          <div class="fot-info">
           <img src="<?=base_url()?>assets/frontend/img/map.svg"><p><?=!empty($this->data['c_settings']->address_one)?$this->data['c_settings']->address_one:''?></p>
          </div>
         </li>

         <li>
          <div class="fot-info">
           
           <img src="<?=base_url()?>assets/frontend/img/call.svg"><a href="tel:+97142250823"><h6><?=!empty($this->data['c_settings']->mobile_one)?$this->data['c_settings']->mobile_one:''?></h6></a>
          </div>
         </li>


         <li>
          <div class="fot-info">
           <img src="<?=base_url()?>assets/frontend/img/phone.svg"><a href="tel:+971547077476"><h6><?=!empty($this->data['c_settings']->mobile_two)?$this->data['c_settings']->mobile_two:''?> </h6></a>
          </div>
         </li>

         <li>
          <div class="fot-info">
         
           <img src="<?=base_url()?>assets/frontend/img/mail.svg"> <a href="mailto:info@healthcarebia.ae"><h6><?=!empty($this->data['c_settings']->email_two)?$this->data['c_settings']->email_two:''?></h6></a>
          </div>
         </li>

      
       </ul>

       <ul class="social-media">

                     <?php 
                 if(!empty($this->data['social']))
                 {
                   foreach($this->data['social'] as $social){
                ?>
 <li><a <?php if($social->tab_status == 1){ echo 'target="_blank"';} ?> href="<?=!empty($social->link)?$social->link:''?>"><i class="<?=!empty($social->icon_class)?$social->icon_class:''?>"></i></a></li>

             <?php }  } ?>

      
       </ul>
    </div>
  </div>
     <div class="col-lg-8 col-md-6">
      <div class="form-style-1 footer-form fot-form">
        <h5>
          Request a Call Back
        </h5>
        <form method="post" class="contact_form_footer">
          <input type="text" class="form-control" placeholder="Name" name="name" required>
          <input type="email" class="form-control" placeholder="Email" required name="email">
          <input type="text" class="form-control" placeholder="Phone" name="mobile" required onkeypress="return onlyNumberKey(event)">
          <textarea class="form-control" placeholder="Message" name="message" required></textarea>
         <input type="hidden" name="url_from" value="<?=current_url()?>">

         <input type="hidden" name="form_name" value="request_a_call_back"> 
          <button  type="submit" name="submit" class="btn-style-1 mt-4 hvr-sweep-to-right">Submit</button>
        </form><br/>
         <div class="msg1"></div>
         <div class="loading1"></div>
      </div>
      </div>

      <?php } ?>
     
      <div class="col-md-12 align-items-center">
        <ul class="copy-right">
          <li><a href="https://www.healthcarebia.ae/terms" class="hvr-underline-from-left"  target="_blank">Terms and Conditions</a></li>
          <li><a href="https://www.healthcarebia.ae/patientrights" class="hvr-underline-from-left"  target="_blank">Patient Rights</a></li>
          <li><a href="https://www.healthcarebia.ae/refund" class="hvr-underline-from-left"  target="_blank">Cancellation/Refund Policy </a></li>
        </ul>
      </div>
     </div>
   </div>
</section>



<div class="whatsapp-icon"> <a href="<?=$this->data['whatsappHref']?>" target="_blank">                
<img src="<?=base_url()?>assets/frontend/img/whatsapp.png" alt="WhatsApp"> </a>        
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js "></script>
<script src=" https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js "></script>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<script src="<?=base_url()?>assets/frontend/js/custom.js"></script>

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