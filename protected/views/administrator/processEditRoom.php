<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$RoomName = $_POST['roomName'];
	$RoomDesc = $_POST['roomDesc'];
	$oldRoomName = $_POST['oldroom'];
	$sql="UPDATE tbl_room SET roomName ='$RoomName', roomDesc = '$RoomDesc' WHERE roomName = '$oldRoomName'";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("Location: index.php?r=administrator/RoomManagement");
	}
	mysqli_close($conn);
?>