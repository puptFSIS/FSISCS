<?php
	include('config.php');
	session_start();

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];
	$status = $_GET['status'];

		if($status == NULL)
		{
			header('Location: index.php?r=administrator/IPCRlist&a=1&fcode='.$fcode.'&m='.$m.'&y='.$y.'');
		} else if($status == "Submitted")
		{
			header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'');
		}
?>