<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$RoomName = $_GET['roomName'];
	$RoomDesc = $_GET['roomDesc'];
	$sql="DELETE from tbl_room WHERE roomName ='$RoomName' AND roomDesc = '$RoomDesc'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/RoomManagement");
	}
	mysqli_close($conn);
?>