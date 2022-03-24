<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$ccode = $_GET['ccode'];
	$cdesc = $_GET['cdesc'];
	$sql="DELETE FROM tbl_course WHERE course_code='$ccode' AND course_desc='$cdesc'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/CourseManagement&ccode='$ccode'&cdesc='$cdesc'");
	}
	mysqli_close($conn);
?>
