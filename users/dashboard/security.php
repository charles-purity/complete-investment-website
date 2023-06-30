<?php

require __dir__ . '/sub-config.php';


### Activate 2FA;

if(isset($_POST['activate'])) {
	if(!empty($__user['2fa'])) $msg = "2FA Already activated!";
	else {
		header("location:generate.php");
		exit;
	};	
} 


### Deactivate 2FA;

if(isset($_POST['deactivate'])) {

	$sql = "UPDATE users SET `2fa` = '0' WHERE email='{$__user['email']}'";
	
	if (mysqli_query($link, $sql)) {
		
		$sql2 = "DELETE FROM tfa WHERE email='{$__user['email']}'";
	  
		mysqli_query($link, $sql2);
		
		$msg = " You have successfully deactivated 2FA security reload page";

	} else $msg = " Cannot Deactivate 2FA ";

};

$__user = (new user())->info();

if( !empty($__user['2fa']) ) {
	$sec = "
		<div class='alert alert-success text-center'>
			2FA is Activated <i class='fa fa-check fs-18'></i>
		</div>
	";
} else {
	$sec = "
		<div class='alert alert-danger text-center'>
			2FA is not Activated <i class='fa fa-ban fs-18'></i>
		</div>
	";
};


include "header.php";

?>

<div class="panel-header bg-primary-gradient">

    <?php section::title("Security Control"); ?>
	
    <?php section::price_widget(); ?>
	
</div>

<div class="page-inner " style="margin-top:50px">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 align="center" ><b>ACCOUNT SECURITY</b></h2>
				</div>
				<div class=''>
					<?php  echo $sec ;?>
                    <div class="mb-5" style="width:100%;">
                        <div class="x_panel" style="width:100%; margin-bottom: 3rem;">
                            <?php sysfunc::html_notice( $msg ?? null ); ?>
                            <form id="myform" action="security.php" method="POST">
								<?php if( empty($__user['2fa']) ): ?>
                                <button id="" type="submit"  name="activate" class="btn btn-info" style="margin-left:5%;padding:15px; width:90%;" >
									Activate 2FA
								</button>
								<?php else: ?>
                                <button type="submit" name="deactivate"  class="btn btn-warning"  style="margin-left:5%;padding:15px; width:90%;">
									Deactivate 2FA
								</button>
								<?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>