<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$miao = $_GET['miao'];

	$sql="DELETE FROM tbl_miao WHERE EmpID='$EmpID' AND miao='$miao'";
	$result=mysqli_query($conn,$sql);
	
	if($result) {
		header("location: index.php?r=administrator/OtherInformation&msg=<strong>$miao</strong> has been removed successfully to your membership in association/organization.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/OtherInformation&msg=Error removing $miao to your membership in association/organization.&msgType=error");
	}

?>