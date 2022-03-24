<?php
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$request_id = $_GET['request_id'];
	$sql="DELETE FROM tbl_requestschedule where request_id = '$request_id'";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/RequestsManagement");
	}
	mysqli_close();
?>
