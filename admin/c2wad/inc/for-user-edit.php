<?php

if(isset($_POST['edit'])){
	
	unset($_POST['edit']);
	sysfunc::sanitize_input($_POST);
	
	$sql = sysfunc::mysql_update_str("users", $_POST) . " WHERE email = '{$_POST['email']}'";
	
	$update = mysqli_query($link, $sql);
	
	if( $update ) $temp->status = !!($msg = "Account details updated successfully!");
	else $temp->status = !($msg = "Account details could not be updated!");
	
}


$email = sysfunc::sanitize_input($_GET['email']);
$sql= "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);

