<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$desc = strtoupper($_GET['desc']);
	$sql="DELETE FROM tbl_sodescription WHERE description = '$desc'";
	$result=mysqli_query($conn,$sql);
	if($result) 
		header("Location: index.php?r=administrator/SODesc&msg=Record has been deleted successfully!&msgType=succ");
	mysqli_close($conn);
		
?>