<?php
session_start();
$EmpID = $_SESSION['CEmpID'];
include("config.php");
$subject = $_POST['cf_subject'];
$body = $_POST['cf_message'];
	$sql="INSERT INTO tbl_messages VALUES ('$EmpID', '$EmpID', 'Administrator', '$subject', '$body')";
	$result=mysqli_query($conn, $sql);
	header("Location: index.php?r=site/offline&msg=Message successfully sent. Thank you for messaging us.&msgType=suc");
mysqli_close($conn);
?>
