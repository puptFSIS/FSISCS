<?php
	require_once('config.php');
	$ASCode=$_GET['ASCode'];
	
	$sql="UPDATE tbl_evaluationfaculty SET status='Inactive' WHERE FCode='$ASCode'";
	$result=mysqli_query($conn,$sql);	
	
	$sql="DELETE FROM tbl_masterlist WHERE FCode='$ASCode';";
	$result=mysqli_query($conn,$sql);	
	

	
	header("location:index.php?r=administrator/AdminStaff");
?>