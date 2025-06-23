<div class="row layout-top-spacing">
<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-content widget-content-area">
<?php echo form_open_multipart('admin/social_media/add'); ?>

<div class="box-body">
<div class="row">

<div class="col-md-6">
<div class="form-group">
<label for="name" class="control-label"> <span class="text-danger"></span>Name</label>	
<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control " id="name" />
</div>
</div>


<div class="col-md-6">
	
<div class="form-group">
<label for="icon_class" class="control-label"> <span class="text-danger"></span>Icon class</label>
<input type="text" name="icon_class" value="<?php echo $this->input->post('icon_class'); ?>" class="form-control " id="icon_class" />
</div>

</div>

<div class="col-md-6">

<div class="form-group">
<label for="image" class="control-label"> <span class="text-danger"></span>Image</label>	
<input type="file" name="image" value="<?php echo $this->input->post('image'); ?>" class="form-control " id="image" />
</div>
	
</div>

<div class="col-md-6">

<div class="form-group">
<label for="link" class="control-label"> <span class="text-danger"></span>Link</label>	
<input type="text" name="link" value="<?php echo $this->input->post('link'); ?>" class="form-control " id="link" />
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
						<input type="radio" class="new-control-input" name="tab_status" value="0" >
						<span class="new-control-indicator"></span><span class="new-radio-content">Same Window</span>
					</label>
				</div>
			</li>
			<li>
				<div class="n-chk">
					<label class="new-control new-radio square-radio new-radio-text">
						<input type="radio" class="new-control-input" name="tab_status" value="1" >
						<span class="new-control-indicator"></span><span class="new-radio-content">New Window</span>
					</label>
				</div>
			</li>
		</ul>
		
	</div>	
</div>



<div class="col-md-6">


<label for="position" class="control-label"> <span class="text-danger"></span>Position</label>
<div class="form-group">
<input type="text" name="position" value="<?=$position_order?>" class="form-control " id="position" />
<span class="text-danger"><?php echo form_error('position');?></span>
</div>
	
</div>

<div class="col-md-6">


<div class="form-group">
<input type="checkbox" name="publish" value="1"  id="publish" />
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














