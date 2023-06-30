<?php

require __dir__ . '/sub-config.php';

include 'inc/for-actshares.php';

include 'header.php';

?>


   <div class="card">
   
      <div class="card-header">
            <h5 class="text-center text-md-left mb-0">
				Users Shares Management
			</h5>
		</div>
		
         <div class="card-body">
            <div class="">
			
				<?php sysfunc::html_notice( $msg ); ?>
			
               <div class="table-responsive">
                  <table class="display table table-striped">
                     <thead>
                        <tr class="info">
                           <th>Shares Name</th>
                           <th>Percentage</th>
                           <th>Category</th>
                           <th>Sub-category</th>
                           <th>Purchase Bonus</th>
                           <th>Status</th>
                           <th>DAte</th>
                           <th>Shares-ID</th>
                           <th style="display:none">ID</th>
                           <th>Action</th>
                           <th>Action</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $sql= "SELECT * FROM ashares ORDER BY id DESC";
                           $result = mysqli_query($link,$sql);
                           if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){  
                            if(isset($row['verify'])  && $row['verify']==1){
                             $msg = 'ID Verified &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-check" ></i>';
                             
                            }else{
                             $msg = 'ID Not verified &nbsp;&nbsp;<i class="fa  fa-times" style=" font-size:20px;color:red"></i>';
                            }
                            
                           
                            
                            ?>
                        <tr class="primary">
                           <form action="actshares.php" method="post">
                              <td><?php echo $row['pname'];?></td>
                              <td><?php echo $row['increase'];?></td>
                              <td><?php echo $row['sharescat'];?></td>
                              <td><?php echo $row['sharesubcat'];?></td>
                              <td><?php echo $row['bonus'];?></td>
                              <td><?php echo $row['status'];?></td>
                              <td><?php echo $row['date'];?></td>
                              <td><?php echo $row['sid'];?></td>
                              <td style="display:none"><input name="id"  type="hidden" value="<?php echo $row["id"];?>"></td>
                              <td><button class="btn btn-success" type="submit" name="act">
								<span class="glyphicon glyphicon-check">Activate</span></button></td>
                              <td><button class="btn btn-warning" type="submit" name="dact">
								<span class="glyphicon glyphicon-check">Deactivate</span></button></td>
							</form>
							<td>
								<form action='actshares.php' method='post' onsubmit="return confirm('Delete package - <?php echo $row['sid']; ?>');">
								    <input name="id"  type="hidden" value="<?php echo $row["id"];?>">
								<button class="btn btn-danger" type="submit" name="delete">
								<span class="glyphicon glyphicon-check">Delete</span></button></td>
								</form>
							</td>
                        </tr>
                        <?php
                           }
                           		  }
                           		  ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- /top tiles -->
      </div>


<?php include 'footer.php'; ?>