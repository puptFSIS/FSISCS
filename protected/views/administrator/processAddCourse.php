<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$ccode = $_POST['ccode'];
	$course = $_POST['course'];
	$cdesc = $_POST['cdesc'];
	$cinfo = $_POST['cinfo'];
	$career = $_POST['career'];
	$orgID = $_POST['orgID'];
	$stat = $_POST['stat'];
	$years = $_POST['years'];
	$sql="INSERT INTO tbl_course VALUES ('".$ccode."','".$course."','".$cdesc."','".$cinfo."','".$career."','".$orgID."','".$stat."','".$years."')";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/CourseManagement&ccode='$ccode'&cdesc='$cdesc'");
	}
	mysqli_close($conn);
?>