<?php
	$test = 0;
	if($test==1) {
		$host="almiranezgecilie68358.ipagemysql.com"; 
		$username="fsis"; 
		$password="fsis_1819"; 
		error_reporting(E_ALL ^ E_DEPRECATED);
		$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysqli_select_db("$conn, db_puptaguig2")or die("cannot select DB");
	} else {
		$host="localhost"; 
		$username="root"; 
		$password=""; 
		error_reporting(E_ALL ^ E_DEPRECATED);
		$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysqli_select_db($conn, "db_puptaguig")or die("cannot select DB");
	}
?>