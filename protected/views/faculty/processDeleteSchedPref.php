<?php
	session_start();
	include("config.php");
	
	$FCode = $_SESSION['FCode'];
	$sem = $_POST['sem'];
	$sy = $_POST['sy'];
	$sub = $_POST['sub'];
	$oldbracket = $_POST['oldbracket'];
	
	$sql="DELETE FROM tbl_schedpref WHERE sem='$sem' AND FCode ='$FCode' and sy = '$sy' and scode = '$sub' and bracket = '$oldbracket'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=faculty/SchedPrefList&sem='$sem'&sy='$sy'");
	}
	mysqli_close($conn);
?>