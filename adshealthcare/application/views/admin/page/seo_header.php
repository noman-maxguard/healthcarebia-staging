
<div class="col-md-6">
<label for="menu-title">Title[Page Name]</label>
<input style="width: 100% !important;" type="text" name="title" required
id="menu-title"
class="form-control" value="<?=$page_data->title?>">
</div>

<div class="col-md-6">
<label for="menu-url">URL</label>
<input type="text" name="url" id="menu-url" class="form-control" required
style="width: 100% !important;" value="<?=$page_data->url?>">
</div>


<div class="col-md-12">
<label for="view_file_name">View File Name</label>
<input type="text" name="view_file_name"  class="form-control" required
style="width: 100% !important;" value="<?=$page_data->view_file_name?>">
</div>

<div class="col-md-6" style="display:none;">
<label for="class">Class</label>
<input type="text" name="link"  class="form-control" 
style="width: 100% !important;" value="<?=$page_data->link?>">
</div>

 <div class="col-md-12 col-sm-12 col-xs-12" align="center"><br/>
  <h5><b><u>Page Manage</u></b></h5>
</div>