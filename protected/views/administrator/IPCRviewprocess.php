<?php
	include('config.php');
	session_start();

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];
	$status = $_GET['status'];

	header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'');
?>