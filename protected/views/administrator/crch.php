<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$fname = $_GET['fname'];
	$month = $_GET['bmonth'];
	$day = $_GET['bday'];
	$year = $_GET['byear'];
	$sql="DELETE FROM tbl_children WHERE EmpID='$EmpID' AND fullname='$fname' AND month='$month' AND day='$day' AND year='$year'";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/fb&msg=$fname has been successfully removed to your children list.&msgType=succ");
	} else {
		header("Location: index.php?r=administrator/fb&msg=There is an error processing request. Please contact your database administrator.&msgType=err");
	}

?>