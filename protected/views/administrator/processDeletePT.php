<?php
	require_once('config.php');
	$PTCode=$_GET['PTCode'];
	
	$sql="DELETE FROM tbl_masterlist WHERE FCode='$PTCode';";
	$result1=mysqli_query($conn,$sql);	
	
	$sql="UPDATE tbl_evaluationfaculty SET status='Inactive' WHERE FCode='$PTCode'";
	$result2=mysqli_query($conn,$sql);	
	
	if($result1 && $result2)
	{
		header("location:index.php?r=administrator/PartTime");
	}
?>