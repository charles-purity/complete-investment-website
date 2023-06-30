<?php

/* 
	Database credentials. 
	Assuming you are running MySQL
	server with default setting (user 'root' with no password) 
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'wheatonsfirm_admin');
define('DB_PASSWORD', 'Ag65ILd[ifL%');
define('DB_NAME', 'wheatonsfirm_wheatsonsfirm');
 
/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
};

?>