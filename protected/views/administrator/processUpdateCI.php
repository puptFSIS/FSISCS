<?php
	include("config.php");
	session_start();
	$EmpID = $_SESSION['CEmpID'];
	$fname = $_GET['fullname'];
	$fn = $_POST['childnameno1'];
	$m = $_POST['monthno1'];
	$d = $_POST['dayno1'];
	$y = $_POST['yearno1'];

	$sql="UPDATE tbl_children SET fullname='$fn', month='$m', day='$d', year='$y' WHERE EmpID='$EmpID' AND fullname='$fname'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/fb&msg=Your child's information has been updated successfully!");
	} else {
		echo "mali" . mysqli_error();
	}

	
?>