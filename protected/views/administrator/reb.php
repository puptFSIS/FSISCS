<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sname = $_GET['sname'];
	$level = $_GET['level'];
	$sql="DELETE FROM tbl_educationalbackground WHERE EmpID='$EmpID' AND schoolName='$sname' AND level='$level'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=administrator/eb&msg=The selected educational level has been removed from your educational background.&msgType=succ");
	} else {
		header("Location: index.php?r=administrator/eb&msg=There is an error processing request. Please contact your database administrator.&msgType=err");
	}

?>