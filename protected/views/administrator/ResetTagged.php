<?php

	session_start();
	$EmpID = $_SESSION['FCode']; 
	include("config.php");
	$schedID = $_GET['schedID'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$sql = "SELECT * FROM tbl_subjects where schedID = '$schedID'";
	$result = mysqli_query($conn, $sql);


	$sql="UPDATE tbl_subjpreferences SET sday='', stimeS='', stimeE='', sroom='',sday2 = '',stimeS2 = '', stimeE2 = '', sroom2 = '' where schedID = '$schedID'";
	$result=mysqli_query($conn, $sql);
	header("Location: index.php?r=administrator/TagSchedules&sem=$sem&sy=$sy");


	mysqli_close($conn);
	
?>

