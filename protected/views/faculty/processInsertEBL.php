<?php
	session_start();
	$EmpID = $_SESSION['CEmpID'];

	include("config.php");
	
	$el0 = $_GET['level'];
	$el1 = $_POST['el1'];
	$el2 = $_POST['el2'];
	$el3 = $_POST['el3'];
	$el4 = $_POST['el4'];
	$el5 = $_POST['el5'];
	$el6 = $_POST['el6'];
	$el7 = $_POST['el7'];
	
	$sql="INSERT INTO tbl_educationalbackground VALUES ('$el0', '$el1', '$el2', '$el3', '$el4', '$el5', '$el6', '$el7', '$EmpID')";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("location: index.php?r=faculty/eb&msg=New educational level has been save to your educational background.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/eb&msg=Error saving information to your educational background.&msgType=error");
	}
		
mysqli_close($conn);
?>