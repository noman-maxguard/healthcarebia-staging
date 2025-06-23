<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/inc_head_tag.php' ?>


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include 'includes/inc_header.php' ?>

    <?php include 'includes/inc_sidebar.php' ?>

    <!--CONTINUE--->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form role="form" action="<?= base_url() ?>admin/settings/update_settings" enctype="multipart/form-data"
                      method="post">


                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Settings</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->


                                <div class="card-body">


                                    <!--Main logo-->
                                    <div class="form-group">
                                        <label class="control-label">Backend Logo: <span style="color: red">(106 x 60 pixels)</span></label>
                                        <div class="controls">
                                            <input type="file" class="change_image" id="logo" name="logo"
                                                   accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         style="display: <?= !empty($settings->logo) ? 'block' : 'none' ?>"
                                         id="div_logo">
                                        <label class="control-label"></label>
                                        <div class="controls">


                                            <img id="img_logo"
                                                 src="<?= !empty($settings->logo) ? (base_url() . 'uploads/images/' . $settings->logo) : '' ?>"
                                                 alt='Image' width="100"
                                                 class="img-responsive">


                                            <!--Delete Image-->
                                            <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <input type="hidden" name="hidden_logo" class="hidden_logo" value="0">
                                            <!--Delete Image-->
                                        </div>
                                    </div>
                                    <!--Main logo-->


                                    <?php
                                    /*

                                     <!-- logoSub-->
                                    <div class="form-group">
                                        <label class="control-label">Footer Logo 1: <span style="color: red">(156 x 87 pixels)</span></label>
                                        <div class="controls">
                                            <input type="file" class="change_image" id="logoSub"   name="logoSub"  accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         style="display: <?= !empty($settings->logoSub) ? 'block' : 'none' ?>"
                                         id="div_logoSub">
                                        <label class="control-label"></label>
                                        <div class="controls">


                                            <img id="img_logoSub"
                                                 src="<?= !empty($settings->logoSub) ? (base_url() . 'uploads/images/'.$settings->logoSub) : '' ?>"
                                                 alt='Image'
                                                 class="img-responsive">


                                            <!--Delete Image-->
                                            <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <input type="hidden" name="hidden_logoSub" class="hidden_logoSub" value="0">
                                            <!--Delete Image-->
                                        </div>
                                    </div>
                                    <!-- logoSub-->


                                      <!-- logoFooter-->
                                    <div class="form-group">
                                        <label class="control-label">Footer Logo 2: <span style="color: red">(102 x 58 pixels)</span></label>
                                        <div class="controls">
                                            <input type="file" class="change_image" id="logoFooter"   name="logoFooter"  accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group"
                                         style="display: <?= !empty($settings->logoFooter) ? 'block' : 'none' ?>"
                                         id="div_logoFooter">
                                        <label class="control-label"></label>
                                        <div class="controls">


                                            <img id="img_logoFooter"
                                                 src="<?= !empty($settings->logoFooter) ? (base_url() . 'uploads/images/'.$settings->logoFooter) : '' ?>"
                                                 alt='Image'
                                                 class="img-responsive">


                                            <!--Delete Image-->
                                            <a title="Remove Image" style="cursor: pointer" class="deleteImage">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <input type="hidden" name="hidden_logoFooter" class="hidden_logoFooter" value="0">
                                            <!--Delete Image-->
                                        </div>
                                    </div>
                                    <!-- logoFooter-->


                                      <div class="form-group">
                                        <label class="control-label">Logo Alt Text</label>
                                        <div class="controls"><input type="text" name="logo_alt_text" class="form-control"  value="<?= htmlentities($settings->logo_alt_text, ENT_QUOTES); ?>"/></div>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label">Email (Admission Enquiries)</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="Admission Enquiries Email Address" type="email" name="email2" value="<?= htmlentities($settings->email2, ENT_QUOTES); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Additional Email 1</label>
                                        <div class="controls row">
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="Text" title="Text" type="text" name="email3_text" value="<?= htmlentities($settings->email3_text, ENT_QUOTES); ?>">

                                            </div>
                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="Email Address" title="Email Address" type="email" name="email3" value="<?= htmlentities($settings->email3, ENT_QUOTES); ?>">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Additional Email 2</label>
                                        <div class="controls row">
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="Text" title="Text" type="text" name="email4_text" value="<?= htmlentities($settings->email4_text, ENT_QUOTES); ?>">

                                            </div>
                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="Email Address" title="Email Address" type="email" name="email4" value="<?= htmlentities($settings->email4, ENT_QUOTES); ?>">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Additional Email 3</label>
                                        <div class="controls row">
                                            <div class="col-md-5">
                                                <input class="form-control" placeholder="Text" title="Text" type="text" name="email5_text" value="<?= htmlentities($settings->email5_text, ENT_QUOTES); ?>">

                                            </div>
                                            <div class="col-md-7">
                                                <input class="form-control" placeholder="Email Address" title="Email Address" type="email" name="email5" value="<?= htmlentities($settings->email5, ENT_QUOTES); ?>">

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Fax</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="Fax" type="text" name="fax" value="<?= htmlentities($settings->fax, ENT_QUOTES); ?>">
                                        </div>
                                    </div>


                                       <div class="form-group">
                                      <label class="control-label">Instagram Embed Code</label>
                                      <div class="controls">
                                                     <textarea rows="3" cols="5"
                                                               class="form-control " placeholder="Code for Embedding Instagram Posts"
                                                               name="instagram_script"><?= !empty($settings->instagram_script) ? htmlentities($settings->instagram_script, ENT_QUOTES) : ''; ?></textarea>

                                      </div>
                                  </div>

                                     */
                                    ?>


                                    <div class="form-group">
                                        <label class="control-label">Company Name <span
                                                    class="text-error">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="company_name" required class="form-control"
                                                   value="<?= htmlentities($settings->company_name, ENT_QUOTES); ?>"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Email for receiving Enquiries <span
                                                    class="text-error">*</span></label>
                                        <div class="controls">
                                            <input class="form-control " data-role="tagsinput"
                                                   placeholder="Separate by comma (,)" type="text" required
                                                   name="contact_us_email"
                                                   value="<?= htmlentities($settings->contact_us_email, ENT_QUOTES); ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">WhatsApp Number</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="Example :- 971541234567"
                                                   type="text" name="whatsapp"
                                                   value="<?= htmlentities($settings->whatsapp, ENT_QUOTES); ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">WhatsApp Message</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="WhatsApp Default Message"
                                                   type="text" name="whatsapp_msg"
                                                   value="<?= htmlentities($settings->whatsapp_msg, ENT_QUOTES); ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Header Script</label>
                                        <div class="controls">
                                           <textarea rows="3" cols="5"
                                                     class="form-control "
                                                     placeholder="Script before closing <head> tag"
                                                     name="script_header"><?= !empty($settings->script_header) ? htmlentities($settings->script_header, ENT_QUOTES) : ''; ?></textarea>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Body Script</label>
                                        <div class="controls">
                                           <textarea rows="3" cols="5"
                                                     class="form-control "
                                                     placeholder="Script before closing <body> tag"
                                                     name="script_body"><?= !empty($settings->script_body) ? htmlentities($settings->script_body, ENT_QUOTES) : ''; ?></textarea>

                                        </div>
                                    </div>


                                    <?php
                                    /*
                                     <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="General Enquiries Email Address" type="email" name="email" value="<?= htmlentities($settings->email, ENT_QUOTES); ?>">
                                        </div>
                                    </div>








                                    <div class="form-group">
                                        <label class="control-label">Phone Number</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="Phone" type="text" name="phone" value="<?= htmlentities($settings->phone, ENT_QUOTES); ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <div class="controls">
                                            <input class="form-control" placeholder="Mobile" type="text" name="mobile" value="<?= htmlentities($settings->mobile, ENT_QUOTES); ?>">
                                        </div>
                                    </div>








                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <div class="controls">
                                            <textarea rows="3" cols="5"  class="form-control textarea" placeholder="Address" name="address"><?=$settings->address;?></textarea>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="control-label">Google Map Iframe Code</label>
                                        <div class="controls">
                                            <textarea rows="3" cols="5" class="form-control " placeholder="Iframe Code" name="google_map_iframe"><?=$settings->google_map_iframe;?></textarea>

                                        </div>
                                    </div>


                                        <div class="form-group">
                              <label class="control-label">Website</label>
                              <div class="controls">
                                  <input class="form-control" placeholder="Example:- https://www.example.com" type="text" name="website" value="<?= htmlentities($settings->website, ENT_QUOTES); ?>">
                              </div>
                          </div>





                          <div class="form-group">
                              <label class="control-label">Facebook</label>
                              <div class="controls">
                                  <input class="form-control" placeholder="Facebook" type="text" name="facebook" value="<?= htmlentities($settings->facebook, ENT_QUOTES); ?>">
                              </div>
                          </div>




                          <div class="form-group">
                              <label class="control-label">Twitter</label>
                              <div class="controls">
                                  <input class="form-control" placeholder="Twitter" type="text" name="twitter" value="<?= htmlentities($settings->twitter, ENT_QUOTES); ?>">
                              </div>
                          </div>



                          <div class="form-group">
                              <label class="control-label">Instagram</label>
                              <div class="controls">
                                  <input class="form-control" placeholder="Instagram" type="text" name="instagram" value="<?= htmlentities($settings->instagram, ENT_QUOTES); ?>">
                              </div>
                          </div>




                          <div class="form-group">
                              <label class="control-label">LinkedIn</label>
                              <div class="controls">
                                  <input class="form-control" placeholder="LinkedIn" type="text" name="linkedin" value="<?= htmlentities($settings->linkedin, ENT_QUOTES); ?>">
                              </div>
                          </div>



                                  <div class="form-group">
                                      <label class="control-label">Youtube</label>
                                      <div class="controls">
                                          <input class="form-control" placeholder="Youtube" type="text" name="youtube"
                                                 value="<?= htmlentities($settings->youtube, ENT_QUOTES); ?>">
                                      </div>
                                  </div>








                                     */
                                    ?>


                                </div>


                                <div class="card-footer">
                                    <button type="submit" id="submit" name="submit" value="submit"
                                            class="btn btn-primary submit">Submit
                                    </button>
                                </div>


                            </div>
                            <!-- /.card -->


                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">


                        </div>


                    </div>
                </form>
                <!--/.col (right) -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include 'includes/inc_footer.php' ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/inc_footer_scripts.php' ?>


<script>
    //File input
    $(".change_image").change(function () {

        var id = $(this).attr('id');


        displayImage(this, id);
    })

    function displayImage(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img_' + id).attr('src', e.target.result);
                $('#div_' + id).show();
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    //File input


    //Delete Image
    $('.deleteImage').click(function () {
        var x = confirm("Are you sure want to remove this image ?");
        if (x) {
            var id_str = $(this).parent().parent().prev().children().next().children().attr('id');

            $('.hidden_' + id_str).val(1);
            $('#div_' + id_str).hide();
        } else
            return false;


    })
    //Delete Image
</script>

</body>
</html>
