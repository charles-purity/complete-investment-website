<?php

require __dir__ . '/sub-config.php';

if(isset($_POST['submit'])){
	$email = sysfunc::sanitize_input($_POST['email'], true);
	$sql = "UPDATE users SET `2fa`='0' WHERE email='{$email}'";
	$msg = (mysqli_query($link, $sql)) ? " 2FA deactivated successfully" : " Could not deactivate 2FA";
}

include "header.php";

?>

<div class="card">

	<div class="card-header with-border">
		<h5 class="text-center text-md-left mb-0">
			GOOGLE AUTHENTICATOR DEACTIVATOR
		</h5>
	</div>
	
	<!-- Widget: user widget style 1 -->
	<div class="card-body ">
	
		<?php sysfunc::html_notice( $msg ); ?>
	
		<!-- Add the bg color to the header using any of the bg-* classes -->
		<div class="widget-user-header bg-white">
			<form class="form-horizontal" action="deactivate.php" method="POST" >
				<div class="form-group">
					<input type="text"  name="email"  placeholder="Enter investor email to deactivate google authenticator" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit"  name="submit" value="Deactivate 2FA" class="btn btn-danger">
				</div>
			</form>
		</div>
		
	</div>

</div>

<?php include 'footer.php'; ?>