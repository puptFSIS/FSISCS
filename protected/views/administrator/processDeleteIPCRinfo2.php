<?php 
	session_start();
	include("config.php");
	
	$m = $_GET['m'];
	$y = $_GET['y'];
	$today = date("y.m.d");
	$id = $_GET['id'];
	$sql = "UPDATE tbl_ipcr2 SET deleted_at ='$today' WHERE id = '$id'";
	$result = mysqli_query($conn,$sql);
	if($result) {
		header('Location: index.php?r=administrator/IPCRcreatejultodec&s=1&m='.$m.'&y='.$y.'');
	}
	mysqli_close($conn);
?>