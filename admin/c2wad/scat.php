<?php

require __dir__ . '/sub-config.php';

if( $_SERVER['REQUEST_METHOD'] == "POST" ) {

	if( isset($_POST['submit']) ) unset($_POST['submit']);
	
	$sql = sysfunc::mysql_insert_str('sharesgroup', $_POST);
	
	$temp->status = $link->query($sql);
	
	if( $temp->status ) $temp->msg= "New Shares Category Created!";
    else $temp->msg= "Sorry, Couldnt Create Category!";
    
}


include "header.php";

?>


   <div class="card">
        
		<h5 class='card-header text-center text-md-left mb-0'>
			NEW SHARES CATEGORY 
		</h5>
		
		<div class="card-body">
			
			  <?php sysfunc::html_notice( $temp->msg, $temp->status ?? null); ?>
			  
			  <form action="scat.php" method="POST"  class="form-horizontal form-label-left" >
				 <div class="item form-group col-lg-5 col-md-7">
					<label class="form-label" for="name">
						Shares Category <span class="required">*</span>
					</label>
					<div class="">
					   <input type="text" name="sharescat"  class="form-control" required >
					</div>
				 </div>
				 <div class="item form-group col-lg-5 col-md-7">
					<label class="form-label" for="name">
						Shares Sub Category <span class="required">*</span>
					</label>
					<div class="">
					   <input type="text" name="sharesubcat"  class="form-control" required >
					</div>
				 </div>
				 <div class="col-md-6 col-md-offset-3">
					<button type="submit"  class="btn btn-primary">
						Add Shares Category
					</button>
				 </div>
			  </form>
			  
		</div>
	 </div>


<?php include 'footer.php'; ?>