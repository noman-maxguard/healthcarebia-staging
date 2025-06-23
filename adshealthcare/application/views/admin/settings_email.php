<div class="row layout-top-spacing">
<!-- Main content -->
 <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
<div class="widget-content widget-content-area br-6">
<div class="card card-primary">
<div class="card-header">
<h6 class="card-title">Email Settings</h6>
</div>

<?php echo form_open('admin/email_settings/') ?>
<div class="card-body">

<div class="form-group">
<label for="mail_cate" class="control-label"> Email Type: </label>
<select name="mail_cate" class="form-control mclass">
	<option value="">Select Mailer</option>
	<option value="0" <?php if($email_settings['mail_cate'] == 0){ echo 'selected';}  ?>>PHP Mailer</option>
	<option value="1" <?php if($email_settings['mail_cate'] == 1){ echo 'selected';}  ?>>SMTP</option>
</select>

</div>

<div class="form-group box_m 1">
<label for="smtp_server" class="control-label">  <span class="text-danger"></span>Smtp server</label>

<input type="text" name="smtp_server" value="<?php echo ($this->input->post('smtp_server') ? $this->input->post('smtp_server') : $email_settings['smtp_server']); ?>" class="form-control" id="smtp_server" />
</div>

<div class="form-group box_m 1">
<label for="display_name" class="control-label">  <span class="text-danger"></span>Display name</label>

<input type="text" name="display_name" value="<?php echo ($this->input->post('display_name') ? $this->input->post('display_name') : $email_settings['display_name']); ?>" class="form-control" id="display_name" />
</div>

<div class="form-group box_m 1">
<label for="smtp_username" class="control-label">  <span class="text-danger"></span>Smtp username</label>	
<input type="text" name="smtp_username" value="<?php echo ($this->input->post('smtp_username') ? $this->input->post('smtp_username') : $email_settings['smtp_username']); ?>" class="form-control" id="smtp_username" />
</div>

<div class="form-group box_m 1">
<label for="smtp_password" class="control-label">  <span class="text-danger"></span>Smtp password</label>	
<input type="text" name="smtp_password" value="<?php echo ($this->input->post('smtp_password') ? $this->input->post('smtp_password') : $email_settings['smtp_password']); ?>" class="form-control" id="smtp_password" />
</div>

<div class="form-group box_m 1">
<label for="smtp_ports" class="control-label">  <span class="text-danger"></span>Smtp ports</label>	
<select name="smtp_ports" class="form-control">
	<option value="">Select Port</option>
	<option value="587" <?php if($email_settings['smtp_ports'] == 587){ echo 'selected';} ?>>587</option>
	<option value="465" <?php if($email_settings['smtp_ports'] == 465){ echo 'selected';} ?>>465</option>
</select>

</div>

<div class="form-group box_m 1">
<label for="smtp_secure" class="control-label">  <span class="text-danger"></span>SSL/TLS:</label>	
<select name="smtp_secure" class="form-control">
	<option value="">Select SSL/TLS:</option>
	<option value="tls" <?php if($email_settings['smtp_secure'] == 'tls'){ echo 'selected';} ?>>TLS</option>
	<option value="ssl" <?php if($email_settings['smtp_secure'] == 'ssl'){ echo 'selected';} ?>>SSL</option>
</select>

</div>


</div>
<!-- /.card-body -->

<div class="card-footer">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
<?php echo form_close(); ?>
</div>







</div>
</div>
</div>
