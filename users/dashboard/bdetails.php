<?php

require __dir__ . '/sub-config.php';

if(isset($_POST['submit'])){

	unset($_POST['submit']);
	
	foreach( $_POST as $key => $value ) $_POST[$key] = sysfunc::sanitize_input($value);
	
	$sql = sysfunc::mysql_update_str("users", $_POST) . " WHERE email='{$__user['email']}'";
	
	if(mysqli_query($link, $sql)) {
		$msg = "Your wallets has been successfully modified";
		$__user = (new user())->info();
	} else {
        $msg= "Your wallets was not updated";
    };
	
}   

include "header.php";

?>


<div class="panel-header bg-primary-gradient">
    
	<?php section::title("Wallet Details"); ?>
	
    <?php section::price_widget(); ?>
	
</div>

<div class="page-inner " style="margin-top:50px">
    <div class="row row-card-no-pd mt--2">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4 align="center" class="mb-1">
						<i class="fa fa-user"></i> ACCOUNT DETAILS
					</h4>
				</div>
				<div class="card-body">
				
					<?php sysfunc::html_notice($msg ?? null); ?>
					
					<form class="form-horizontal" action="bdetails.php" method="POST" >
						<div class="form-group">
							<label>Perfect Money</label>
							<input type="text"  name="pm" placeholder="Perfect Money ID " value="<?php  echo $__user['pm']; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Ethereum Address</label>
							<input type="text"  name="eth" placeholder="Ethereum Address"  value="<?php  echo $__user['eth']; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>Bitcoin Address</label>
							<input type="text"  name="btc" placeholder="Bitcoin Address "  value="<?php  echo $__user['btc']; ?>" class="form-control">
						</div>
						<div class="form-group">
							<label>USD Tether</label>
							<input type="text"  name="usdt" placeholder="USD Tether"  value="<?php  echo $__user['usdt']; ?>" class="form-control">
						</div>
						<button style="" type="submit" class="btn btn-warning" name="submit" >
							Add / Update wallet 
						</button>
					</form>
					
				</div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>