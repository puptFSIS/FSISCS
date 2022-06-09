<?php 
	
	session_start();
	include("config.php");
	
	$m = $_GET['m'];
	$y = $_GET['y'];
	$today = date("y.m.d");
	$id = $_GET['id'];
	if($m == "JJ")
	{
		$sql = "UPDATE tbl_ipcr1 SET deleted_on ='$today' WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		if($result) {
			header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'&mess=1');
		}
	} else {
		$sql = "UPDATE tbl_ipcr2 SET deleted_on ='$today' WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		if($result) {
			header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'&mess=1');
		}
	}
	mysqli_close($conn);
?>