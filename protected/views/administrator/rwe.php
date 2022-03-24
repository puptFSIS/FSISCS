<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$com = $_GET['com'];
	$pos = $_GET['pos'];
	$sql="DELETE FROM tbl_workexperience WHERE EmpID='$EmpID' AND company='$com' AND positionTitle='$pos'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=administrator/we&msg=The selected work has been removed from your work experience.&msgType=succ");
	} else {
		header("Location: index.php?r=administrator/we&msg=There is an error processing request. Please contact your database administrator.&msgType=err");
	}

?>