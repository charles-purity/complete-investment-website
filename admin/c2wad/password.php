<?php

require __dir__ . '/sub-config.php';

if(isset($_POST['submit'])){

	$msg = call_user_func(function() use(&$temp, $link) {
		
		foreach( $_POST as $key => $value ) $_POST[$key] = sysfunc::sanitize_input($value, true);
		
		if( $temp->admin['password'] != sysfunc::encpass($_POST['opassword']) ) 
			return  "Old password is wrong";
		
		if( strlen($_POST['password']) < 6 ) return "New password should be at least 6 characters";
		
		$sql = sysfunc::mysql_update_str('admin', array(
			'password' => sysfunc::encpass($_POST['password'])
		), $temp->admin['email']);
		
		if( !$link->query( $sql ) ) return "Password not changed";
		
		$_SESSION['password'] = sysfunc::encpass($_POST['password']);
		
		$temp->status = true;
		
		return "Password successfully changed";
		
	});

}

include "header.php";


?>

   <div class="card">
		<div class="card-header">
			<h5 class='text-center text-md-left mb-0'>
				PASSWORD UPDATE
			</h5>
		</div>
		 
         <div class="card-body">
            
			<?php sysfunc::html_notice($msg, !empty($temp->status)); ?>
			
            <div class="box box-widget widget-user-2">
               <div class="widget-user-header bg-white">
			   
                  <form class="form-horizontal" action="password.php" method="POST" >
					  <div class="form-group">
						 <input type="password"  name="opassword"   placeholder="Old Password" class="form-control" required>
					  </div>
					  <div class="form-group">
						 <input type="password"  name="password"   placeholder="New Password" class="form-control" required>
					  </div>
					  <div class="form-group">
						 <input type="submit"  name="submit" value="Change Password" class="btn btn-warning">
					  </div>
				  </form>
				  
               </div>
            </div>
           
         </div>
		 
   </div>

<?php include 'footer.php'; ?>