<?php 	
	include('config.php');
	session_start();

	$dlinedt = $_POST['dlinedatetime'];
	$m = $_GET['m'];
	$y = $_GET['y'];

	
		$query = "UPDATE tbl_ipcrstatus SET dline_date = '$dlinedt' WHERE month = '$m' AND year = '$y'";
		$res = mysqli_query($conn, $query);

		$sql = "UPDATE tbl_ipcrvisible SET dline_date = '$dlinedt' WHERE month = '$m' AND year = '$y'";
		$result = mysqli_query($conn,$sql);
		if($m == "JJ")
		{
			header('Location: index.php?r=administrator/IPCRcreatejantojune&m='.$m.'&y='.$y.'&mess=4');
		} elseif($m == "JD") {
			header('Location: index.php?r=administrator/IPCRcreatejultodec&m='.$m.'&y='.$y.'&mess=4');
		}

?> 