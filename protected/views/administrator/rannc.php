<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$id = $_GET['id'];
	
	$sql="DELETE FROM tbl_announcementsfaculty WHERE id='$id'";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("Location: index.php?r=administrator/Announcements&msg=Announcement has been removed successfully.&msgType=succ");
	} else {
		header("Location: index.php?r=administrator/Announcements&msg=Error removing the announcement.&msgType=err");
	}

?>