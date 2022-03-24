<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$ccode = $_POST['scode'];
	$ctitle = $_POST['stitle'];
	$oldSubj = $_POST['oldsubj'];
	$lec = $_POST['lec'];
	$lab = $_POST['lab'];
	$units = $_POST['Units'];
	$currYear = $_POST['currYear'];
	$sql="UPDATE tbl_subjects SET SubjCode = '$ccode', SubjDescription = '$ctitle', Units = '$units', HoursLec = '$lec', HoursLab = '$lab' WHERE SubjCode = '$oldSubj' AND currYear = '$currYear'";

	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/SubjectManagement&mes=2");
	}
	mysqli_close($conn);
?>
