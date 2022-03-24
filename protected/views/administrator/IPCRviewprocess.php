<?php
	include('config.php');
	session_start();

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];
	$fname = $_GET['fname'];
	$mname = $_GET['mname'];
	$sname = $_GET['sname'];


	$sql="SELECT * FROM tbl_ipcrstatus WHERE fcode = '$fcode'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];

		if($status == "not complete")
		{
			header('Location: index.php?r=administrator/IPCRlist&a=1&fcode='.$fcode.'&m='.$m.'&y='.$y.'&fname='.$fname.'&mname='.$mname.'&sname='.$sname.'');
		} else if($status == "complete")
		{
			header('Location: index.php?r=administrator/IPCRview&fcode='.$fcode.'&m='.$m.'&y='.$y.'&fname='.$fname.'&mname='.$mname.'&sname='.$sname.'');
		}
	}

?>