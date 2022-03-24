<?php
	include("config.php");
	$m = "00";
	$sql = "SELECT * FROM tbl_evaluationfaculty WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$surname = $row['LName'];
	$firstname = $row['FName'];
	$middlename = $row['MName'];
	$EmpID = $row['EmpID'];
	$Fcode = $row['FCode'];
	$empstat = $row['enu_employmentStat'];
	$evlrls = $row['evalRoles'];
?>