<!doctype html>
<html lang="en">
   <head>
      <?php include 'includes/inc_head_tag.php'; ?>
   </head>
   <body>
      <?php include 'includes/inc_header.php'; ?>
      <section class="sub-banner small-banner"
         style="background-image: url(<?= base_url() ?>assets/frontend/img/small-banner.png);">
         <div class="overlay">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h2>Contact Us</h2>
                     <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                           <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>
                           <li class="active" aria-current="page">Contact Us</li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section-gap">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <h6>Feel free to contact us any time. We will get back to you soon </h6>
                  <div class="card-style5 p-4 mt-4">
                     <div><span><img src="<?= base_url() ?>assets/frontend/img/map-icon.svg" alt=""></span></div>
                     <div>
                        <h6>Location</h6>
                        <h5>DIFC, Dubai, UAE</h5>
                     </div>
                  </div>
                  <div class="card-style5 p-4 mt-4">
                     <div><span>							<img
                        src="<?= base_url() ?>assets/frontend/img/contact-phone.svg" alt=""></span>
                     </div>
                     <div>
                        <h6>Phone</h6>
                        <h5><a href="tel:+97142250823">+971 4 22 50823</a></h5>
                        <h5><a href="tel:+971547077476">+971 547 077476</a></h5>
                     </div>
                  </div>
                  <div class="card-style5 p-4 mt-4">
                     <div><span>							<img
                        src="<?= base_url() ?>assets/frontend/img/contact-mail.svg" alt=""></span>
                     </div>
                     <div>
                        <h6>Email</h6>
                        <h5><a href="mailto:info@healthcarebia.ae">info@healthcarebia.ae</a></h5>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="card-style6 p-5">
                     <h4 class="mb-4">Request a Call Back</h4>
                     <div class="row">
                        <div class="col-md-12">
                           <?php
                              $form_index = 'contact';
                              
                              ?>
                           <form class="row request-form contact_form" method="post" id="form_<?= $form_index ?>">
                              <div class="col-md-12 mb-3"><input class="form-input" type="text"
                                 placeholder="First Name"
                                 name="fname" required="required"></div>
                              <div class="col-md-12 mb-3"><input class="form-input" type="text"
                                 placeholder="Last Name" name="lname"></div>
                              <div class="col-md-12 mb-3"><input class="form-input" type="email" placeholder="Email"
                                 name="email" required="required"></div>
                              <div class="col-md-12 mb-3"><input class="form-input" type="text" placeholder="Phone"
                                 name="phone"
                                 onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                 maxlength="13"></div>
                              <div class="col-md-12 mb-3">
                                <select name="customer_type" class="form-input" required>
                                    <option value="" disabled selected>— Type —</option>
                                    <option value="b2b">Business</option>
                                    <option value="b2c">Consumer</option>
                                </select>
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
               <div class="col-md-12 mt-5">
                  <div class="map-block">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7219.396360917424!2d55.279054!3d25.213399!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f437ad48ce8ab%3A0x1441da8daee852a8!2sHealthcarebia%20Home%20Healthcare%20Centre%20LLC.%20IV%20Drip%20at%20Home%20Dubai!5e0!3m2!1sen!2sae!4v1693902003383!5m2!1sen!2sae"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <?php include 'includes/inc_footer.php'; ?>
      <?php include 'includes/inc_footer_scripts.php'; ?>
   </body>
</html>