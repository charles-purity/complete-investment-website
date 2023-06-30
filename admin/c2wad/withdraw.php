<?php

require __dir__ . '/sub-config.php';

include 'inc/for-withdraw.php';

include 'header.php';

?>

   <div class="card">
      <div class="card-header">
         <h5 class="text-center text-md-left mb-0">
			WITHDRAWAL MANAGEMENT
		</h5>
      </div>
      <div class="card-body">
		
		<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>
		
         <div class="p-1">
            <div class="table-responsive">
               <table class="display table table-striped"  id="example">
                  <thead>
                     <tr class="info">
                        <th>Email</th>
                        <th>wallet address</th>
                        <th style="display:none;"></th>
                        <th style="display:none;"></th>
                        <th style="display:none;"></th>
                        <th>Amount</th>
                        <th>Mode</th>
                        <th>Status</th>
                        <th>Reference ID</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
					 
						$sql= "SELECT * FROM wbtc ORDER BY id DESC";
                        $result = mysqli_query($link,$sql);
						
                        if(mysqli_num_rows($result)):
							while($row = mysqli_fetch_assoc($result)): 
                        
							
							if($row['status']== 'completed') $sec = '<i class="fa fa-check-circle text-success"></i> Completed';
							else $sec ='<i class="fa fa-question-circle text-warning"></i> Pending';
							
                        
                     ?>
                     <tr class="primary">
                        <form action="withdraw.php" method="post">
                           <td><?php echo $row['email'];?></td>
                           <td><?php echo $row['wal'];?></td>
                           <td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
                           <td style="display:none;"><input type="hidden" name="moni" value="<?php echo $row['moni'];?>"> </td>
                           <td style="display:none;"><input type="hidden" name="tnx" value="<?php echo $row['tnx'];?>"> </td>
                           <td>$<?php echo $row['moni'];?></td>
                           <td><?php echo $row['mode'];?></td>
                           <td class='text-nowrap'><?php echo $sec ;?></td>
                           <td><?php echo $row['tnx'];?></td>
                           <td><?php echo $row['date'];?></td>
                           <td><button class="btn btn-primary" type="submit" name="complete" ><span class="glyphicon glyphicon-check"> complete</span></button></td>
						</form>
						  <td>
								<form action="withdraw.php" method="post" onsubmit="return confirm('Delete withdrawal - <?php echo $row['tnx']; ?>');">
									<input type="hidden" name="tnx" value="<?php echo $row['tnx'];?>">
									<button type="submit" name="delete" class="btn btn-danger">
										<span class="glyphicon glyphicon-trash"> Delete</span>
									</button>
								</form>
							</td>
                     </tr>
                     <?php
							endwhile;
                        endif;
                    ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- /top tiles -->
   </div>


<?php include 'footer.php'; ?>