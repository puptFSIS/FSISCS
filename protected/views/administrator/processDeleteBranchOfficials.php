<?php 
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$Name = $_GET['roomName'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];
	$err = 1;
	$sql = "DELETE  FROM tbl_masterlist WHERE FName = '$Name' and sem = '$sem' and schoolYear = '$sy'";
	$result = mysqli_query($conn,$sql);	
	if($result)
	{
		$err = 0;
	}
	
	if($err==1){
		header("Location: index.php?r=administrator/BranchOfficials &msgType=err");
	} else {
		header("Location: index.php?r=administrator/BranchOfficials");
	}
	
	mysqli_close();

?>