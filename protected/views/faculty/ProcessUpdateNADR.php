<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$nadr = $_GET['nadr'];
$nnadr = $_POST['nnadr'];

	$sql="UPDATE tbl_nadr SET nadr='$nnadr' WHERE EmpID='$EmpID' AND nadr='$nadr'";
	$result=mysqli_query($conn, $sql);
	
	if($result) {
		header("location: index.php?r=faculty/OtherInformation&msg=<strong>$nadr</strong> has been changed to <strong>$nnadr</strong> successfully.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/OtherInformation&msg=Error removing $nadr program to your special skills/hobbies.&msgType=error");
	}

?>