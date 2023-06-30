<?php

$msg = null;
$temp->min_usd = 20;

if(isset($_POST['btc'])){

	foreach( $_POST as $key => $value ) $_POST[$key] = sysfunc::sanitize_input($value);
	
	$temp->status = call_user_func(function() use(&$msg, $__user, $link, $temp) {
		
		if( empty($__user['verify']) ) return !($msg = "Your account is unverified");
		if( empty($_POST['wallet']) ) return !($msg = "Please select a wallet to receive withdrawal");
		if( empty($_POST['mode']) ) return !($msg = "Error handling request");
		if( (float)$_POST['usd'] < $temp->min_usd ) return !($msg = "Minimum withdrawal is {$temp->min_usd} USD");
		
		$data = array(
			"moni" => $_POST['usd'],
			"mode" => $_POST['mode'],
			"email" => $__user['email'],
			"status" => "pending",
			"tnx" => uniqid('tnx'),
			"wal" => $_POST['wallet'],
			"date" => date("Y-m-d H:i:s")
		);
		
		if( (float)$data['moni'] > (float)$__user['walletbalance'] ) return !($msg = "Insufficient withdrawal balance");
		
		$queries = array(
			"UPDATE users SET walletbalance = walletbalance - {$data['moni']} WHERE email='{$__user['email']}'",
			sysfunc::mysql_insert_str( 'wbtc', $data ),
		);
		
		foreach( $queries as $sql ) {
			if( !$link->query($sql) ) {
				return !($msg = "
					An error occured during the withdrawal process. <br> 
					Please try again or sent a support ticket for assistance
				");
			};
		};
		
		$mail = sysfunc::initMail();
		$mail->addAddress($__user['email']);
		$mail->Subject = "Fund Withdrawal";
		
		$eh = new email_handler();
		
		$table = $eh->table_context(array(
			"Username" => $__user['username'],
			"Withdrawal Amount" => $data['moni'] . ' USD',
			"Withdrawal Method" => $data['mode'],
			"Reference ID" => $data['tnx'],
			"Status" => $data['status']
		), [0]);
		
		$msg = "
			Your {$data['mode']} withdrawal request of {$data['moni']} USD has been sent. <br>
			Reference ID - {$data['tnx']}. <br>
			Your will be credited once the request is confirmed.
		";
		
		$mail->Body = $eh->message(" 
			<p>Your withdrawal request has been sent. <br> You will be credit once the withdrawal is confirmed.</p>
			<h3>Withdrawal Details</h3>
			{$table} 
		");
		
		return $mail->send();
		
	});
	
	$__user = (new user())->info();
  
}

