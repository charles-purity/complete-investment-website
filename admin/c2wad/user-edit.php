<?php

require __dir__ . '/sub-config.php';

include 'inc/for-user-edit.php';

include 'header.php';

?>

   <div class="card">
   
      <div class="card-header">
         <h2 class="text-center">INVESTORS MANAGEMENT</h2>
      </div>
	  
      <div class="card-body">
		
			<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>
		
			<?php if( !empty($row) ): ?>
			
		  <div class="">
			 <form action="user-edit.php?email=<?php echo $email ;?>" method="POST">
				<div class="table-responsive">
				   <table class="table table-striped table-md">
					  <tr>
						 <th>UserName</th>
						 <th>Email</th>
						 <th class="text-center">Password</th>
						 <th class="text-right">Walletbalance</th>
					  </tr>
					  <tr>
						 <td> <input type="text" readonly class="form-control" value="<?php echo  $row['username'] ;?>"> </td>
						 <td> <input type="text" name="email" class="form-control" value="<?php echo  $row['email'] ;?>"> </td>
						 <td> <input type="text" name="password" class="form-control" value="<?php echo $row['password'] ;?>"></td>
						 <td> <input type="text" name="walletbalance" class="form-control" value="<?php echo $row['walletbalance'] ;?>"></td>
					  </tr>
					  <tr>
						 <th>Refbonus</th>
						 <th class="text-center">Refcode</th>
						 <th>Phone</th>
						 <th class="text-center">Address</th>
					  </tr>
					  <tr>
						 <td> <input type="text" name="refbonus"  class="form-control" value="<?php echo $row['refbonus'] ;?>"> </td>
						 <td> <input type="text" readonly class="form-control" value="<?php echo $row['refcode'] ;?>"></td>
						 
						 <td> <input type="text" name="phone"  class="form-control" value="<?php echo $row['phone'] ;?>"> </td>
						 <td> <input type="text" name="address" class="form-control" value="<?php echo $row['address'] ;?>"></td>
					  </tr>
					  <tr>
						 <th class="text-center">Country</th>
					  </tr>
					  <tr>
						 <td> <input type="text" name="country" class="form-control" value="<?php echo $row['country'] ;?>"></td>
					  </tr>
					  <tr>
						 <td>
							<button  type="submit" name="edit" class="btn btn-success btn-icon icon-left">
							<i class="fa fa-check"></i> Update Details
							</button>
						 </td>
					  </tr>
				   </table>
				</div>
			 </form>
		  </div>
	 
			<?php else: ?>
			
				<div class='border py-5 m-auto mx-md-5'>
					<div class='text-center text-uppercase'>
						<h1>No user data was found</h1>
						<a href='edit.php' class='btn btn-primary'>Back to list</a>
					</div>
				</div>
			
			<?php endif; ?>
        
      </div>
   </div>



<?php include 'footer.php'; ?>