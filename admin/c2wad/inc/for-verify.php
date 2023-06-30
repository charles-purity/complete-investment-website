<?php

// delete investor
if(isset($_POST['delete'])){
	
	$email = $_POST['email'];
	$sql = "DELETE FROM users WHERE email='$email'";

	if (mysqli_query($link, $sql)) {
		$msg = "Investor deleted successfully!";
	} else {
		$msg = "Investor not deleted! ";
	}
}
// verify investor

if(isset($_POST['verify'])){
	
	$email = $_POST['email'];
	
	$sql = "UPDATE users SET verify = '1'  WHERE email='$email'";

	if (mysqli_query($link, $sql)) {
		$msg = "Investor verified successfully!";
	} else {
		$msg = "Investor not was not verified! ";
	}
}



if(isset($_POST['vemail'])){
	
	$email = $_POST['email'];
		
	$sql = "UPDATE users SET confirm = '1'  WHERE email='$email'";

	if (mysqli_query($link, $sql)) {
		$msg = "Investor verified successfully!";
	} else {
		$msg = "Investor not was not verified! ";
	}
}



// unverify investors

if(isset($_POST['unverify'])){
	
	$email = $_POST['email'];
		
	$sql = "UPDATE users SET verify = '0'  WHERE email='$email'";

	if (mysqli_query($link, $sql)) {
		$msg = "Investor Un-verified successfully!";
	} else {
		$msg = "Investor not was not Un-verified! ";
	}
	
}

