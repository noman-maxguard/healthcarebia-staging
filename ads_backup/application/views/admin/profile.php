<div class="row layout-top-spacing">
                
   <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
       
       <div class="widget-content widget-content-area br-6">

<!-- general form elements -->


<?php if($this->session->flashdata('msg')){ ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php } ?>
<div class="card card-primary">
<div class="card-header">
<h6 class="card-title">Edit Profile</h6>

</div>

<?php echo form_open('admin/common/user_profile/')?>  
<div class="card-body">


<div class="form-group" style="display: none;">
<label for="uid" class="control-label">  <span class="text-danger"></span>Userid</label>
<input type="text" name="uid" value="<?php echo ($this->input->post('uid') ? $this->input->post('uid') : $register->id); ?>" class="form-control" id="uid" />
</div>


<div class="form-group">
<label for="email" class="control-label">  <span class="text-danger"></span>Email</label>
<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $register->email); ?>" class="form-control" id="email" />
</div>

<div class="form-group">
<label for="password" class="control-label"><span class="text-danger"></span>Password</label>
<input type="text" name="password" class="form-control" id="password" placeholder="Leave the password field empty if you don't want to change..">
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




