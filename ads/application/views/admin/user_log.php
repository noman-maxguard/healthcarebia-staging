<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
  <div class="widget-content widget-content-area br-6">
 
  <div id="msg"></div>
      <div class="table-responsive mb-4 mt-4">
          <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
            <thead>
            <tr>
			<th>#</th>
			<th>Email</th>
			<th>Date</th>
			<th>Ip</th>
			<th>User agent</th>
			<th>Status</th>
			<th>Reason</th>
			<!-- <th>Action</th> -->
            </tr>
            </thead>
            <tbody>
           
         <?php  
if(isset($user_log) && $user_log!=null)
{
$i=1;	
foreach($user_log as $u){ ?>
		<tr>
		<td><?=$i?></td>        
		<td><?php echo $u['email']; ?></td>
		<td><?php echo $u['date']; ?></td>
		<td><?php echo $u['ip']; ?></td>
		<td><?php echo $u['user_agent']; ?></td>
		<td>
		<?php 
		   $check = $u['status']; 
		   if($check  == 1)
		   {
		   	 echo '<span class="text-success">Complete</span>';
		   }
		   else
		   {
          echo '<span class="text-danger">Canceled</span>';

		   }	

	  ?>
		
	 </td>
		<td><?php echo @ucwords($u['reason']); ?></td>

		<!-- <td>
		
		<a style="cursor: pointer" class="deletable" id="user_log-<?=$u['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
		</td> -->

		</tr>
                  
				  
<?php $i++;} } ?>
                 
                 
            
                 
          </tbody>
          </table>
      </div>
      </div>
</div>
