<?php

require __dir__ . '/sub-config.php';

// delete investor
if(isset($_POST['delete'])){
	
	sysfunc::sanitize_input($_POST, true);
	
	$msgid = $_POST['msgid'];
	
	$sql = "DELETE FROM messageadmin WHERE msgid='$msgid'";

	if (mysqli_query($link, $sql)) {
		$msg = "Message deleted successfully!";
	} else {
		$msg = "Message not deleted! ";
	}	
	
}
// verify investor

if(isset($_POST['read'])){
	
	$msgid = $_POST['msgid'];
	
$sql = "UPDATE messageadmin SET status = '1'  WHERE msgid='$msgid'";

if (mysqli_query($link, $sql)) {
    $msg = "Message marked as read!";
} else {
    $msg = "Message not marked  ";
}
}



include 'header.php';

?>


   <div class="card">
   
      <div class="card-header">
         <h5 class="text-center text-md-left mb-0">
			VIEW MESSAGES
		</h5>
      </div>
	  
      <div class="card-body">
         <div class="">
		 
			<?php sysfunc::html_notice( $msg ); ?>
			
            <div class="table-responsive">
               <table class="display table table-striped"  id="example">
                  <thead>
                     <tr class="info">
                        <th>Email</th>
                        <th>Message</th>
                        <th style="display:none;"></th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
					 
						$sql= "SELECT * FROM messageadmin ORDER BY id DESC";
                        $result = mysqli_query($link,$sql);
						
							if(mysqli_num_rows($result)):
							while($row = mysqli_fetch_assoc($result)): 
							 
								if(!empty($row['status'])) $msg = 'Read <i class="fa fa-check-circle text-success"></i>';	
								else $msg = 'New <i class="fa fa-exclamation-triangle text-danger"></i>';
								
                     ?>
                     <tr class="primary">
                        <form action="viewmail.php" method="post">
                           <td><?php echo $row['email'];?></td>
                           <td id="email"><?php echo $row['message'];?></td>
                           <td style="display:none;"><input type="hidden" name="msgid" value="<?php echo $row['msgid'];?>"> </td>
                           <td><?php echo $row['title'];?></td>
                           <td><img src="<?php echo user::get($row, 'avatar'); ?>" width="50px"></td>
                           <td><?php echo $msg;?></td>
                           <td><?php echo $row['date'];?></td>
                           <td><button class="btn btn-success text-nowrap" type="read" name="read"><span class="glyphicon glyphicon-check"> Mark as read</span></button></td>
                           <td><button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Delete</span></button></td>
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