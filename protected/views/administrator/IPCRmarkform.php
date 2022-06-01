<?php 
	include('config.php');
	session_start();


	if(isset($_GET['fcode'],$_GET['m'],$_GET['y'],$_GET['mark']))
	{
		$fcode = $_GET['fcode'];
		$m = $_GET['m'];
		$y = $_GET['y'];
		$remarks = $_GET['mark'];

	}
	// echo $remarks;

	$sql = "UPDATE tbl_ipcrstatus SET status='$remarks' WHERE fcode = '$fcode' AND month = '$m' AND year = '$y'";
	$result = mysqli_query($conn,$sql);

	if($result)
	{
		header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'');
		// header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
?>