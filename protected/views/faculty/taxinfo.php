<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_taxcertificate WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn, $sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		if($row['ionm']=="January")
			$m = "01";
		else if($row['ionm']=="February")
			$m = "02";
		else if($row['ionm']=="March")
			$m = "03";
		else if($row['ionm']=="April")
			$m = "04";
		else if($row['ionm']=="May")
			$m = "05";
		else if($row['ionm']=="June")
			$m = "06";
		else if($row['ionm']=="July")
			$m = "07";
		else if($row['ionm']=="August")
			$m = "08";
		else if($row['ionm']=="September")
			$m = "09";
		else if($row['ionm']=="October")
			$m = "10";
		else if($row['ionm']=="November")
			$m = "11";
		else if($row['ionm']=="December")
			$m = "12";
		else
			$m = "00";
?>