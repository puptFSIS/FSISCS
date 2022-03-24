<?php
	include("config.php");
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	
	$level = $_GET['level'];
	$sname = $_GET['sname'];
	$el1 = $_POST['el1'];
	$el2 = $_POST['el2'];
	$el3 = $_POST['el3'];
	$el4 = $_POST['el4'];
	$el5 = $_POST['el5'];
	$el6 = $_POST['el6'];
	$el7 = $_POST['el7'];

	$sql="UPDATE tbl_educationalbackground SET schoolName='$el1', degreeCourse='$el2', yearGraduated='$el3', highestLevel='$el4', incDateFrom='$el5', incDateTo='$el6', honorsReceived='$el7' WHERE EmpID='$EmpID' AND level='$level' AND schoolName='$sname'";
	$result=mysqli_query($conn, $sql);	
	if($result) {
		header("Location: index.php?r=faculty/eb&msg=Your educational background has been updated successfully!");
	} else {
		echo "mali" . mysqli_error();
	}

	
?>