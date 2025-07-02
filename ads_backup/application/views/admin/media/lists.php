 <?php echo form_input($form['media_id']);  ?>
<div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
<div class="statbox widget box box-shadow">
<div class="widget-header">
<div class="row">

<div class="col-xl-12 col-md-12 col-sm-12 col-12">
  <button type="button" onclick="loadUploaderWithGallery('.txt_container', 'media_test', 'single')" class="btn btn-primary btn-icon btn-rounded">Upload</button>
</div> 


</div>
</div>
<div class="widget-content widget-content-area">
<div class="table-responsive">
<table class="table table-bordered mb-4">
<thead>
<tr>
<th>#</th>
<th>Name</th>
<th>Module</th>
<th>Size</th>
<th>Created</th>
<th>URL Name</th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>

   <?php if($mediaData){
                        foreach($mediaData as $media){ ?>
                    <tr>
                        <td><img src="<?php echo base_url().'assets/cdn/uploads/'.$media['file_path'].'/small/'.$media['file_name'];  ?>" class="img-responsive thumb" data-cdn="<?php echo base_url(); ?>" data-url="<?php echo base_url('admin/media/singlemedia/'); ?>" data-id="" /></td>
                        <td><?php echo $media['original_name']; ?></td>
                        <td><?php echo $media['module']; ?></td>
                        <td><?php echo $media['file_size']; ?></td>
                        <td><?php echo $media['created'] ?></td>
                        <td><?php echo base_url().'assets/cdn/uploads/'.$media['file_path'].'/small/'.$media['file_name'];  ?></td>
                        <td class="text-center">
                        <a onclick="return confirm('Are you sure You want to delete?')" href="<?=base_url()?>admin/media/delete/<?=$media['media_id']?>" ><i class="far fa-trash-alt"></i>
                        </a>

                       <!--   <ul class="icons-list">

            <li class="text-danger-600"><a onclick="confirmDelete('<?php echo base_url('admin/media/delete/'.$media['media_id']); ?>')" ><i class="far fa-trash-alt"></i></a>
            </li>

<li class="text-danger-600">

            </li>


                            </ul> --> 

<!-- <a href="#" onclick="confirmDelete('<?php echo base_url('admin/media/delete/'.$media['media_id']); ?>')"><i class="far fa-trash-alt"></i></a> -->
                        </td>
                    </tr>
                    <?php }
                    } else { ?>
                    <tr>
                        <td colspan="5" >
                            <div class="alert alert-warning">No media file added yet.</div>
                        </td>
                    </tr>   
                <?php } ?>






</tbody>
</table>
</div>


</div>

</div>
</div>

                        