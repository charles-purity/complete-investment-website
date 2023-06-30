<?php

require __dir__ . '/sub-config.php';

$response = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$response = call_user_func(function() use($__user, $link) {
		
		$image = sysfunc::validateImage($_FILES['fileToUpload']);
		if( $image['error_msg'] ) return array($image['error_msg'], false);
		
		$image_name = md5($__user['token']) . ".{$image['extension']}";
		$image_file = __users_contents . '/images/verify/' . $image_name;
		
		$sql = "
			UPDATE users 
			SET ver_image = '{$image_name}', 
				verify = 1
			WHERE email = '{$__user['email']}'
		
		";
		
		$saved = move_uploaded_file($image['tmp_name'], $image_file);
		
		if( $saved ) {
			
			$message = "You means of identifcation was uploaded";
			
			$verify = $link->query( $sql );
			
			if( !$verify ) $message .= "<div class='bg-danger p-5 my-3'>An error occured during the verification process</div>";

			return [$message, true];
			
		} else return ["Sorry! The image could not be uploaded", false];
		
	});
	
}


include "header.php";

?>
 


<div class="panel-header bg-primary-gradient">

	<?php section::title("Account Verification"); ?>
		
	<?php section::price_widget(); ?>
	
</div>

<div class="page-inner " style="margin-top:50px">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
		
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 align="center" style="color:black">
						FINAL VERIFICATION 
					</h2>
				</div>
				<div class='box-body'>
				
                    <div class='text-dark p-5'>
						<p>Dear  <?php echo $__user['username'];?>,</p> 
						<p>NOTE: All information provided by you can not be accessed by anyone, the platform uses end to end encryption to secure all its investors details.</p>
                        <p>Please verify you are not a robot by completing the below upload to have to withdrawal</p>
                    </div>
                    </br>
					
                    <?php sysfunc::html_notice( $response[0] ?? null, $response[1] ?? null ); ?>
					
					<form action="verify.php" method="POST" enctype="multipart/form-data"  class="form-horizontal form-label-left" >
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
								Upload any means of ID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" required >
                            </div>
                        </div>
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit"  class="btn btn-primary" value="Upload Image">Upload ID</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>