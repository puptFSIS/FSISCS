<?php
	//session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_familybackground WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$spouseSurname = $row['spouseSurname'];
	$spouseFirstname = $row['spouseFirstname'];
	$spouseMiddlename = $row['spouseMiddlename'];
	$spouseOccupation = $row['spouseOccupation'];
	$spouseEmployerName = $row['spouseEmployerName'];
	$spouseBusinessAddress = $row['spouseBusinessAddress'];
	$spouseBusinessTelNo = $row['spouseBusinessTelNo'];
	$spouseFSurname = $row['spouseFSurname'];
	$spouseFFirstname = $row['spouseFFirstname'];
	$spouseFMiddlename = $row['spouseFMiddlename'];
	$spouseMSurname = $row['spouseMSurname'];
	$spouseMFirstname = $row['spouseMFirstname'];
	$spouseMMaidenname = $row['spouseMMaidenname'];
	$spouseMMiddlename = $row['spouseMMiddlename'];

?>