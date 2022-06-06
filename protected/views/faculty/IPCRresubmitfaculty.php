<?php 
	include('config.php'); 
	session_start();

	$fcode = $_GET['fcode'];
	$m = $_GET['m'];
	$y = $_GET['y'];

	$sql1 = "UPDATE tbl_ipcrstatus SET status = 'Submitted' WHERE fcode ='$fcode' AND month = '$m' AND year = '$y'";
						$result1 = mysqli_query($conn,$sql1);

	header('Location: index.php?r=faculty/IPCRfaculty&a=1');


?>