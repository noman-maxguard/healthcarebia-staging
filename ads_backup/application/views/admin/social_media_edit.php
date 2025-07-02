<div class="row layout-top-spacing">
<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-content widget-content-area">
<?php echo form_open_multipart('admin/social_media/edit/'.$social_media['id']); ?>
<div class="box-body">
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="name" class="control-label">  <span class="text-danger"></span>Name</label>	
<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $social_media['name']); ?>" class="form-control" id="name" />
<span class="text-danger"><?php echo form_error('name');?></span>
</div>
</div>

<div class="col-md-6">
	
	<div class="form-group">
	<label for="icon_class" class="control-label">  <span class="text-danger"></span>Icon class</label>

	<input type="text" name="icon_class" value="<?php echo ($this->input->post('icon_class') ? $this->input->post('icon_class') : $social_media['icon_class']); ?>" class="form-control" id="icon_class" />
	<span class="text-danger"><?php echo form_error('icon_class');?></span>
	</div>


</div>

<div class="col-md-3">
	
	<div class="form-group">
	<label for="image" class="control-label">  <span class="text-danger"></span>Image</label>

	<input type="file" name="image" value="<?php echo ($this->input->post('image') ? $this->input->post('image') : $social_media['image']); ?>" class="form-control" id="image" />
	<span class="text-danger"><?php echo form_error('image');?></span>
	</div>


</div>


<div class="col-md-3">
	<?php
if(!empty($social_media['image'])){
?>
<img width="100" height="100" src="<?php echo base_url('resource/image/').$social_media['image']; ?>">
<?php } ?>
</div>



<div class="col-md-6">
<div class="form-group">
<label for="link" class="control-label">  <span class="text-danger"></span>Link</label>
<input type="text" name="link" value="<?php echo ($this->input->post('link') ? $this->input->post('link') : $social_media['link']); ?>" class="form-control" id="link" />
<span class="text-danger"><?php echo form_error('link');?></span>
</div>

</div>

<div class="col-md-6">
	<label for="tab_status" class="control-label"> <span class="text-danger"></span>Tab status</label>
	<div class="form-group">
		<ul class="form-list">
			<li>
				<div class="n-chk">
					<label class="new-control new-radio square-radio new-radio-text">
						<input type="radio" class="new-control-input" name="tab_status" value="0" <?php if($social_media['tab_status'] == 0){ echo 'checked';} ?> >
						<span class="new-control-indicator"></span><span class="new-radio-content">Same Window</span>
					</label>
				</div>
			</li>
			<li>
				<div class="n-chk">
					<label class="new-control new-radio square-radio new-radio-text">
						<input type="radio" class="new-control-input" name="tab_status" value="1" <?php if($social_media['tab_status'] == 1){ echo 'checked';} ?>>
						<span class="new-control-indicator"></span><span class="new-radio-content">New Window</span>
					</label>
				</div>
			</li>
		</ul>
		
	</div>	
</div>

<div class="col-md-6">
<div class="form-group">
<label for="position" class="control-label">  <span class="text-danger"></span>Position</label>
<input type="text" name="position" value="<?php echo ($this->input->post('position') ? $this->input->post('position') : $social_media['position']); ?>" class="form-control" id="position" />
<span class="text-danger"><?php echo form_error('position');?></span>
</div>
</div>

<div class="col-md-6">

<div class="form-group">
<input type="checkbox" <?php echo ($social_media['publish']==1 ? 'checked="checked"' : ''); ?> name="publish" value="1"  id="publish" />
<label for="is_add" class="control-label">  <span class="text-danger"></span>Publish</label>
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
