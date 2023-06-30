<?php

require __dir__ . '/sub-config.php';

include 'header.php';

?>

<div class="panel-header bg-primary-gradient">
	
	<?php section::title("Account Transactions"); ?>
	
	<?php section::price_widget(""); ?>
	
</div>


<div class="page-inner " style="margin-top:50px">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
			<div class="card">
				<h2 class='card-header'> My Deposit History </h2>
				<div class='card-body'>
					<div class="table-responsive">
						<table class="display table"  id="example">
							<thead>
								<tr class="info">
									<th>Email</th>
									<th>Amount(USD)</th>
									<th>Mode</th>
									<th>Status</th>
									<th>Tnx ID</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								
									$sql= "SELECT * FROM btc WHERE email='{$__user['email']}' ";
									$result = mysqli_query($link,$sql);
									
									if(mysqli_num_rows($result) > 0):
										while($row = mysqli_fetch_assoc($result)):  

											if($row['status'] == 'approved')
												$sec = 'Completed <i class="fa fa-check-circle text-success"></i>';
											else
												$sec ='Pending <i "fa  fa-refresh text-warning"></i>';
									 
									 ?>
								<tr class="primary">
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['usd'];?></td>
									<td><?php echo $row['mode'];?></td>
									<td><?php echo $sec;?></td>
									<td><?php echo $row['tnxid'];?></td>
									<td><?php echo $row['date'];?></td>
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
		</div>
        </br>
        <div class="col-md-12 col-sm-12 col-sx-12">
			<div class='card'>
				<h2 class='card-header'>My  Withdrawal History </h2>
				<div class='card-body'>
					<div class="table-responsive">
						<table class="display table"  id="ex">
							<thead>
								<tr class="info">
									<th>Email</th>
									<th>Amount(USD)</th>
									<th>Mode</th>
									<th>Status</th>
									<th>Tnx ID</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								
									$sql1= "SELECT * FROM wbtc WHERE email='{$__user['email']}' ";
									$result1 = mysqli_query($link,$sql1);
									
									if(mysqli_num_rows($result1)):
										while($row = mysqli_fetch_assoc($result1)):
									  
									
											if($row['status'] == 'approved')
												$sec = 'Completed <i class="fa fa-check-circle text-success"></i>';
											else
												$sec ='Pending <i "fa  fa-refresh text-warning"></i>';									 
									 
									 ?>
								<tr class="primary">
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['moni'];?></td>
									<td><?php echo $row['mode'];?></td>
									<td><?php echo $sec;?></td>
									<td><?php echo $row['tnx'];?></td>
									<td><?php echo $row['date'];?></td>
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
	   </div>
    </div>
</div>
  
 
<?php include 'footer.php'; ?>
