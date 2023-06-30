<?php

require __dir__ . '/sub-config.php';

if(isset($_POST['ubank'])){
	
	unset($_POST['ubank']);
	
	sysfunc::sanitize_input($_POST, true);
	
	$msg = call_user_func(function() use(&$temp, $link) {
		
		$file = sysfunc::validateImage($_FILES['fileToUpload']);
		if( $file['error_msg'] ) return $file['error_msg'];
		
		$_POST['imgs'] = md5($_POST['details']) . '.' . $file['extension'];
		$_POST['email'] = $temp->admin['email'];

		$duplicate = $link->query( "SELECT * FROM pmethod WHERE details = '{$_POST['details']}'" )->fetch_assoc();
		
		if( $duplicate ) {
			$message = "The payment address already exists for [{$duplicate['pmethod']}]";
			$temp->status = 'warning';
			return $message;
		};

		$sql = sysfunc::mysql_insert_str( 'pmethod', $_POST );
		$saved = $link->query( $sql );
		
		if( $saved ) {
			
			$message = "New Payment Added";
			
			$target_dir = __admin_contents . "/paymenticon/" . $_POST['imgs'];
			$uploaded = move_uploaded_file($file['tmp_name'], $target_dir);
			
			if( !$uploaded ) {
				$message .= "<br> There was an error uploading the payment image";
				$temp->status = 'warning';
			} else $temp->status = 'success';
			
		} else $message = "Payment detail was not added";
		
		return $message;
		
	});
	
}

include "header.php";

?>


<div class="card">

	<div class="card-header">
		<h5 class="text-center text-md-left mb-0">
			WALLET MANAGEMENT
		</h5>
	</div>
	
	<div class="card-body">
		<form class="form-horizontal" action="addwallet.php" method="POST" enctype="multipart/form-data">
			
			<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>
			<div class="form-group">
				<label>Pay Method</label>
				<input type="text" name="pmethod"  placeholder="enter payment method"  class="form-control">
			</div>
			<div class="form-group">
				<label>Payment Address</label>
				<input type="text" name="details"  placeholder="enter payment method"  class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Payment Icon <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" required >
				</div>
			</div>
			<button style="" type="submit" class="btn btn-primary" name="ubank" >Add Payment </button>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>

