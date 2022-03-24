<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$ccode = $_POST['ccode'];
	$oldccode = $_POST['oldccode'];
	$cdesc = $_POST['cdesc'];
	$cinfo = $_POST['cinfo'];
	$career = $_POST['career'];
	$orgID = $_POST['orgID'];
	$stat = $_POST['stat'];
	$years = $_POST['years'];
	$sql="UPDATE tbl_course SET course_code='$ccode', course_desc='$cdesc', CourseInfo='$cinfo', Career='$career', OrgID='$orgID', Status='$stat', NoOfYears='$years' where course_code='$oldccode'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/CourseManagement&ccode='$ccode'&cdesc='$cdesc'");
	}
	mysqli_close($conn);
?>