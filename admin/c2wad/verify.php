<?php

require __dir__ . '/sub-config.php';

include 'inc/for-verify.php';

include 'header.php';

?>

<div class="card">
	<div class="card-header">
		<h5 class="text-center text-md-left mb-0">
			INVESTORS MANAGEMENT
		</h5>
	</div>
		<div class="card-body">
		
			<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>
			
			<div class="">
				<div class="table-responsive">
					<table class="table display table-striped table-bordered text-center ">
						<thead>
							<tr class="info">
								<th>Username</th>
								<th>Email</th>
								<th>Email Status</th>
								<th>Avatar</th>
								<th>User Status</th>
								<th>Date</th>
								<th>Verify Email</th>
								<th colspan="3">Verify User</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							
								$sql= "SELECT * FROM users ORDER BY id DESC";
								
								$result = mysqli_query($link,$sql);
								
								if(mysqli_num_rows($result)):
									while($row = mysqli_fetch_assoc($result)): 
									
									if(!empty($row['verify'])) $msg = "<i class='text-success fa fa-check-circle'></i> <br> verified";
									else $msg = '<i class="fa fa-times text-danger"></i> <br> unverified';
									
									if(!empty($row['confirm'])) $msg1 = "<i class='fa fa-check-circle text-success'></i> <br> confirmed";
									else $msg1 = "<i class='fa fa-question-circle text-warning'></i> <br> pending";
							
							?>
							<tr class="primary">
								<form action="verify.php" method="post">
									<td><?php echo $row['username'];?></td>
									<td id="email">
										<?php echo $row['email'];?>
										<input type="hidden" name="email" value="<?php echo $row['email'];?>">
									</td>
									<td ><?php echo $msg1;?></td>
									<td><img src="<?php echo user::get($row, 'avatar'); ?>" width="50px" class='img-fluid'></td>
									<td><?php echo $msg;?></td>
									<td><?php echo $row['date'];?></td>
									<td>
										<button class="btn btn-primary text-nowrap" type="submit" name="vemail" title="approve user email">
											<i class='fa fa-envelope'></i> <i class="fa fa-check"></i> 
										</button>
									</td>
									<td>
										<button class="btn btn-success text-nowrap" type="submit" name="verify" title="verify user">
											<i class="fa fa-check"></i>
										</button>
									</td>
									<td>
										<button class="btn btn-warning text-nowrap" type="submit" name="unverify" title="unverify user">
											<i class="fa fa-ban"></i> 
										</button>
									</td>
								</form>
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