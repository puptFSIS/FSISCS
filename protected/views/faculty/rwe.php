<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$com = $_GET['com'];
	$pos = $_GET['pos'];
	$fm = $_GET['fromm'];
	$fd = $_GET['fromd'];
	$fy = $_GET['fromy'];
	$tm = $_GET['tom'];
	$td = $_GET['td'];
	$ty = $_GET['toy'];
	$sql="DELETE FROM tbl_workexperience WHERE EmpID='$EmpID' AND company='$com' AND positionTitle='$pos' AND fromm='$fm' AND fromd='$fd' AND fromy='$fy' AND tom='$tm' AND tod='$td' AND toy='$ty'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=faculty/we&msg=The selected work has been removed from your work experience.&msgType=succ");
	} else {
		header("Location: index.php?r=faculty/we&msg=There is an error processing request. Please contact your database administrator.&msgType=err");
	}

?>