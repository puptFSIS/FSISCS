<?php 	
	include('config.php');
	session_start();

	$m = $_GET['m'];
	$y = $_GET['y'];


		$sql = "UPDATE tbl_ipcrvisible SET dline_date = NULL WHERE month = '$m' AND year = '$y'";
		$result = mysqli_query($conn,$sql);
		if($m == "JJ")
		{
			header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'&mess=5');
		} elseif($m == "JD") {
			header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'&mess=5');
		}


?>