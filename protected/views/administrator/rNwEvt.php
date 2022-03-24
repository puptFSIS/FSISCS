<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$id = $_GET['id'];
	
	$sql="DELETE FROM tbl_newseventsfaculty WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=administrator/newsandevents&msg=News and Events has been removed successfully.&msgType=succ");
	} else {
		header("Location: index.php?r=administrator/newsandevents&msg=Error removing the news and events.&msgType=err");
	}

?>