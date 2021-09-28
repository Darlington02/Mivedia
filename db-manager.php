<?php

$db_host = 'localhost';
$db_user = 'cryppngx_cryptomall';
$db_pwd = 'Darlington@01';
$db_name = 'cryppngx_cryptomall_database';

$cxn = mysqli_connect($db_host, $db_user, $db_pwd) or die(mysqli_error($cxn));

if(!$cxn)
	{
		echo json_encode("Connection Failed");
	}

// use connection to select database
mysqli_select_db($cxn, $db_name) or die(mysqli_error($cxn));