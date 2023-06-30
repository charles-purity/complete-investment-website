<?php

require __dir__ . '/sub-config.php';

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) include "inc/for-deposit.php";

include "header.php";

/*
$rates = json_encode((new forex())->export_rates());
$temp->HTMLFooter[] = "<script>var rates = '{$rates}';</script>";
*/

?>

<div class="panel-header bg-primary-gradient">

	<?php section::title( "Deposit" ); ?>
	
    <?php section::price_widget(); ?>
	
</div>


<div class="row row-card-no-pd mt--2">
	
	<div class="col-lg-12 my-3">
		<h2 class="bg-light p-3">Wallet Depost</h2>
	</div>
	
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="row row-card-no-pd mt--2">
				
					<?php
						$sql = "SELECT * FROM pmethod";
						$result = mysqli_query($link, $sql);
						
						if(mysqli_num_rows($result)) {
							while($row = mysqli_fetch_assoc($result)) {
					?>
					
					<div class="col-lg-6">
					
						<div class='mb-2'>
							<input type="text" class="form-control" value="<?php echo $row['details']?>"  id="<?php echo $row['pmethod']?>" readonly>
							<button data-copy="#<?php echo $row['pmethod'];?>" class="btn btn-info">
								Copy <?php echo $row['pmethod'];?> Address
							</button>
						</div>
						
						<form action="deposit.php" method="POST"  enctype="multipart/form-data">
							<div class="card card-stats card-round">
								<div class="card-body">
										
										<div class="numbers">
											<h4 class="card-title text-right">
												<?php echo $row['pmethod'];?>
											</h4>
											<?php 
												if( isset($temp->error) && ($row['pmethod'] == $temp->mode) ) {
													sysfunc::html_notice( $temp->error, $temp->status );
												};
											?>
											<p class="card-title">
												<input type="text" name="btctnx" placeholder="Enter Transaction ID" class='form-control' required>
											</p>
											<p class="card-title">
												<input type="text" name="usd" placeholder="Amount in USD" class='form-control' pattern="\s*[0-9.]+\s*" required>
											</p>
											<p class="card-title"> 
												<label>Upload Payment Proof</label>
												<input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" accept='image/*' >
											</p>
											<input type="hidden" name="mode" value="<?php echo $row['pmethod'];?>" class='form-control' readonly>
											
											<h4 class="card-title" style="color:">
												<button class="btn btn-primary" type="submit">
													Deposit
												</button>
											</h4>
										</div>
										
								</div>
							</div>
						</form>
						
					</div>
					
					<?php }; /*:while*/ }; /*:if*/ ?>
					
				</div>
				<!-- </div>  -->
			</div>
		</div>
	</div>
</div>
  
<?php include 'footer.php'; ?>  
