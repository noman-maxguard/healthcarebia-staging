<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="msg"></div>
    <a  href="<?=base_url()?>admin/social_media/add" ><button class="btn btn-outline-primary btn-rounded mb-2 f-right">Add Social Media</button></a>
 <div class="table-responsive mb-4 mt-4">

<table id="html5-extension" class="table table-hover" style="width:100%">

<thead>
<tr>
<th>Sl No</th>
<th>Name</th>
<th>Icon class</th>
<th>Link</th>
<th>Tab status</th>
<th>Position</th>
<th>Publish</th>
<th>Action</th>
</tr>
</thead>

<tbody>
<?php $i=1; 

foreach($social_media as $s){ ?>
<tr>
<td><?=$i++;?></td>        
<td><?php echo $s['name']; ?></td>
<td><?php echo $s['icon_class']; ?></td>
<td><?php echo $s['link']; ?></td>
<td>
<?php 
if($s['tab_status'] == 0){ echo 'Same Window';} else{ echo 'New Window';  }; 
?>
</td>

<td><?php echo $s['position']; ?></td>
<td><?php
 if($s['publish'] == 1){ echo '<span class="text-success">Active</span>';} else { echo '<span class="text-danger">Inactive</span>'; }; 
?>
</td>
<td>
    <a href="<?php echo site_url('admin/social_media/edit/'.$s['id']); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a> 




<a style="cursor: pointer" class="deletable" id="social_media-<?=$s['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>




</td>

</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
</div>
</div>

























