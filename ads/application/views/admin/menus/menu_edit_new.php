<div class="row layout-top-spacing">

<div id="basic" class="col-lg-12 layout-spacing">

<div class="statbox widget box box-shadow">

<div class="widget-content widget-content-area">

<?php if($this->session->flashdata('msg')){ ?>

<?php echo $this->session->flashdata('msg'); ?>

<?php } ?>  

<?php echo form_open_multipart('setup-menu/'.$row->id); ?>



<div class="row">

<div class="col-md-12">

<div class="form-group">

<label for="edit-menu-title">Menu</label>

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





<div class="form-group" style="display:none;">

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





<!-- <div class="col-md-12 col-sm-12 col-xs-12" align="center">

  <h5><b><u>Open Tab Status</u></b></h5>

</div> -->



<div class="form-group" style="display:none;">

<select class="form-control" name="tab_status">

<option value="">Open Tab</option>  

<option value="0"<?php if($row->tab_status == 0){ echo 'selected';} ?>>Same Window</option>

<option value="1" <?php if($row->tab_status == 1){ echo 'selected';} ?>>New Window</option>

</select>

<span class="text-danger"><?php echo form_error('tab_status');?></span>

</div>



<div class="col-md-12 col-sm-12 col-xs-12 d-none" align="center">

  <h5><b><u>Menu Type</u></b></h5>

</div>



<div class="form-group d-none">

<select class="form-control" name="page_type">

<option value="0" <?php if($row->page_type == 0){ echo 'selected';} ?>>Website Link</option>  

<option value="1" <?php if($row->page_type == 1){ echo 'selected';} ?>>External Url</option>

<option value="2" <?php if($row->page_type == 2){ echo 'selected';} ?>> Doc/Pdf Link</option>

</select>

<span class="text-danger"><?php echo form_error('page_type');?></span>

</div>





<div class="row d-none">

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







<input type="hidden" name="old_group_id" value="<?php echo $row->group_id; ?>">





<input type="hidden" name="menu_id" value="<?php echo $row->id; ?>">





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

