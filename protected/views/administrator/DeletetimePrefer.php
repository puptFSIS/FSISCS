<?php

	session_start();
	$EmpID = $_SESSION['FCode']; 
	include("config.php");
	$timeID = $_GET['timeID'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sql = "SELECT * FROM tbl_timepreferences where timeID = '$timeID'";
	$result = mysqli_query($conn,$sql);


	$sql="Delete from tbl_timepreferences where timeID = '$timeID'";
	$result=mysqli_query($conn,$sql);
	header("Location: index.php?r=administrator/TimePrefer&sem=$sem&sy=$sy");


	mysqli_close($conn);
	
?>

