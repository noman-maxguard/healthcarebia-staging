<h2>Edit Menu Item</h2>
<form method="post" action="<?php echo site_url('admin/menu/save'); ?>">

<div class="form-group">
<label for="edit-menu-title">Title</label>
<input required type="text" name="title" id="edit-menu-title" class="form-control" style="width: 100%"
value="<?php echo
htmlentities($row->title) ?>">
</div>
<div class="form-group">
<label for="edit-menu-url">URL</label>
<input type="text" name="url" class="form-control" style="width: 100%" id="edit-menu-url" value="<?php echo
$row->url;
?>">
</div>

<div class="form-group">
<label for="edit-menu-url">View File Name</label>
<input type="text" name="view_file_name" class="form-control" style="width: 100%" id="edit-menu-url" value="<?php echo
$row->view_file_name;
?>">
</div>

<div class="form-group">
<label for="edit-menu-url">Class</label>
<input type="text" name="link" class="form-control" style="width: 100%" id="edit-menu-url" value="<?php echo
$row->link;
?>">
</div>

<div class="form-group">
<label for="class">Product Filter</label>
<input type="text" name="product_filter"  class="form-control" 
style="width: 100% !important;" value="<?=$row->product_filter?>">
</div>



<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>SEO</u></b></h5>
</div>

<div class="form-group">
<label for="meta_title" class="control-label"> <span class="text-danger"></span>Meta title</label>  
<textarea name="meta_title" class="form-control" id="meta_title"><?=$row->meta_title?></textarea>  
</div>

<div class="form-group">
<label for="meta_description" class="control-label"> <span class="text-danger"></span>Meta description</label>
<textarea name="meta_description" class="form-control  " id="meta_description"><?=$row->meta_description?></textarea>  
</div>

<div class="form-group">
<label for="meta_keywords" class="control-label"> <span class="text-danger"></span>Meta keywords</label>
<textarea name="meta_keywords" class="form-control" id="meta_keywords"><?=$row->meta_keywords?></textarea>

</div> 

<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>Open Tab Status</u></b></h5>
</div>

<div class="form-group">
<select class="form-control" name="tab_status">
<option value="">Open Tab</option>  
<option value="0"<?php if($row->tab_status == 0){ echo 'selected';} ?>>Same Window</option>
<option value="1" <?php if($row->tab_status == 1){ echo 'selected';} ?>>New Window</option>
</select>
<span class="text-danger"><?php echo form_error('tab_status');?></span>
</div>

<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>Page Type</u></b></h5>
</div>

<div class="form-group">
<select class="form-control" name="page_type">
<option value="">Select page type</option>    
<option value="0" <?php if($row->page_type == 0){ echo 'selected';} ?>>Website Link</option>  
<option value="1" <?php if($row->page_type == 1){ echo 'selected';} ?>>External Url</option>
<option value="2" <?php if($row->page_type == 2){ echo 'selected';} ?>> Doc/Pdf Link</option>
</select>
<span class="text-danger"><?php echo form_error('page_type');?></span>
</div>

<div class="form-group">
    <label>External Url</label>
 <input type="text" name="external_url" class="form-control" value="<?=$row->external_url?>">
<span class="text-danger"><?php echo form_error('external_url');?></span>
</div>


<div class="row">
 <div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <h5><b><u>VISIBILITY</u></b></h5>
</div>   
<div class="col-md-4">

<div class="form-group">
<input type="checkbox" name="header_menu" value="1" <?php echo ($row->header_menu == 1 ? 'checked="checked"' : ''); ?>/>
<label for="is_add" class="control-label">  
    <span class="text-danger"></span>Header Menu</label>
</div>

</div>

<div class="col-md-4">
    
<div class="form-group">
<input type="checkbox" name="footer_menu" value="1" <?php echo ($row->footer_menu == 1 ? 'checked="checked"' : ''); ?>/>
<label for="is_add" class="control-label">  
    <span class="text-danger"></span>Footer Menu</label>
</div>

</div>
<div class="col-md-4">
    
<div class="form-group">
<input type="checkbox" name="quick_link" value="1" <?php echo ($row->quick_link == 1 ? 'checked="checked"' : ''); ?>/>
<label for="is_add" class="control-label">  
    <span class="text-danger"></span>Quick Link</label>
</div>


</div>
</div>

<div class="form-group">
<input type="checkbox" name="publish" value="1" <?php echo ($row->publish == 1 ? 'checked="checked"' : ''); ?>/>
<label for="is_add" class="control-label">  
    <span class="text-danger"></span>Publish[Active/Inactive]</label>
</div>


<!--    <p>-->
<!--        <label for="edit-menu-class">Class</label>-->
<!--        <input type="text" name="class" id="edit-menu-class" value="--><?php //echo $row->class; ?><!--">-->
<!--    </p>-->
<?php if ($row->parent_id == 0) : //only top level menu can be moved ?>
<div class="form-group">
<label for="select_group_id">Group</label>
<select name="group_id" id="select_group_id" class="form-control">
<?php foreach ($menu_groups as $group): ?>
<option value="<?php echo $group->id; ?>" <?php if ($group->id == $row->group_id) {
echo 'selected';
} ?>><?php echo $group->title; ?></option>
<?php endforeach;
?>

</select>
</div>

<input type="hidden" name="old_group_id" value="<?php echo $row->group_id; ?>">
<?php endif; ?>
<input type="hidden" name="menu_id" value="<?php echo $row->id; ?>">
</form>