<?php

define('ignore_login_check', true);

require __dir__ . '/sub-config.php';

$email = $__user['email'];

if(session_destroy()) { //destroy the session

	$sql = "UPDATE users SET session='0' WHERE email='$email'";
	mysqli_query($link, $sql) or die(mysqli_error($link));
	header("location:" . sysfunc::url( __users_login_page ));
}

exit();

