<div class="row layout-top-spacing">
<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">
<!-- <div class="widget-content widget-content-area"> -->
<?php if($this->session->flashdata('msg')){ ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php } ?>  

<?php echo form_open_multipart('setup-menu'); ?>

<div class="row">
<div class="col-md-12">


<div class="form-group">
<label for="menu-title">Menu</label>
<input style="width: 100% !important;" type="text" name="title" required
id="menu-title"
class="form-control">
</div>

<div class="form-group">
<label for="menu-url">URL</label>
<input type="text" name="url" id="menu-url" class="form-control"
style="width: 100% !important;">
</div> 

<!-- <div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>Open Tab Status</u></b></h5>
</div> -->


<div class="form-group" style="display:none;">
<select class="form-control" name="tab_status">
<option value="">Open Tab</option>  
<option value="0">Same Window</option>
<option value="1">New Window</option>
</select>
<span class="text-danger"><?php echo form_error('tab_status');?></span>
</div> 


<div class="col-md-12 col-sm-12 col-xs-12 d-none" align="center">
  <h5><b><u>Menu Type</u></b></h5>
</div>

<div class="form-group d-none">
<select class="form-control" name="page_type">
<option value="0">Website Link</option>  
<option value="1">External Url</option>
<option value="2"> Doc/Pdf Link</option>
</select>
<span class="text-danger"><?php echo form_error('page_type');?></span>
</div>


<div class="row d-none">
 <div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>VISIBILITY</u></b></h5>
</div>   
<div class="col-md-4">

<div class="form-group">
<input type="checkbox" name="header_menu" value="1"/>
<label for="" class="control-label">  
    <span class="text-danger"></span>Header Menu</label>
</div>

</div>

<div class="col-md-4 d-none">
    
<div class="form-group">
<input type="checkbox" name="footer_menu" value="1"/>
<label for="" class="control-label">  
    <span class="text-danger"></span>Footer Menu</label>
</div>

</div>
<div class="col-md-4">
    
<div class="form-group">
<input type="checkbox" name="quick_link" value="1"/>
<label for="" class="control-label">  
    <span class="text-danger"></span>Quick Link</label>
</div>


</div>
</div>

<div class="form-group">
<input type="checkbox" name="publish" value="1"/>
<label for="is_add" class="control-label">  
    <span class="text-danger"></span>Publish[Active/Inactive]</label>
</div>

<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">


<div class="col-md-12">
<button type="submit" name="txt" class="mt-4 btn btn-primary">Save</button>
</div>





</div>
</div>
<?php echo form_close(); ?> 
<!-- </div>
</div>    -->              

