<style type="text/css">
    hr {
  -moz-border-bottom-colors: none;
  -moz-border-image: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  border-color: #EEEEEE -moz-use-text-color #FFFFFF;
  border-style: solid none;
  border-width: 1px 0;
  margin: 18px 0;
}
</style>
<div class="col-md-12">
<ul id="easymm" class="ui-sortable">
<?php 
if(!empty($template))
{
  $k=1;
  foreach($template as $temp)
  { ?>
    <li id="menu-<?=$temp->id?>" class="sortable">
    <div class="col-md-12 col-sm-12 col-xs-12 ns-title" align="center" ><h5><b><u>Template <?=$k?> </u></b></h5></div>
    <?php echo form_open_multipart('admin/service/insert_template_data/'.$service['id']); ?>
    <input type="hidden" value="<?=$temp->id?>" name="template_id">
    <input type="hidden" value="<?=$service['id']?>" name="menu_id">
    <div id="block<?=$temp->id?>">
       <?php 
       $compnent_id=!empty($temp->componets_id)?$temp->componets_id:0;
       if($compnent_id!=0)
       {
            $compnent_id=!empty($temp->componets_id)?$temp->componets_id:0;
            $comp=@explode(',',$compnent_id);
            if(!empty($comp))
            {
                  $ci=&get_instance();
               
                  $temp1=$ci->get_all_active_template_item_new_data($this->data['tbl_page_content'],$temp->menu_id,$temp->id,$compnent_id);

                  $temp1_multiple_image=$ci->get_all_active_template_item_new_data($this->data['tbl_page_gallery'],$temp->menu_id,$temp->id,$compnent_id);
                //banner
                
                if($compnent_id == '1')
                {
                  
                    if(!empty($temp1))
                    { ?>

                    <ul class="gal-bknd-listing p-2">
                    <?php 
                    foreach($temp1 as $data){
                    ?>

                       <li style="width: 250px;">

                        <a href="javascript:void(0)" class="gal-bknd-img">
                        <img style="width:100px" class="img-fluid" src="<?=base_url()?>uploads/banner/<?=$data->banner?>">
                        </a>

                        <div class="gal-bknd-body">

                        <input type="text" class="gal-bknd-input change_order" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="2" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>"  value="<?=$data->position?>" style=" margin-right:10px ;">

                        <input type="checkbox" class="gal-bknd-checkbox change_status" id="<?=$this->data['tbl_page_content']?>-<?=$data->id ?>" value="1" <?php echo ($data->publish==1 ? 'checked="checked"' : ''); ?> style="margin-right:10px ;">

                

                    <select class="form-control banner_category" name="banner_category" style="margin-right:10px ;">
                    <option value="">Select Banner</option>
                    <option value="1_<?=$data->id?>" <?php if($data->banner_category == 1){ echo 'selected';} ?>>Desktop</option>
                    <option value="0_<?=$data->id?>" <?php if($data->banner_category == 0){ echo 'selected';} ?>>Mobile</option>
                    <option value="2_<?=$data->id?>" <?php if($data->banner_category == 2){ echo 'selected';} ?>>Other Banner[based on position]</option>
                    </select>






                        <button type="button" class="gal-bknd-button deleteImage" id="banner-page_content-<?=$data->id?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                        </div>

                    </li>

                    <?php } ?>

                    </ul>   


                    <?php }
                  

                }

                //File

                elseif($compnent_id == '2')
                {
                    if(!empty($temp1))
                    { ?>

                    <ul class="gal-bknd-listing p-2">
                    <?php 
                    foreach($temp1 as $data){
                    ?>
                    <li>
                    <a href="javascript:void(0)" class="gal-bknd-img">
                    <img style="width:100px" class="img-fluid" src="<?=base_url()?>uploads/image/<?=$data->image?>">
                    </a>
                    <div class="gal-bknd-body">
                    <input type="text" class="gal-bknd-input change_order" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="2" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>"  value="<?=$data->position?>">

                    <input type="checkbox" class="gal-bknd-checkbox change_status" id="<?=$this->data['tbl_page_content']?>-<?=$data->id ?>" value="1" <?php echo ($data->publish==1 ? 'checked="checked"' : ''); ?> >


                    <button type="button" class="gal-bknd-button deleteImage" id="image-<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </button>
                    </div>
                    </li>

                    <?php } ?>

                    </ul> 

                    <?php }
                 
                }
                // Textarea
                elseif($compnent_id == '3')
                {
                  
                    if(!empty($temp1))
                    {
                  
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">


                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>
                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>


                    </div>
                      <hr width="100%" size="20" align="center">

                
                    <?php  } } 


                }
                // Input Box
                elseif($compnent_id == '4')
                {

                    if(!empty($temp1))
                    {
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-10">
                    <label class="control-label"> <span class="text-danger"></span>Title</label>
                    <div class="form-group">
                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 
                    <div class="col-md-2">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>


                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>
                    </div>

                   


                    <?php } } 
                  


                }
                // Multiple File
                elseif($compnent_id == '5')
                {


                    if(!empty($temp1_multiple_image))
                    { ?>
                    <ul class="gal-bknd-listing p-2">
                    <?php 
                    foreach($temp1_multiple_image as $data){
                    ?>

                    <li>
                    <a href="javascript:void(0)" class="gal-bknd-img">
                    <img class="img-fluid" src="<?=base_url()?>uploads/files1/<?=$data->image?>">
                    </a>
                    <div class="gal-bknd-body">
                    <input type="text" class="gal-bknd-input change_order" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="2" id="<?=$this->data['tbl_page_gallery']?>-<?=$data->id?>"  value="<?=$data->position?>">

                    <input type="checkbox" class="gal-bknd-checkbox change_status" id="<?=$this->data['tbl_page_gallery']?>-<?=$data->id ?>" value="1" <?php echo ($data->publish==1 ? 'checked="checked"' : ''); ?> >


                    <button type="button" class="gal-bknd-button deleteImage" id="image-<?=$this->data['tbl_page_gallery']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </button>
                    </div>
                    </li>

                    <?php } ?>

                    </ul> 

                    <?php } 
                    



                }

                // Multiple File
                elseif($compnent_id == '4,5')
                {
                     if(!empty($temp1))
                    {
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-10">
                    <label class="control-label"> <span class="text-danger"></span>Title</label>
                    <div class="form-group">
                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 
                    <div class="col-md-2">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>


                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>
                    </div>
                    <?php } } 

                    if(!empty($temp1_multiple_image))
                    { ?>
                    <ul class="gal-bknd-listing p-2">
                    <?php 
                    foreach($temp1_multiple_image as $data){
                    ?>

                    <li>
                    <a href="javascript:void(0)" class="gal-bknd-img">
                    <img class="img-fluid" src="<?=base_url()?>uploads/files1/<?=$data->image?>">
                    </a>
                    <div class="gal-bknd-body">
                    <input type="text" class="gal-bknd-input change_order" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="2" id="<?=$this->data['tbl_page_gallery']?>-<?=$data->id?>"  value="<?=$data->position?>">

                    <input type="checkbox" class="gal-bknd-checkbox change_status" id="<?=$this->data['tbl_page_gallery']?>-<?=$data->id ?>" value="1" <?php echo ($data->publish==1 ? 'checked="checked"' : ''); ?> >


                    <button type="button" class="gal-bknd-button deleteImage" id="image-<?=$this->data['tbl_page_gallery']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </button>
                    </div>
                    </li>

                    <?php } ?>

                    </ul> 

                    <?php } 
                    



                }

                 // Multiple File
                elseif($compnent_id == '3,5')
                {
                    if(!empty($temp1))
                    {
                  
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">


                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>
                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>


                    </div>
                      <hr width="100%" size="20" align="center">

                
                    <?php  } } 

                    if(!empty($temp1_multiple_image))
                    { ?>
                    <ul class="gal-bknd-listing p-2">
                    <?php 
                    foreach($temp1_multiple_image as $data){
                    ?>

                    <li>
                    <a href="javascript:void(0)" class="gal-bknd-img">
                    <img class="img-fluid" src="<?=base_url()?>uploads/files1/<?=$data->image?>">
                    </a>
                    <div class="gal-bknd-body">
                    <input type="text" class="gal-bknd-input change_order" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="2" id="<?=$this->data['tbl_page_gallery']?>-<?=$data->id?>"  value="<?=$data->position?>">

                    <input type="checkbox" class="gal-bknd-checkbox change_status" id="<?=$this->data['tbl_page_gallery']?>-<?=$data->id ?>" value="1" <?php echo ($data->publish==1 ? 'checked="checked"' : ''); ?> >


                    <button type="button" class="gal-bknd-button deleteImage" id="image-<?=$this->data['tbl_page_gallery']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </button>
                    </div>
                    </li>

                    <?php } ?>

                    </ul> 

                    <?php } 
                    



                }
                // External Record
                elseif($compnent_id == '6')
                {

                  


                }

                // FilE TEXTAREA
                elseif($compnent_id == '2,3')
                {
                    
                    if(!empty($temp1))
                    {

                    
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-12">
                    <?php 
                    if(!empty($data->image)){
                    ?> 
                    <img style="width:100px" src="<?=base_url()?>uploads/image/<?=$data->image?>">
                    <?php } ?>
                    </div>

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea  class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                    </div>
                    </div> 
                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>


                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>
                    </div>

                      <hr width="100%" size="20" align="center">

                 


                    <?php  } } 


                }
                 // FilE INPUT BOX
                elseif($compnent_id == '2,4')
                {

                    if(!empty($temp1))
                    {

                   
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-2">
                    <?php 
                    if(!empty($data->image)){
                    ?> 
                    <img style="width:100px" src="<?=base_url()?>uploads/image/<?=$data->image?>">
                    <?php } ?>
                    </div>

                    <div class="col-md-8">
                    <label class="control-label"> <span class="text-danger"></span>Title</label>
                    <div class="form-group">
                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 
                    <div class="col-md-2">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>


                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>
                    </div>

                  


                    <?php  } } 



                }
                // TEXTAREA INPUT BOX
                elseif($compnent_id == '3,4')
                {

                    if(!empty($temp1))
                    {
                    $i=1;
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>
                    </div>
                    </div> 
                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Text</label>
                    <div class="form-group">
                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>
                    </div>
                    </div> 

                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>


                    </div>
                      <hr width="100%" size="20" align="center">

                    <?php  } } 



                }
                // // FilE TEXTAREA INPUT BOX
                elseif($compnent_id == '2,3,4')
                {

                    if(!empty($temp1))
                    {
                    $i=1;
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-12">
                    <?php 
                    if(!empty($data->image)){
                    ?> 
                    <img style="width:100px" src="<?=base_url()?>uploads/image/<?=$data->image?>">
                    <?php } ?>
                    </div>

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Text</label>
                    <div class="form-group">

                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>


                    </div>
                      <hr width="100%" size="20" align="center">




                    <?php  } } 


                }
                // // TEXTAREA INPUT BOX,INPUT BOX
                elseif($compnent_id == '3,4,8')
                {

                if(!empty($temp1))
                {
                $i=1;
                foreach($temp1 as $data){
                ?>
                <div class="row p-3">

                <div class="col-md-12">
                <label class="control-label"> <span class="text-danger"></span>Text</label>
                <div class="form-group">

                <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                </div>
                </div> 
          

                <div class="col-md-12">
                <label class="control-label"> <span class="text-danger"></span>Description</label>
                <div class="form-group">
                <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                </div>
                </div> 

                <div class="col-md-12">
                <label class="control-label"> <span class="text-danger"></span>Text</label>
                <div class="form-group">

                <input type="text" class="form-control" value="<?=$data->title1?>" readonly>

                </div>
                </div> 

 


                <div class="col-md-12">
                <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                </svg>
                </a>

                <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>

                </div>


                </div>
                <hr width="100%" size="20" align="center">




                <?php  } } 



                }



               // FilE TEXTAREA INPUT BOX,Textarea
                elseif($compnent_id == '2,3,4,7')
                {

                    if(!empty($temp1))
                    {
                    $i=1;
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-12">
                    <?php 
                    if(!empty($data->image)){
                    ?> 
                    <img style="width:100px" src="<?=base_url()?>uploads/image/<?=$data->image?>">
                    <?php } ?>
                    </div>

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Text</label>
                    <div class="form-group">

                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description1?></textarea>

                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>

                    </div>
                      <hr width="100%" size="20" align="center">




                    <?php  } } 



                }
                // FilE TEXTAREA INPUT BOX,INPUT BOX
                elseif($compnent_id == '2,3,4,8')
                {

                    if(!empty($temp1))
                    {
                    $i=1;
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    <div class="col-md-12">
                    <?php 
                    if(!empty($data->image)){
                    ?> 
                    <img style="width:100px" src="<?=base_url()?>uploads/image/<?=$data->image?>">
                    <?php } ?>
                    </div>

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Text</label>
                    <div class="form-group">

                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Title</label>
                    <div class="form-group">
                       <input type="text" class="form-control" value="<?=$data->title1?>" readonly>

                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>


                    </div>
                      <hr width="100%" size="20" align="center">




                    <?php  } } 



                }
                // FilE TEXTAREA INPUT BOX,Textarea
                elseif($compnent_id == '3,4,7,9')
                {

                    if(!empty($temp1))
                    {
                    $i=1;
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Text</label>
                    <div class="form-group">

                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description1?></textarea>

                    </div>
                    </div>


                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description2?></textarea>

                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>

                    </div>
                      <hr width="100%" size="20" align="center">




                    <?php  } } 



                }
              //TEXTAREA INPUT BOX,Textarea,INPUT BOX
                elseif($compnent_id == '3,4,7,8')
                {


                     if(!empty($temp1))
                    {
                    $i=1;
                    foreach($temp1 as $data){
                    ?>
                    <div class="row p-3">
                    

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description?></textarea>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Text</label>
                    <div class="form-group">

                    <input type="text" class="form-control" value="<?=$data->title?>" readonly>

                    </div>
                    </div> 

                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Description</label>
                    <div class="form-group">
                    <textarea class="form-control tinyMCE-content-full-readonly"><?=$data->description1?></textarea>

                    </div>
                    </div>


                    <div class="col-md-12">
                    <label class="control-label"> <span class="text-danger"></span>Title</label>
                    <div class="form-group">
                      <input type="text" class="form-control" value="<?=$data->title1?>" readonly>

                    </div>
                    </div> 


                    <div class="col-md-12">
                    <a href="javascript:void(0)" class="editpopup" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>" data-toggle="modal" data-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>
                    </a>

                    <a href="javascript:void(0)" class="deletable" id="<?=$this->data['tbl_page_content']?>-<?=$data->id?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>

                    </div>

                    </div>
                      <hr width="100%" size="20" align="center">




                    <?php  } } 


                }



                else
                {
                        
                   echo 'This Type Of Template Not Acceptable current System! For Further Details Please Contact Developer Team';

                }    



            }

       }
       else
       {
         echo 'Active Componets are not available!';
       }

     ?>

    </div>
      <?php 
      if($compnent_id!= '6'){

      ?>
      <div class="col-md-12">
      <button type="submit"  class="mt-4 btn btn-primary d-none save_button<?=$temp->id?>">Save</button><br/>
      </div>
      <?php } ?>
      <br/>
      <?php echo form_close(); ?> 

    </li>

  <?php $k++;} 

 }
 ?> 
 
    
</ul>

</div>








    
