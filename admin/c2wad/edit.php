<?php

require __dir__ . '/sub-config.php';
   
if(isset($_POST['delete'])){

	$email = $link->real_escape_string( $_POST['email']);
	
	if( !empty($email) ) {
		$sql1 = "DELETE FROM users  WHERE email ='$email'";
		if(mysqli_query($link, $sql1)) $msg = "Record Deleted successfully  !";
		else $temp->status = !($msg = "Cannot delete Account! ");
	};
	
}
  
require 'header.php';

?>
  

    <div class="card">
        <div class="card-header with-border">
			<h5 class="text-center text-md-left mb-0">
				INVESTORS MANAGEMENT
			</h5>
		</div>
            <div class="card-body">
				<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>
                <div class="">
                    <div class="table-responsive table-striped">
                        <table class="display table">
                            <thead>
                                <tr>
                                    <th>USERNAME</th>
                                    <th>EMAIL</th>
                                    <th>REFCODE</th>
                                    <th>REG-DATE </th>
                                    <th style="display:none">EMAIL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								
                                    $sql= "SELECT * FROM users ORDER BY id DESC";
                                    $result = mysqli_query($link,$sql);
									
                                    if(mysqli_num_rows($result)):
										while($row = mysqli_fetch_assoc($result)):  
                                    
											if(isset($row['active'])  && $row['active']==1){
											$acst = 'Activated &nbsp;&nbsp;<i style="color:green;font-size:20px;" class="fa  fa-check" ></i>';
											
											}else{
											$acst = 'Deactivated &nbsp;&nbsp;<i style="color:red;font-size:20px;" class="fa  fa-times" ></i>';
											}
											
                                    ?>
                                <tr class="odd gradeX">
                                    <form  action="edit.php" method="POST" onsubmit="return confirm('Delete user (<?php echo $row['email']; ?>)');">
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo $row['refcode'];?></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td style="display:none">
											<input type="hidden" name="email" value="<?php echo $row['email'];?>">
										</td>
                                        <td> 
											<a href="user-edit.php?email=<?php echo $row['email']?>"> 
												<button type="button" name="edit" class="btn btn-primary">
													<span class="fa fa-pencil"></span> 
												</button>
											</a>
											<button type="submit" name="delete" class="btn btn-danger">
												<span class="fa fa-trash"></span>  </span>
											</button>
												<a href='fund-management.php?id=<?php echo $row['id']; ?>' class='btn btn-success'>
													<i class='fa fa-usd'></i> <i class='fa fa-question-circle'></i>
												</a>
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
        </div>

<?php include 'footer.php'; ?>