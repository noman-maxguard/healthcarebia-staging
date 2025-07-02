<div class="col-md-12 col-sm-12 col-xs-12" align="center"><br/>
  <h5><b><u>SEO</u></b></h5>
</div>

<div class="col-md-6">
<label for="meta_title" class="control-label"> <span class="text-danger"></span>Meta title</label>  
<textarea name="meta_title" class="form-control" id="meta_title"><?=$page_data->meta_title?></textarea>  
</div>

<div class="col-md-6">
<label for="meta_description" class="control-label"> <span class="text-danger"></span>Meta description</label>
<textarea name="meta_description" class="form-control" id="meta_description"><?=$page_data->meta_description?></textarea>  
</div>

<div class="col-md-12">
<label for="meta_keywords" class="control-label"> <span class="text-danger"></span>Meta keywords</label>
<textarea name="meta_keywords" class="form-control" id="meta_keywords"><?=$page_data->meta_keywords?></textarea>

</div> 

<div class="col-md-12 col-sm-12 col-xs-12" align="center"><br/>
  <h5><b><u>Script</u></b></h5>
</div>

<div class="col-md-12">
<label for="header_script" class="control-label">  <span class="text-danger"></span>Header script</label>
<div class="form-group">
<textarea name="header_script" class="form-control" id="header_script"><?=!empty($page_data->header_script)?$page_data->header_script:''?></textarea>
<span class="text-danger"><?php echo form_error('header_script');?></span>
</div>
</div> 

<div class="col-md-12">
<label for="body_script" class="control-label">  <span class="text-danger"></span>Body script</label>
<div class="form-group">
<textarea name="body_script" class="form-control" id="body_script"><?=!empty($page_data->body_script)?$page_data->body_script:''?></textarea>
<span class="text-danger"><?php echo form_error('body_script');?></span>
</div>
</div> 

 <div class="col-md-12 col-sm-12 col-xs-12 d-none" align="center"><br/>
  <h5><b><u>VISIBILITY</u></b></h5>
</div>

<div class="col-md-4 d-none">

<input type="checkbox" name="header_menu" value="1" <?php echo ($page_data->header_menu == 1 ? 'checked="checked"' : ''); ?>/>
<label for="" class="control-label">  
<span class="text-danger"></span>Header Menu</label>
</div>

<div class="col-md-4 d-none">
<input type="checkbox" name="footer_menu" value="1" <?php echo ($page_data->footer_menu == 1 ? 'checked="checked"' : ''); ?>/>
<label for="" class="control-label">  
    <span class="text-danger"></span>Footer Menu</label>
</div>

<div class="col-md-4 d-none">
<input type="checkbox" name="quick_link" value="1" <?php echo ($page_data->quick_link == 1 ? 'checked="checked"' : ''); ?>/>
<label for="" class="control-label">  
    <span class="text-danger"></span>Quick Link</label>
</div>

<div class="col-md-4" style="display:none;">
<input type="checkbox" name="product_filter" value="1" <?php echo ($page_data->product_filter == 1 ? 'checked="checked"' : ''); ?>/>
<label for="" class="control-label">  
    <span class="text-danger"></span>Product Filter</label>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 d-none" align="center"><br/>
  <h5><b><u>Common Settings</u></b></h5>
</div>

<div class="col-md-6 d-none">
    <label>Open Tab Status </label>
<div class="form-group">
<select class="form-control" name="tab_status">
<option value="">Open Tab</option>  
<option value="0"<?php if($page_data->tab_status == 0){ echo 'selected';} ?>>Same Window</option>
<option value="1" <?php if($page_data->tab_status == 1){ echo 'selected';} ?>>New Window</option>
</select>
<span class="text-danger"><?php echo form_error('tab_status');?></span>
</div>
</div>


<div class="col-md-6 d-none">
<label>Page Type </label>
<select class="form-control" name="page_type">
<option value="">Select page type</option>   
<option value="0" <?php if($page_data->page_type == 0){ echo 'selected';} ?>>Website Link</option>  
<option value="1" <?php if($page_data->page_type == 1){ echo 'selected';} ?>>External Url</option>
<option value="2" <?php if($page_data->page_type == 2){ echo 'selected';} ?>> Doc/Pdf Link</option>
</select>
<span class="text-danger"><?php echo form_error('page_type');?></span>
</div>

<div class="col-md-6" style="display:none;">
    <label>Link</label>
    <input type="text" name="external_url" class="form-control" value="<?=$page_data->external_url?>">
</div>

<div class="col-md-6">
    <br/>
<input type="checkbox" name="publish" value="1" <?php echo ($page_data->publish == 1 ? 'checked="checked"' : ''); ?>/>
<label for="is_add" class="control-label">  
    <span class="text-danger"></span>Publish[Active/Inactive]</label>
</div>