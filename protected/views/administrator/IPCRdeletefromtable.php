<?php 

	include('config.php');

	$m = $_GET['m'];
	$y = $_GET['y'];
	$today = date("y.m.d");

	if($m == "JJ")
	{
		$sql = "UPDATE tbl_ipcr1 SET deleted_on = '$today' WHERE month = '$m' AND year = '$y' AND deleted_on IS NULL";
		$res = mysqli_query($conn,$sql);
	} elseif($m == "JD") {
		$sql = "UPDATE tbl_ipcr2 SET deleted_on = '$today' WHERE month = '$m' AND year = '$y' AND deleted_on IS NULL";
		$res = mysqli_query($conn,$sql);
	}
	if($m == "JJ") 
	{
		header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'&mess=7');
	} else {
		header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'&mess=7');
	}
	
 ?>