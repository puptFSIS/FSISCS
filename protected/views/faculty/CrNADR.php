<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$nadr = $_GET['nadr'];

	$sql="DELETE FROM tbl_nadr WHERE EmpID='$EmpID' AND nadr='$nadr'";
	$result=mysqli_query($conn,$sql);
	
	if($result) {
		header("location: index.php?r=faculty/OtherInformation&msg=<strong>$nadr</strong> has been removed successfully to your non-academic distinctions/recognitions&msgType=succ");
	} else {
		header("location: index.php?r=faculty/OtherInformation&msg=Error removing $nadr program to your non-academic distinctions/recognitions.&msgType=error");
	}

?>