<?php
	session_start();
	include("config.php");
	$EmpID = $_POST['empid'];
	$FCode = $_POST['faccode'];
	$sql="UPDATE tbl_evaluationfaculty SET EmpID='$EmpID' WHERE FCode='$FCode'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("location: index.php?r=administrator/SetEmpID&msg=Employee ID has been set.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/SetEmpID&msg=Failed to set employee ID.");
	}
	mysqli_close();
?>