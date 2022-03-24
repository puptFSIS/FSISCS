<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$currID = $_GET['currID'];
	$sy = $_GET['sy'];
	$course = $_GET['course'];
	$sql="DELETE FROM tbl_subjectloadlist WHERE currID = '$currID' AND currDesc = '$sy' AND courseDesc = '$course'";
	$result = mysqli_query($conn,$sql);

	$course_code = getCourse($course);
	$sql2 = "DELETE FROM tbl_subjectloadref WHERE currID = '$currID' AND courseID = '$course_code'";
	$result2 = mysqli_query($conn,$sql2);

	$sql3 = "DELETE FROM tbl_subjectload WHERE currID = '$currID' AND courseID = '$course_code'";
	$result3 = mysqli_query($conn,$sql3);


	if($result3){
		header("Location: index.php?r=administrator/CurriculumList");
	}
	mysqli_close($conn);

	function getCourse($ccode) 
	{
		include("config.php");
		$sql = "SELECT * FROM tbl_course WHERE course_code ='$ccode'"; 
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$code = $row['course'];
		return $code;
	}
?>