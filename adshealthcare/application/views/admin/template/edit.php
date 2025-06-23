<div class="row layout-top-spacing">
<div id="basic" class="col-lg-12 layout-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-content widget-content-area">
<?php echo form_open('role/edit/'.$role['id']); ?>
<div class="box-body">
<div class="row">

<div class="col-md-6">
<label for="role" class="control-label">Role</label>
<div class="form-group">
<input type="text" name="role" value="<?php echo ($this->input->post('role') ? $this->input->post('role') : $role['role']); ?>" class="form-control" id="role" />
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
