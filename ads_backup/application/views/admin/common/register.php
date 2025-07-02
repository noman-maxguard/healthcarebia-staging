<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
<title>Register </title>
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
<link href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/assets/css/forms/theme-checkbox-radio.css">
<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/assets/css/forms/switches.css">
</head>
<body class="form">
<div class="form-container outer">
<div class="form-form">
<div class="form-form-wrap">
<div class="form-container">
<div class="form-content">

<h1 class="">Register</h1>
<p class="signup-link register">Already have an account? <a href="<?=base_url()?>admin/login">Log in</a></p>
<p class="">

  <?php 
   if(!empty($this->data['c_settings'])){
   ?>
     <img style="width: 100px; background-color: black;" src="<?=base_url()?>uploads/header_logo/<?=$this->data['c_settings']->header_logo?>" alt="<?=$this->data['c_settings']->header_logo_alt?>">

   <?php } else{ ?>   

   <img  style="width: 100px; background-color: black;" src="<?=base_url()?>assets/images/custom.png">
   <?php } ?>
 

</p>

<!-- width="200px" height="70px" -->

<div class="form">
<form  class="cus_plus text-left" method="post" >
<input type="hidden" class="txt_csrfname1" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>"><br>   
<div class="row">

<div class="col-md-6" style="display: none;">
<label for="type" class="control-label">Type</label>
<div class="form-group">
<select class="form-control form-control-lg type" name="type">
<?php if(!empty($this->data['role'])){
foreach($this->data['role'] as $role){
?>   
<option value="<?=$role->id?>" <?php if($role->id == 1){ echo 'selected';} ?>><?=$role->type?></option>
<?php } } ?>
</select>
</div>
</div>

<div class="col-md-6">
<label for="email" class="control-label">Email</label>
<div class="form-group">
<input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
</div>
</div> 

<div class="col-md-6">
<label for="password" class="control-label">Password</label>
<div class="form-group">
<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
</div>
</div>

<div class="col-md-6">
<label for="name" class="control-label">Name</label>
<div class="form-group">
<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
</div>
</div>

<div class="col-md-6">
<label for="contact_no" class="control-label">Contact No </label>
<div class="form-group">
<input type="text" name="contact_no" value="<?php echo $this->input->post('contact_no'); ?>" class="form-control" id="contact_no" />
</div>
</div>

<div class="col-md-12">
<label for="address" class="control-label">Address</label>
<div class="form-group">
<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
</div>
</div>

<div class="col-md-12">
<label for="location" class="control-label">Location</label>
<div class="form-group">
<input type="text" name="location" value="<?php echo $this->input->post('location'); ?>" class="form-control" id="location" />
<input type="file" id="document" name="files" style="display:none">
</div>
</div>



</div>
<!------------------------>


<div class="d-sm-flex justify-content-between">
<div class="field-wrapper">
<button type="submit" name="submit" class="btn btn-primary" value="">Get Started!</button>
</div>
</div>
</form>


</div>
<br/>
<div class="msg"></div>
</div>


</div>                    
</div>
</div>
</div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?=base_url();?>assets/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/popper.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="<?=base_url();?>assets/assets/js/authentication/form-2.js"></script>
<script>
$(document).ready(function()
{

            $("form.cus_plus").submit(function(event)
            {
                    event.preventDefault();
                    $('.msg').html('');
                    $('.msg').show();
                    var csrfName = $('.txt_csrfname1').attr('name'); // Value specified in $config['csrf_token_name']
                    var csrfHash = $('.txt_csrfname1').val();
                    var formData = new FormData(this);
                    var file_data = $('#document').prop('files')[0];
                    formData.append('file', file_data);
                    formData.append(csrfName, csrfHash);
                    $.ajax({
                                type:'POST',
                                enctype:'multipart/form-data',
                                url:'<?=base_url()?>admin/register/add',
                                data:formData,
                                dataTypes:'json',
                                dataSrc:"",
                                processData:false,
                                contentType:false,
                                success: function (Jsondata)
                                {
                                    var obj    = $.parseJSON(Jsondata);
                                    var flag   =  obj.flag;
                                    if(flag == 1)
                                    {
                                        $('.txt_csrfname1').val(obj.token);	
                                        $('.msg').html("<div class='alert alert-success'>" + obj.status + "</div>");
                                        setTimeout(function () 
                                        {
                                          $(".msg").hide();
                                          $('.cus_plus')[0].reset();
                                          window.location.href = '<?=base_url()?>admin/login/';
                                        }, 2000);

                                    }
                                    else
                                    {

                                        $('.txt_csrfname1').val(obj.token);
                                        $('.msg').html("<div class='alert alert-warning'>" + obj.status + "</div>");
                                        setTimeout(function ()
                                        {
                                            $(".msg").hide();
                                            $('.cus_plus')[0].reset();
                                        }, 2000);

                                    }

                                }



                          });
            });

});


</script>
</body>


</html>