<?php

require __dir__ . '/sub-config.php';

if(isset($_POST['delete'])){
	
	$email = $_POST['email'];
	$sql = "DELETE FROM users WHERE email='$email'";
	if (mysqli_query($link, $sql)) {
		$msg = "Investor deleted successfully!";
	} else {
		$msg = "Investor not deleted! ";
	}
	
}

include 'header.php';

?>
  

    <div class="card">
        <div class="card-header">
                <h5 class="text-center text-md-left mb-0">
					INVESTORS MANAGEMENT
				</h5>
			</div>
            <div class="card-body">
                <div class="">
                    <div class="table-responsive">
                        <table class="table display table-striped" data-table="expanded">
                            <thead>
                                <tr class="info">
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Refcode</th>
                                    <th>Total Plan Profit</th>
                                    <th>Online</th>
                                    <th>Verified</th>
                                    <th>Account Balance</th>
                                    <th>RegDate</th>
                                    <!--<th>Delete</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
									
									$sql= "SELECT * FROM users ORDER BY id DESC";
									
                                    $result = mysqli_query($link,$sql);
									
                                    if(mysqli_num_rows($result)):
										while($row = mysqli_fetch_assoc($result)): 
										
											$msg = !empty($row['session']) ? "<span class='text-success'>Yes</span>" : "<span class='text-danger'>No</span>";
											$ver = !empty($row['verify']) ? "<i class='text-success fa fa-check'></i>" : "<i class='text-danger fa fa-times'></i>";
                                     
                                ?>
                                <tr class="primary">
                                    <form action="users.php" method="post">
                                        <td><?php echo $row['username'];?></td>
                                        <td id="email">
											<?php echo $row['email'];?>
											<input type="hidden" name="email" value="<?php echo $row['email'];?>">
										</td>
                                        <td><?php echo $row['refcode'];?></td>
                                        <td>$<?php echo shares::total_profit($row['email']); ?></td>
                                        <td><?php echo $msg;?></td>
                                        <td><?php echo $ver;?></td>
                                        <td>$<?php echo ($row['walletbalance']);?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <!--<td><button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button></td>-->
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
	
<?php require 'footer.php'; ?>