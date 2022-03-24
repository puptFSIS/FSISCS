<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$skh = $_GET['skh'];

	$sql="DELETE FROM tbl_skh WHERE EmpID='$EmpID' AND skh='$skh'";
	$result=mysqli_query($conn,$sql);
	
	if($result) {
		header("location: index.php?r=administrator/OtherInformation&msg=<strong>$skh</strong> has been removed successfully to your special skills/hobbies&msgType=succ");
	} else {
		header("location: index.php?r=administrator/OtherInformation&msg=Error removing $skh program to your special skills/hobbies.&msgType=error");
	}

?>