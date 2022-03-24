<?php
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$cat = $_POST['cat'];
	$ccode = $_POST['ccode'];
	$cdesc = $_POST['cdesc'];
	$sem = $_POST['sem'];
	$sy = $_POST['sy'];
	$sql= "UPDATE tbl_subjects SET Category = '".$cat."' where SubjCode = '".$ccode."'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/categorizeSubjects");
		mysqli_close($conn);
	}
	
?>