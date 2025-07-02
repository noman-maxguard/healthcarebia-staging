<div class="row layout-top-spacing">
<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-content widget-content-area">
<div id="msg"></div>	
<?php echo form_open_multipart('admin/settings'); ?> 
<div class="box-body">
<div class="row">

<div class="col-md-3">
<label for="header_logo" class="control-label"><span class="text-danger"></span>Header logo</label>
<div class="form-group">
<input type="file" name="header_logo" value="<?php echo ($this->input->post('header_logo') ? $this->input->post('header_logo') : $settings['header_logo']); ?>" class="form-control" id="header_logo" />
<span class="text-danger"><?php echo form_error('header_logo');?></span>
</div>
</div>
<div class="col-md-3">
<?php
if(!empty($settings['header_logo'])){
?>	
<img style="width:200px"  src="<?php echo base_url('uploads/header_logo/').$settings['header_logo']; ?>">

<a title="Remove Image" style="cursor: pointer" class="deleteImage1" id="header_logo-settings-<?=$settings['id']?>">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
</a>

<?php } ?>
</div> 

<div class="col-md-6">
<label for="header_logo_alt" class="control-label">  <span class="text-danger"></span>Header logo alt</label>
<div class="form-group">
<input type="text" name="header_logo_alt" value="<?php echo ($this->input->post('header_logo_alt') ? $this->input->post('header_logo_alt') : $settings['header_logo_alt']); ?>" class="form-control" id="header_logo_alt" />
<span class="text-danger"><?php echo form_error('header_logo_alt');?></span>
</div>
</div> 
<div class="col-md-3 d-none">
<label for="footer_logo" class="control-label">  <span class="text-danger"></span>Mobile logo</label>
<div class="form-group">
<input type="file" name="footer_logo" value="<?php echo ($this->input->post('footer_logo') ? $this->input->post('footer_logo') : $settings['footer_logo']); ?>" class="form-control" id="footer_logo" />
<span class="text-danger"><?php echo form_error('footer_logo');?></span>
</div>
</div>

<div class="col-md-3 d-none">
<?php
if(!empty($settings['footer_logo'])){
?>
<img style="background-color: black;width: 150px;"  src="<?php echo base_url('uploads/footer_logo/').$settings['footer_logo']; ?>">

<a title="Remove Image" style="cursor: pointer" class="deleteImage1" id="footer_logo-settings-<?=$settings['id']?>">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
</a>
<?php } ?>
</div> 

<div class="col-md-6 d-none">
<label for="footer_logo_alt" class="control-label">  <span class="text-danger"></span>Footer logo alt</label>
<div class="form-group">
<input type="text" name="footer_logo_alt" value="<?php echo ($this->input->post('footer_logo_alt') ? $this->input->post('footer_logo_alt') : $settings['footer_logo_alt']); ?>" class="form-control" id="footer_logo_alt" />
<span class="text-danger"><?php echo form_error('footer_logo_alt');?></span>
</div>
</div> 



<div class="col-md-3 ">
<label for="subpage_logo" class="control-label">  <span class="text-danger"></span>Footer Image</label>
<div class="form-group">
<input type="file" name="subpage_logo" value="<?php echo ($this->input->post('subpage_logo') ? $this->input->post('subpage_logo') : $settings['subpage_logo']); ?>" class="form-control" id="subpage_logo" />
<span class="text-danger"><?php echo form_error('subpage_logo');?></span>
</div>
</div>


<div class="col-md-3">
<?php
if(!empty($settings['subpage_logo'])){
?>
	<img style="background-color: black;width: 150px;"  src="<?php echo base_url('uploads/subpage_logo/').$settings['subpage_logo']; ?>">
	<a title="Remove Image" style="cursor: pointer" class="deleteImage1" id="subpage_logo-settings-<?=$settings['id']?>">
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
	</a>

<?php } ?>
</div> 


<div class="col-md-6">
<label for="subpage_logo_alt" class="control-label">  <span class="text-danger"></span>Footer Image Alt</label>
<div class="form-group">
<input type="text" name="subpage_logo_alt" value="<?php echo ($this->input->post('subpage_logo_alt') ? $this->input->post('subpage_logo_alt') : $settings['subpage_logo_alt']); ?>" class="form-control" id="subpage_logo_alt" />
<span class="text-danger"><?php echo form_error('subpage_logo_alt');?></span>
</div>
</div> 




<div class="col-md-6">
<label for="company_name" class="control-label">  <span class="text-danger"></span>Company name</label>
<div class="form-group">
<input type="text" name="company_name" value="<?php echo ($this->input->post('company_name') ? $this->input->post('company_name') : $settings['company_name']); ?>" class="form-control" id="company_name" />
<span class="text-danger"><?php echo form_error('company_name');?></span>
</div>
</div>


<div class="col-md-6">
<label for="whatsapp_number" class="control-label">  <span class="text-danger"></span>Whatsapp number</label>
<div class="form-group">
<input type="text" name="whatsapp_number" value="<?php echo ($this->input->post('whatsapp_number') ? $this->input->post('whatsapp_number') : $settings['whatsapp_number']); ?>" class="form-control" id="whatsapp_number" />
<span class="text-danger"><?php echo form_error('whatsapp_number');?></span>
</div>
</div>




<div class="col-md-6">
<label for="whatsapp_message" class="control-label">  <span class="text-danger"></span>Whatsapp message</label>
<div class="form-group">
<input type="text" name="whatsapp_message" value="<?php echo ($this->input->post('whatsapp_message') ? $this->input->post('whatsapp_message') : $settings['whatsapp_message']); ?>" class="form-control" id="whatsapp_message" />
<span class="text-danger"><?php echo form_error('whatsapp_message');?></span>
</div>
</div> 
<div class="col-md-6">
<label for="mobile_one" class="control-label">  <span class="text-danger"></span>Mobile one</label>
<div class="form-group">
<input type="text" name="mobile_one" value="<?php echo ($this->input->post('mobile_one') ? $this->input->post('mobile_one') : $settings['mobile_one']); ?>" class="form-control" id="mobile_one" />
<span class="text-danger"><?php echo form_error('mobile_one');?></span>
</div>
</div> 

<div class="col-md-6">
<label for="mobile_two" class="control-label">  <span class="text-danger"></span>Mobile two</label>
<div class="form-group">
<input type="text" name="mobile_two" value="<?php echo ($this->input->post('mobile_two') ? $this->input->post('mobile_two') : $settings['mobile_two']); ?>" class="form-control" id="mobile_two" />
<span class="text-danger"><?php echo form_error('mobile_two');?></span>
</div>
</div>

<div class="col-md-6 d-none">
<label for="mobile_three" class="control-label">  <span class="text-danger"></span>Fax</label>
<div class="form-group">
<input type="text" name="mobile_three" value="<?php echo ($this->input->post('mobile_three') ? $this->input->post('mobile_three') : $settings['mobile_three']); ?>" class="form-control" id="mobile_three" />
<span class="text-danger"><?php echo form_error('mobile_three');?></span>
</div>
</div>

<div class="col-md-6 d-none">
<label for="mobile_four" class="control-label">  <span class="text-danger"></span>Toll Free</label>
<div class="form-group">
<input type="text" name="mobile_four" value="<?php echo ($this->input->post('mobile_four') ? $this->input->post('mobile_four') : $settings['mobile_four']); ?>" class="form-control" id="mobile_four" />
<span class="text-danger"><?php echo form_error('mobile_four');?></span>
</div>
</div>

<div class="col-md-6 d-none">
<label for="mobile_five" class="control-label">  <span class="text-danger"></span>Admission </label>
<div class="form-group">
<input type="text" name="mobile_five" value="<?php echo ($this->input->post('mobile_five') ? $this->input->post('mobile_five') : $settings['mobile_five']); ?>" class="form-control" id="mobile_five" />
<span class="text-danger"><?php echo form_error('mobile_five');?></span>
</div>
</div>


<div class="col-md-6">
<label for="email_one" class="control-label">  <span class="text-danger"></span>Email Address[for receiving Enquiries]</label>
<div class="form-group">
<input type="text" data-role="tagsinput" placeholder="Separate by comma (,)" name="email_one" value="<?= htmlentities($settings['email_one'], ENT_QUOTES); ?>" class="form-control" id="email_one" />
<span class="text-danger"><?php echo form_error('email_one');?></span>
</div>
</div> 
<div class="col-md-6">
<label for="email_two" class="control-label">  <span class="text-danger"></span>Email Address [for the Website]</label>
<div class="form-group">
<input type="text" name="email_two" value="<?php echo ($this->input->post('email_two') ? $this->input->post('email_two') : $settings['email_two']); ?>" class="form-control" id="email_two" />
<span class="text-danger"><?php echo form_error('email_two');?></span>
</div>
</div> 
<div class="col-md-6">
<label for="address_one" class="control-label">  <span class="text-danger"></span>Address one</label>
<div class="form-group">
<input type="text" name="address_one" value="<?php echo ($this->input->post('address_one') ? $this->input->post('address_one') : $settings['address_one']); ?>" class="form-control" id="address_one" />
<span class="text-danger"><?php echo form_error('address_one');?></span>
</div>
</div> 
<div class="col-md-12 d-none">
<label for="address_two" class="control-label">  <span class="text-danger"></span>Address Two</label>
<div class="form-group">
<input type="text" name="address_two" value="<?php echo ($this->input->post('address_two') ? $this->input->post('address_two') : $settings['address_two']); ?>" class="form-control" id="address_two" />
<span class="text-danger"><?php echo form_error('address_two');?></span>
</div>
</div> 

 
<div class="col-md-12 d-none">
<label for="footer_text" class="control-label">  <span class="text-danger"></span>Footer text</label>
<div class="form-group">
<textarea name="footer_text" class="form-control    " id="footer_text"><?php echo ($this->input->post('footer_text') ? $this->input->post('footer_text') : $settings['footer_text']); ?></textarea>
<span class="text-danger"><?php echo form_error('footer_text');?></span>
</div>
</div> 

<div class="col-md-12 d-none">
<label for="google_map" class="control-label">  <span class="text-danger"></span>Google map link</label>
<div class="form-group">
<textarea name="google_map" class="form-control    " id="google_map"><?php echo ($this->input->post('google_map') ? $this->input->post('google_map') : $settings['google_map']); ?></textarea>
<span class="text-danger"><?php echo form_error('google_map');?></span>
</div>
</div> 


<div class="col-md-12 d-none">
<label for="google_map_iframe" class="control-label">  <span class="text-danger"></span>Google map iframe</label>
<div class="form-group">
<textarea name="google_map_iframe" class="form-control" id="google_map_iframe"><?php echo ($this->input->post('google_map_iframe') ? $this->input->post('google_map_iframe') : $settings['google_map_iframe']); ?></textarea>
<span class="text-danger"><?php echo form_error('google_map_iframe');?></span>
</div>
</div> 

<div class="col-md-12 d-none">
<label for="header_script" class="control-label">  <span class="text-danger"></span>Header script</label>
<div class="form-group">
<textarea name="header_script" class="form-control    " id="header_script"><?php echo ($this->input->post('header_script') ? $this->input->post('header_script') : $settings['header_script']); ?></textarea>
<span class="text-danger"><?php echo form_error('header_script');?></span>
</div>
</div> 

<div class="col-md-12 d-none">
<label for="body_script" class="control-label">  <span class="text-danger"></span>Body script</label>
<div class="form-group">
<textarea name="body_script" class="form-control    " id="body_script"><?php echo ($this->input->post('body_script') ? $this->input->post('body_script') : $settings['body_script']); ?></textarea>
<span class="text-danger"><?php echo form_error('body_script');?></span>
</div>
</div> 


<div class="col-md-12">
<button type="submit" name="txt" class="mt-4 btn btn-primary">Save</button>
</div>



</div>
</div>
<?php echo form_close(); ?> 
</div>
</div>                 
</div>
</div>
