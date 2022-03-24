<?php
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$FName = $_POST['FName'];
	$MName = $_POST['MName'];
	$LName = $_POST['LName'];
	$Position = $_POST['Position'];
	$Name = strtoupper($LName .', '. $FName .' '.substr($MName,0,1));
	if($MName<>"")
	{
		$Name = $Name = strtoupper($LName .', '. $FName .' '.substr($MName,0,1) .'.');
	}
	$sql="INSERT INTO tbl_masterlist (FName,Position,Status) VALUES ('$Name','$Position','NF')";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/NewFaculty");
	}
	mysqli_close();
?>