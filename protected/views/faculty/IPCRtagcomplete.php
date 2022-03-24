<?php
	include('config.php');
	session_start();

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];

	

	$sql = "SELECT * FROM tbl_ipcrstatus WHERE fcode='$fcode' AND year = '$y'";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result))
	{
		$status = $row['status'];

		if($status == "not complete")
		{
			$sql1 = "UPDATE tbl_ipcrstatus SET status = 'complete' WHERE fcode ='$fcode' AND year = '$y'";
			$result1 = mysqli_query($conn,$sql1);

			header('Location: index.php?r=faculty/IPCRfaculty&a=1');

		} else if($status == "complete")
		{
			header('Location: index.php?r=faculty/IPCRfaculty&b=1');
		}

	}
	
?> 