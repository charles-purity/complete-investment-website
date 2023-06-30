<?php 

if( isset($_POST['package2']) ) {

	unset($_POST['package2']);
	
	foreach( $_POST as $key => $value ) {
		$value = sysfunc::sanitize_input($value, true);
		$_POST[$key] = $value;
		if( empty($value) ) {
			$temp->status = !($temp->msg = "One or more field is required");
			break;
		};
	};
	
	if( empty($temp->msg) ) {
		
		$_POST['sid'] = uniqid('mys');
		$_POST['status'] = $_POST['date'] = '';

		$sql = sysfunc::mysql_insert_str('shared', $_POST);
		$temp->status = $link->query( $sql );
		
		if( $temp->status ) $temp->msg = "New shares has been successfully added";
		else $temp->msg = "The shares could not be added";
		
	};
	
}
