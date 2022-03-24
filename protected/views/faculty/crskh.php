<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$skh = $_GET['skh'];

	$sql="DELETE FROM tbl_skh WHERE EmpID='$EmpID' AND skh='$skh'";
	$result=mysqli_query($conn,$sql);
	
	if($result) {
		header("location: index.php?r=faculty/OtherInformation&www.puptaguig.org=<strong>$skh</strong> has been removed successfully to your special skills/hobbies&www.puptaguig.orgType=succ");
	} else {
		header("location: index.php?r=faculty/OtherInformation&www.puptaguig.org=Error removing $skh program to your special skills/hobbies.&www.puptaguig.orgType=error");
	}

?>