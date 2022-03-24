<?php
	session_start();
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$RoomName = $_POST['room'];
	$RoomDesc = $_POST['roomDesc'];
	$sql2 = "SELECT * FROM tbl_room WHERE roomName = '".$RoomName."'";
	$result2 = mysqli_query($conn,$sql2);
	$count = mysqli_num_rows($result2);
		if ($count > 1) 
		{
			header("Location: index.php?r=administrator/RoomManagement");
		}
		else
		{
			$sql="INSERT INTO tbl_room VALUES ('".$RoomName."','".$RoomDesc."','')";
			$result=mysqli_query($conn,$sql);
			header("Location: index.php?r=administrator/RoomManagement");
		}
	mysqli_close($conn);
?>