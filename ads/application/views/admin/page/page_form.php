<div class="row layout-top-spacing">
<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-content widget-content-area">
<?php if($this->session->flashdata('msg')){ ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php } ?>	

<?= form_open_multipart(isset($page_data) ? "manage-pages/update_page/{$page_data->url}" : "manage-pages/save_page", 'class="form-horizontal"'); ?>

<?= form_hidden('user_id', $this->session->userdata('user_id'))?>
<?= form_hidden( isset($page_data) ? 'modified' : 'created', date('Y-m-d H:i:s'))?>
<?php 
$page_name='Edit '.@ucwords($page_name);
?>
<legend><?= isset($page_data) ? "$page_name" : "Add Page" ?></legend>

<div class="row">
<input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
<?php                    
if(isset($_seoheader) && !empty($_seoheader))
$this->load->view($_seoheader);
?> 	

<!--------------Start Page Content-------------------------->

<?php                    
if(isset($_page) && !empty($page_exit))
$this->load->view($_page);
?> 
<!----------------Start Page End Content------------------------>

<?php                    
if(isset($_seofooter) && !empty($_seofooter))
$this->load->view($_seofooter);
?> 


<div class="col-md-12">
<button type="submit" name="submit" class="mt-4 btn btn-primary">Save</button>
</div>
</div>

<?php echo form_close(); ?> 
