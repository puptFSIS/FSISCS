<?php
	session_start();
	$EmpID = $_SESSION['FCode']; 
	include("config.php");
	
	$scode = $_GET['scode'];
	$stitle = $_GET['stitle'];	
	$units = 0;//$_GET['units'];
	$lec = $_GET['lec'];
	$lab = $_GET['lab'];
	$csem = $_GET['csem'];
	$sy = $_GET['sy'];
	$categoryname = $_GET['categoryname'];
	

	$sql="INSERT INTO tbl_subjpreferences (scode,stitle,units,lec,lab,sem,schoolYear, sprof) VALUES ('$scode','$stitle','$units','$lec','$lab','$csem','$sy', '$EmpID')";
	$result=mysqli_query($conn,$sql);
	header("Location: index.php?r=administrator/tagSubjectspage&sy=$sy&sem=$csem&categories=$categoryname&mes=1");
	
	mysqli_close($conn);
	
?>
