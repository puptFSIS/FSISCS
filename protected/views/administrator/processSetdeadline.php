<?php 	
	include('config.php');
	session_start();

	$dlinedt = $_POST['dlinedatetime'];
	$m = $_GET['m'];
	$y = $_GET['y'];

	
		
		$sql = "UPDATE tbl_ipcrvisible SET dline_date = '$dlinedt' WHERE month = '$m' AND year = '$y'";
		$result = mysqli_query($conn,$sql);
		header('Location: index.php?r=administrator/IPCRcreatejantojune&c=1&m='.$m.'&y='.$y.'');


?> 