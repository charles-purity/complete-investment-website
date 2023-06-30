<?php

require __dir__ . '/sub-config.php';

   
if(isset($_POST['delete'])){
	
	$id = $_POST['id'];
	$sql = "DELETE FROM pmethod WHERE id= $id";
	
	if (mysqli_query($link, $sql)) {
		$temp->status = !!($msg = "Payment Gateway Successfully Deleted!");
	} else {
		$temp->status = !($msg = "Payment Gateway Not Deleted! ");
	};
	
}
 


include 'header.php';

?>

<div class="card">

    <div class="card-header">
        <h5 class="text-center text-md-left mb-0">
			AVAILABLE PAYMENT GATEWAYS
		</h5>
    </div>
	
    <div class='card-body'>
	
        <?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>

		<div class="table-responsive no-padding">
			<table id="table" class="table table-striped table-hover" cellspacing="0" >
				<thead>
					<tr class="info">
						<th style="display:none;"></th>
						<th>Email</th>
						<th>Payment Method</th>
						<th>Payment Details</th>
						<th>Payment Icon</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $sql= "SELECT * FROM pmethod";
						$result = mysqli_query($link,$sql);
						if(mysqli_num_rows($result) > 0){
						 while($row = mysqli_fetch_assoc($result)){ 

						 ?>
					<tr class="primary">
						<form action="ivtpackages.php" method="post" onsubmit="return confirm('Delete payment gateway (<?php echo $row['pmethod']; ?>)');">
							<td style="display:none;">
								<input type="hidden" name="id" value="<?php echo $row['id'];?>"> 
							</td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['pmethod'];?></td>
							<td><?php echo $row['details'];?></td>
							<td><img src="paymenticon/<?php echo $row['imgs'];?>" width="42px"></td>
							<td>
								<button class="btn btn-danger" type="submit" name="delete" >
									<span class="fa fa-trash"></span>
								</button>
							</td>
						</form>
					</tr>
					<?php
						 } }
						?>
				</tbody>
			</table>
		</div>

	 </div>
    <!-- /top tiles -->
</div>

<?php include 'footer.php'; ?>