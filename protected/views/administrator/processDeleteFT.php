<?php
	require_once('config.php');
	$FTCode=$_GET['FCode'];
	
	$sql="DELETE FROM tbl_masterlist WHERE FCode='$FTCode';";
	$result=mysqli_query($conn,$sql);	
	
	$sql="UPDATE tbl_evaluationfaculty SET status='Inactive' WHERE FCode='$FTCode'";
	$result=mysqli_query($conn,$sql);	
	
	header("location:index.php?r=administrator/FullTime");
?>