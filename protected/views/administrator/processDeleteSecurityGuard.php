<?php
	require_once('config.php');
	$SGCode=$_GET['SGCode'];
	
	$sql="DELETE FROM tbl_masterlist WHERE FCode='$SGCode';";
	$result=mysqli_query($conn,$sql);	
	
	$sql="UPDATE tbl_evaluationfaculty SET status='Inactive' WHERE FCode='$SGCode'";
	$result=mysqli_query($conn,$sql);	
	
	header("location:index.php?r=administrator/SecurityGuard");
?>