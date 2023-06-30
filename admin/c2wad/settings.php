<?php

require __dir__ . '/sub-config.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {

	foreach( $_POST as $key => $value ) $_POST[$key] = $link->real_escape_string($value);
	
	if( !empty($_FILES['logo']['size']) ) {
		$filename = basename($_FILES['logo']['name']);
		$target = __admin_contents . '/logo/' . $filename;
		move_uploaded_file($_FILES['logo']['tmp_name'], $target);
		$_POST['logo'] = $filename;
	};
	
	$exists = $link->query( "SELECT * FROM settings" )->num_rows;
	
	if( $exists ) $sql = sysfunc::mysql_update_str( 'settings', $_POST );
	else $sql = sysfunc::mysql_insert_str( 'settings', $_POST );
	
	if( $link->query( $sql ) ) {
		$temp->status = !!($msg = "Settings saved successfully");
		$settings = array_merge($settings, $_POST);
	} else $temp->status = !($msg = "Settings was not saved");

}

include "header.php";

?>

	<div class="card">
		<div class="card-header">
			<h5 class="text-center text-md-left mb-0">
				CONFIGURATION
			</h5>
		</div>

         <div class="card-body">
			<div class=''>
			
				<form class="form-horizontal" action="settings.php" method="POST" enctype="multipart/form-data">
					
					<?php sysfunc::html_notice( $msg, $temp->status ?? null ); ?>
					
				   <div class="form-group">
						<label class='form-label'>Site URL:</label>
					  <input type="text" name="sname" placeholder="site url"  value="<?php echo $settings['bankurl'];?>" class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Name:</label>
					  <input type="text" name="bname" placeholder="Name" value="<?php echo $settings['name'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Withdrawal Limit:</label>
					  <input type="text" name="wl" placeholder="Withdrawal limit" value="<?php echo $settings['wl'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Registration Bonus:</label>
					  <input type="text" name="rb" placeholder="Registration bonus" value="<?php echo $settings['rb'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Site Email:</label>
					  <input type="text" name="email" placeholder="email" value="<?php echo $settings['emaila'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Phone:</label>
					  <input type="text" name="phone" placeholder="phone" value="<?php echo $settings['phone'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Site Title:</label>
					  <input type="text" name="title" placeholder="title" value="<?php echo $settings['title'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Copyright Year:</label>
					  <input type="text" name="cy" placeholder="Copyright Year" value="<?php echo $settings['cy'];?>"  class="form-control">
				   </div>
				   
				   <div class="form-group">
						<label class='form-label'>Logo:</label>
						<div class='border my-1 p-2 text-right shadow-sm'>
							<img src='<?php echo $settings['logourl']; ?>' class='img-fluid'>
						</div>
					  <input type="file" name="logo" placeholder="logo" value="<?php echo $settings['logo'];?>"  class="form-control">
				   </div>
				   
				   <button style="" type="submit" class="btn btn-success"> 
						<i class="fa fa-send"></i>&nbsp; Save Settings 
					</button>
					
				</form>
			</div>
         </div>

   </div>

<?php include 'footer.php'; ?>