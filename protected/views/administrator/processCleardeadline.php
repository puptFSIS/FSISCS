<?php 	
	include('config.php');
	session_start();

	$m = $_GET['m'];
	$y = $_GET['y'];


		$sql = "UPDATE tbl_ipcrvisible SET dline_date = NULL WHERE month = '$m' AND year = '$y'";
		$result = mysqli_query($conn,$sql);
		header('Location: index.php?r=administrator/IPCRcreatejantojune&d=1&m='.$m.'&y='.$y.'');


?>