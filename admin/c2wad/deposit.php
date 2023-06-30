<?php

require __dir__ . '/sub-config.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) include 'inc/for-deposit.php';

include 'header.php';

?>


	<div class="card">
	
		<div class="card-header">
            <h5 class="text-center text-md-left mb-0">
				INVESTORS DEPOSIT MANAGEMENT
			</h5>
		</div>
		
		<div class='card-body'>
		
			<?php sysfunc::html_notice($msg); ?>
			
			 <div class="row">
				<div class="col-md-12 col-sm-12 col-sx-12">
				   <div class="table-responsive">
					  <table class="display table-striped"  id="example">
						 <thead>
							<tr class="info">
							   <th>Email</th>
							   <th style="display:none;"></th>
							   <th style="display:none;"></th>
							   <th style="display:none;"></th>
							   <th>Amount(USD)</th>
							   <th>Mode</th>
							   <th>Status</th>
							   <th>Reference ID</th>
							   <th style="display:none;"></th>
							   <th>Referrer Pay </th>
							   <th>Date</th>
							   <th>Action</th>
							   <th>Action</th>
							   <th>Action</th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							
								$sql= "SELECT * FROM btc ORDER BY id DESC";
								$result = mysqli_query($link,$sql);
							   
								if(mysqli_num_rows($result)):
									while($row = mysqli_fetch_assoc($result)):   
							   
									   if($row['status']== 'approved') $sec = '<i class="fa fa-check-circle text-success"></i> Approved';
									   else $sec ='<i class="fa fa-times"></i> Pending';
									   
								?>
							<tr class="primary">
							   <form action="deposit.php?referred=<?php echo $row['referred'];?>" method="post">
								  <td><?php echo $row['email'];?></td>
								  <td style="display:none;"><input type="hidden" name="email" value="<?php echo $row['email'];?>"> </td>
								  <td style="display:none;"><input type="hidden" name="usd" value="<?php echo $row['usd'];?>"> </td>
								  <td style="display:none;"><input type="hidden" name="tnx" value="<?php echo $row['tnxid'];?>"> </td>
								  <td><?php echo $row['usd'];?> USD </td>
								  <td><?php echo $row['mode'];?>  </td>
								  <td class='text-nowrap px-1'><?php echo $sec ;?></td>
								  <td><?php echo $row['tnxid'];?></td>
								  <td style="display:none;"><input type="hidden" name="referred" value="<?php echo $row['referred'];?>"> </td>
								  <td><?php echo $row['referred'];?></td>
								  <td><?php echo $row['date'];?></td>
								  <td>
										<button class="btn btn-success" type="submit" name="approve">
											<i class="fa fa-check"></i> Approve
										</button>
									</td>
								  <td>
										<button class="btn btn-info" type="submit" name="referrer">
											<i class="fa fa-money"></i> Pay Referrer
										</button>
									</td>
								</form>
								<td>
									<form action="deposit.php" method='post' onsubmit="return confirm('Delete deposit - <?php echo $row['tnxid']; ?>');">
										<input type="hidden" name="tnx" value="<?php echo $row['tnxid'];?>">
										<button class="btn btn-danger" type="submit" name="delete">
											<i class="fa fa-trash"></i> Delete
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
		
	</div>

<?php include 'footer.php'; ?>