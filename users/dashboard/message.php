<?php

require __dir__ . '/sub-config.php';

$_POST = sysfunc::sanitize_input($_POST);

if (isset($_POST['msgs'])){

	$email = $__user['email'];
	$title = $_POST['title'];
	$message = $_POST['message'];
	$msgid = sysfunc::keygen(10);
	
	$duplicate = $link->query( "
		SELECT * FROM messageadmin 
		WHERE email='{$email}' 
			AND title='{$title}' 
			AND message='{$message}'
	" )->num_rows;
	
	if( $duplicate ) {
		$response = ["Error: Duplicate Message", false];
	} else {
		if( empty($title) || empty($message) ) $response = ["Message not sent! All fields are required", false];
		else {
			$sql = "
				INSERT INTO messageadmin (email, message, title, msgid) 
				VALUES ('$email','$message','$title','$msgid')
			";
			$response = (mysqli_query($link, $sql)) ? ["Your message was successfully sent!", true] : ["Cannot send message!", false];
		};
	};
	
} else $response = [];

include "header.php";

?>

<div class="panel-header bg-primary-gradient">
	<?php section::title("My ticket"); ?>
</div>

<div class="page-inner " style="margin-top:50px">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="card">
			
                <div class="card-header">
                    <h4 class="text-center text-dark mb-0"> 
						<i class="fa  fa-comment"></i> MESSAGE ADMIN 
					</h4>
                </div>
                   
				<div class='card-body'>
				
					<?php sysfunc::html_notice( $response[0] ?? null, $response[1] ?? null ); ?>
					
					<form action="message.php" method="POST" enctype="multipart/form-data"  class="form-horizontal form-label-left" >
						
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="title"  class="form-control col-md-12 col-xs-12"  placeholder="Message title" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea placeholder="write message here" name="message" class="form-control col-md-12 col-xs-12" rows='6' required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <button type="submit"  class="btn btn-info"  name="msgs" >Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>   
