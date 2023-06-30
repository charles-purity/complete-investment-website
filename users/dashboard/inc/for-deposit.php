<?php

### sanitize input;

foreach( $_POST as $key => $value ) $_POST[$key] = sysfunc::sanitize_input($value, true);

### help us remember which currency is being deposited 
$temp->mode = $_POST['mode'];

### fill up post data 
$_POST['email'] = $__user['email'];
$_POST['refcode'] = ''; 
$_POST['referred'] = ''; 

$_POST['usd'] = (float)$_POST['usd'];
$_POST['tnxid'] = uniqid('tnx');
$_POST['status'] = 'pending';
$_POST['date'] = date("Y-m-d H:i:s");

### check if usd is empty
if( empty($_POST['usd']) ) $temp->status = !($temp->error = "Please enter your deposit amount");

### check if TXID is empty
if( empty($_POST['btctnx']) ) $temp->status = !($temp->error = "Please enter your Transaction ID");

else {
	
	### check duplicate;
	$tnx_exists = $link->query( "SELECT * FROM btc WHERE btctnx = '{$_POST['btctnx']}'" )->num_rows;
	
	if( !$tnx_exists ) {
		
		### validate image;
		if( $imgdata = sysfunc::validateImage( $_FILE['fileToUpload']?? null ) ) {
			if( !empty($imgdata['error']) ) 
				$temp->status = !($temp->error = $imgdata['error']);
			else $_POST['image'] = file_get_contents( $imgdata['image'] );
		};
	
	} else $temp->status = !($temp->error = "The transaction `<strong>{$_POST['btctnx']}</strong>` has already been sent");
	
};

### If no error was generated from any process above 

if( empty($temp->error) ) {
	
	$sql = sysfunc::mysql_insert_str('btc', $_POST);
	$temp->status = $link->query( $sql );
	
	if( $temp->status ) {
		
		$temp->error = "
			Your {$_POST['mode']} deposit of <strong>{$_POST['usd']} USD</strong> has been sent. <br> 
			Reference ID - <strong>{$_POST['tnxid']}</strong>. <br> 
			You  will be credited once your deposit is confirmed
		";
		
		$mail = sysfunc::initMail();
		$mail->addAddress($__user['email'], $__user['username']);
		
		$eh = new email_handler();
		
		$emailTable = $eh->table_context(array(
			"Username" => $__user['username'],
			"Transaction Amount" => (float)$_POST['usd'] . " USD",
			"Transaction Method" => $_POST['mode'],
			"Reference ID" => $_POST['tnxid'],
			"Status" => $_POST['status']
		),[0]);
		
		$mail->Subject = "Deposit Alert!";
		
		$mail->Body = $eh->message("
			<p>Your deposit request has been sent. <br> You will be credit once the deposit is confirmed.</p>
			<h3>Deposit Details</h3>
			{$emailTable}
		");
		
		($mail->send());
		
	} else $temp->error = "Failed to complete request";
	
};

