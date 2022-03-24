<?php 
	error_reporting(1); //Turn off php error reporting (use this for deployment)
	date_default_timezone_set('Asia/Manila');
	$server_name   = "localhost";
	$username      = "puptagui_bsit217";
	$password      = "bsit217";
	$database_name = "puptagui_db_puptaguig2";

	$conn = mysqli_connect($server_name, $username, $password, $database_name) or die(mysql_error());
 ?>