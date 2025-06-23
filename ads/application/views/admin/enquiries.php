<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
  <div class="widget-content widget-content-area br-6">
<?php if($this->session->flashdata('msg')){ ?>
<?php echo $this->session->flashdata('msg'); ?>
<?php } ?>  

  <div id="msg"></div>
      <div class="table-responsive mb-4 mt-4">
          <table id="html5-extension0" class="table table-hover non-hover" style="width:100%">
            <thead>
            <tr>
              <th></th>
              <th>Sl No</th>
              <th>Date</th>
              <th>Time</th>
              <th>Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Mobile</th>
              <th>Message</th>
              <th>Url from</th>
              <th>Ip address</th>
              <th>City</th>
              <th>Region</th>
              <th>Country</th>
              <th>User agent</th>
              <th>Action</th> 

            </tr>
            </thead>
            <tbody>
           
          <?php 
          $i=1;
           if(isset($enquiries) && $enquiries!=null)
           {
           foreach($enquiries as $e){ ?>
       
            <tr>
              <td><input type="checkbox" class="delete_checkbox" value="<?=$e['id']?>" /></td>
              <td><?=$i?></td>
              <td><?=$e['date']?></td>
              <td><?=$e['time']?></td>
              <td><?=$e['name']?></td> 
              <td><?=$e['lastname']?></td>
              <td><?=$e['email']?></td>
              <td><?=$e['mobile']?></td>  
              <td><?=$e['message']?></td>    
              <td><?php echo $e['url_from']; ?></td>
              <td><?php echo $e['ip_address']; ?></td>
              <td><?php echo $e['city']; ?></td>
              <td><?php echo $e['region']; ?></td>
              <td><?php echo $e['country']; ?></td>
              <td><?php echo $e['user_agent']; ?></td>
             
              
             

            <td>

        

            <a style="cursor: pointer" class="deletable" id="enquiries-<?=$e['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>

            </td>

</tr>
                  
              
<?php $i++;} } ?>
                 
                 
            
                 
          </tbody>
          </table>
         
      </div>
       <button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete Marked Items</button>
      </div>
</div>

