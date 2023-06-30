<?php

require __dir__ . '/sub-config.php';

include 'inc/for-editshares.php';

include 'header.php';

?>


   <div class="card">
   
      <div class="card-header">
            <h5 class="text-center text-md-left mb-0">
				Shares Management
			</h5>
		</div>
		
         <div class="card-body">
            <div class="">
			
				<?php sysfunc::html_notice( $msg ); ?>
			
               <div class="table-responsive">
                  <table class="display table "  id="example">
                     <thead>
                        <tr class="info">
                           <th>Shares Name</th>
                           <th>Percentage</th>
                           <th>Category</th>
                           <th>Sub-category</th>
                           <th>Purchase Bonus</th>
                           <th style="display:none">ID</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $sql= "SELECT * FROM shared ORDER BY id DESC";
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
                           <form action="editshares.php?<?php echo $row["id"];?>" method="post">
                              <td><input class='form-control' name="pname"  type="text" value="<?php echo $row["pname"];?>"></td>
                              <td><input class='form-control' name="increase"  type="text" value="<?php echo $row["increase"];?>"></td>
                              <td><input class='form-control' name="sharescat"  type="text" value="<?php echo $row['sharescat'];?>"></td>
                              <td><input class='form-control' name="sharesubcat"  type="text" value="<?php echo $row['sharesubcat'];?>"></td>
                              <td><input class='form-control' name="bonus"  type="text" value="<?php echo $row['bonus'];?>"></td>
                              <td style="display:none"><input name="id"  type="hidden" value="<?php echo $row["id"];?>"></td>
                              <td><button class="btn btn-primary" type="submit" name="act">
								<span class="glyphicon glyphicon-check">Update</span>
								</button></td>
                           </form>
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

<?php require 'footer.php'; ?>

