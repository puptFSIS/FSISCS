<?php
	$test = 0;
	if($test==1) {
		$host="almiranezgecilie68358.ipagemysql.com"; 
		$username="fsis1"; 
		$password="fsis1";
		$database="db_puptaguig2"; 
		error_reporting(E_ALL ^ E_DEPRECATED);
		$conn = mysqli_connect("$host", "$username", "$password", "$database") or die("cannot connect"); 
	} else {
		$host="localhost"; 
		$username="root"; 
		$password=""; 
		$database="db_puptaguig"; 
		$conn = mysqli_connect("$host", "$username", "$password", "$database") or die("cannot connect"); 
	}
?>