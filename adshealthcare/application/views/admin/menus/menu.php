<!--<div class="content-wrapper">
<section class="content-header">
<div class="container-fluid"> -->

<div class="row layout-top-spacing">

<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">

<div class="widget-content widget-content-area">


<div class="row">
<div class="col-md-12">
<div id="row">


<div id="col-md-12">
<div class="row">
<div id="main" class="col-md-12">
    <?php if($this->session->flashdata('msg')){ ?>
<?php echo $this->session->flashdata('msg'); ?>

<?php } ?>

<ul id="menu-group" >

<?php foreach ($menu_groups as $menu) : ?>
<li style="display:none;" id="group-<?php echo $menu->id; ?>">
<a href="<?php echo site_url('admin/menu/menu'); ?>/<?php echo $menu->id; ?>">
<?php echo $menu->title; ?>
</a>
</li>
<?php endforeach; ?>
<!-- <li id="add-group"><a href="<?php echo site_url('admin/menugroup/add'); ?>"
title="Add New Menu" class="btn  btn-default">+</a>
</li> -->

<a href="<?=base_url()?>setup-menu" title="Create New Menu Item" class="btn btn-info float-right" style="margin-bottom: 8px;">
Create New Menu</a> <br/>

</ul>
<div class="clear"></div>

<form method="post" id="form-menu" action="<?php echo site_url('admin/menu/save_position'); ?>">
<div class="ns-row" id="ns-header">
<div class="actions">Actions</div>
<div class="ns-url">URL</div>
<div class="ns-title">Title</div>
</div>
<?php echo $menu_ul; ?>
<div id="ns-footer">
<button type="submit" class="btn btn-default btn-success" id="btn-save-menu">Save
Menu
</button>
</div>
<br>
</form>
</div>

<aside class="col-md-4 col-sm-12" style="display:none;">

<section class="box">
<h2>Add To Menu</h2>
<div>
<form id="form-add-menu" method="post" action="<?php echo site_url('admin/menu/add'); ?>">

<div class="form-group">
<label for="menu-title">Title[Page Name]</label>
<input style="width: 100% !important;" type="text" name="title" required
id="menu-title"
class="form-control">
</div>

<div class="form-group">
<label for="menu-url">URL</label>
<input type="text" name="url" id="menu-url" class="form-control" required
style="width: 100% !important;">
</div>


<div class="form-group">
<label for="view_file_name">View File Name</label>
<input type="text" name="view_file_name"  class="form-control" required
style="width: 100% !important;">
</div>

<div class="form-group">
<label for="class">Class</label>
<input type="text" name="link"  class="form-control" 
style="width: 100% !important;">
</div>

<div class="form-group">
<label for="class">Product Filter</label>
<input type="text" name="product_filter"  class="form-control" 
style="width: 100% !important;">
</div>


<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>SEO</u></b></h5>
</div>

<div class="form-group">
<label for="meta_title" class="control-label"> <span class="text-danger"></span>Meta title</label>  
<textarea name="meta_title" class="form-control" id="meta_title"></textarea>  
</div>

<div class="form-group">
<label for="meta_description" class="control-label"> <span class="text-danger"></span>Meta description</label>
<textarea name="meta_description" class="form-control  " id="meta_description"></textarea>  
</div>

<div class="form-group">
<label for="meta_keywords" class="control-label"> <span class="text-danger"></span>Meta keywords</label>
<textarea name="meta_keywords" class="form-control" id="meta_keywords"></textarea>

</div> 

<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>Open Tab Status</u></b></h5>
</div>

<div class="form-group">
<select class="form-control" name="tab_status">
<option value="">Open Tab</option>  
<option value="0">Same Window</option>
<option value="1">New Window</option>
</select>
<span class="text-danger"><?php echo form_error('tab_status');?></span>
</div>

<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>Page Type</u></b></h5>
</div>

<div class="form-group">
<select class="form-control" name="page_type">
<option value="">Select page type</option>  
<option value="0">Website Link</option>  
<option value="1">External Url</option>
<option value="2"> Doc/Pdf Link</option>
</select>
<span class="text-danger"><?php echo form_error('page_type');?></span>
</div>

<div class="form-group">
    <label>External Url</label>
 <input type="text" name="external_url" class="form-control">
<span class="text-danger"><?php echo form_error('external_url');?></span>
</div>


<div class="row">
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

<div class="col-md-4">
    
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

<p class="buttons">
<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
<button id="add-menu" type="submit" class="btn btn-success ">Add Menu Item
</button>
</p>
</form>
</div>
</section>





<section class="box">
<h2>Info</h2>
<div>
<p>Drag the menu list to re-order, </p>
<p>Click <b>Update Menu</b> to save the
position.
</p>
<p>To add item on menu, use form below.</p>
</div>
</section>
<section class="box">
<h2>Current Menu</h2>
<div>
<span id="edit-group-input"><?php echo $group_title->title; ?></span>
(ID: <b><?php echo $group_id; ?></b>)
<div class="edit-group-buttons">
<a id="edit-group" href="#" title="Edit Menu"><span class="btn btn-primary"
style="color: #ffffff">Edit</span></a>
<?php if ($group_id > 1) : ?>
<a id="delete-group" href="#"><span class="btn btn-danger"
style="color:
#ffffff">Delete</span></a>
<?php endif; ?>
</div>
</div>
</section>
</aside>
</div>
<div class="clear"></div>


</div>



</div>
<div id="loading">
<img src="<?php echo base_url(); ?>resources/common/images/ajax-loader.gif" alt="Loading">
Processing...
</div>
</div>
</div>
</div>
</div>
</div>

<!-- </section> -->
</div>
