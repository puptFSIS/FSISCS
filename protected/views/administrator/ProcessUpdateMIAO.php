<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$miao = $_GET['miao'];
$nmiao = $_POST['nmiao'];

	$sql="UPDATE tbl_miao SET miao='$nmiao' WHERE EmpID='$EmpID' AND miao='$miao'";
	$result=mysqli_query($conn,$sql);	
	
	if($result) {
		header("location: index.php?r=administrator/OtherInformation&msg=<strong>$miao</strong> has been changed to <strong>$nmiao</strong> successfully.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/OtherInformation&msg=Error removing $miao program to your special skills/hobbies.&msgType=error");
	}

?>