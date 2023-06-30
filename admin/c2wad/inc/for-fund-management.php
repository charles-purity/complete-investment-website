<?php

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	$_POST = sysfunc::sanitize_input( $_POST );
	
	$_POST['reason'] = nl2br($_POST['reason']);
	$amount = (float)$_POST['amount'];
	
	if( $_POST['type'] == 'debit' ) $amount *= -1; 
	
	$SQL = "
		UPDATE users 
		SET walletbalance = ROUND(walletbalance + {$amount}, 2)
		WHERE id = {$client['id']}
	";
	
	$status = $link->query( $SQL );
	$msg = $status ? "User Balance Updated" : "User Balance Not Updated";
	
	if( $status ) {
		
		$client = $link->query( $USER_SQL )->fetch_assoc();
		
		$mail = sysfunc::initMail();
		$mail->addAddress($client['email']);
		$mail->Subject = ucwords( $_POST['type'] . " alert" );
		
		$eh = new email_handler();
		
		$negator = ($_POST['type'] == 'credit') ? '$' : '-$';
		
		$data = array(
			"username" => $client['username'],
			"amount" => $negator . $_POST['amount'],
			"date" => date("Y-M-d")
		);
		
		if( !empty($_POST['reason']) ) $data['reason'] = $_POST['reason'];
		
		$table = $eh->table_context($data, [0]);
		
		$mail->Body = ($eh)->message( "
			This is to notify you that your account has been {$_POST['type']}ed
			<h4>Fund Detail</h4>
			{$table}
		" );
		
		($mail->send());
		
	};
	
	// --------------------------------
	
	
};
