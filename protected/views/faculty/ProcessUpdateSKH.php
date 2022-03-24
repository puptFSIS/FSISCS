<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$skh = $_GET['skh'];
$nskh = $_POST['nskh'];

	$sql="UPDATE tbl_skh SET skh='$nskh' WHERE EmpID='$EmpID' AND skh='$skh'";
	$result=mysqli_query($conn, $sql);
	
	if($result) {
		header("location: index.php?r=faculty/OtherInformation&msg=<strong>$skh</strong> has been changed to <strong>$nskh</strong> successfully.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/OtherInformation&msg=Error removing $skh program to your special skills/hobbies.&msgType=error");
	}

?>