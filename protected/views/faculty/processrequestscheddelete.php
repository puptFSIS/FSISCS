<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$request_id = $_GET['request_id'];
	$schedID = $_GET['schedID'];
	
	$sql="DELETE from tbl_requestschedule WHERE request_id='$request_id' and schedID= '$schedID'";
	$result=mysqli_query($conn, $sql);
	if($result) {
        header("Location: index.php?r=faculty/TeachingLoad");
	}
	mysqli_close($conn);
?>
