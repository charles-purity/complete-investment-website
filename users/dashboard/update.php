<?php

require __dir__ . '/sub-config.php';
  
  
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	unset($_POST['submit']);
	
	$response = call_user_func(function() use($__user, $link) {
		
		if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) return ["Please enter a valid email address", false];
		
		$image = sysfunc::validateImage($_FILES['fileToUpload']);
		
		if( $image['error'] != 4 ) { // Error 4: means no image was uploaded
			
			if( !empty($image['error_msg']) ) return array($image['error_msg'], false);
			
			$image_name = md5($__user['token']) . ".{$image['extension']}";
			$image_file = __users_contents . "/images/profile/" . $image_name;
			
			$_POST['image'] = $image_name;
			
		} else $image = null;
		
		$sql = sysfunc::mysql_update_str("users", $_POST) . " WHERE id = '{$__user['id']}'";
		
		if( $link->query( $sql ) ) {
			
			$message = "Your profile has been updated";
			
			if( $image ) {
				$save_image = move_uploaded_file($image['tmp_name'], $image_file);
				if( !$save_image ) $message .= "<div class='my-3 p-5 bg-danger'>However, an error occured while uploading the image</div>";
			};
			
			return [$message, true];
			
		} else return ["Error! Profile not updated", false];
		
	});

};

include "header.php";

?>


<div class="panel-header bg-primary-gradient">

	<?php section::title("My Profile"); ?>
	
	<?php section::price_widget(); ?>
	
</div>

<div class="page-inner " style="margin-top:50px">
<div class="row row-card-no-pd mt--2">
    <div class="col-md-12 col-sm-12 col-sx-12">
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 align="center"><i class="fa fa-refresh"></i> PROFILE UPDATE</h4>
            </div>
			
                <?php sysfunc::html_notice( $response[0] ?? null, $response[1] ?? null ); ?>
				
                <div class="box-body">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-teal">
                            <form class="form-horizontal" action="update.php" method="POST"  enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text"  readonly  value="<?php  echo $__user['username']?>" placeholder="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email"  name="email"  value="<?php  echo $__user['email']?>" placeholder="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text"  name="phone"  value="<?php  echo $__user['phone']?>" placeholder="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text"  name="address"  value="<?php  echo $__user['address']?>" placeholder="address" class="form-control">
                            </div>
                            <div class="form-group">
								<select name='country' class='form-control'>
									<?php
										foreach( sysfunc::countries() as $code => $country ):
											$selected = ( $__user['country'] == $code ) ? 'selected' : null;
									?>
									<option value='<?php echo $code; ?>' <?php echo $selected; ?>><?php echo $country; ?></option>
									<?php endforeach; ?>
								</select>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Profile Pics <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control col-md-7 col-xs-12" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer no-padding">
                            </br>
                            <div class="form-group">
                                <input type="submit"  name="submit" value="Update Profile" class="btn btn-info">
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
    </div>
    <!-- /.widget-user -->
</div>

<?php include 'footer.php'; ?>