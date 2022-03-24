<?php
include("config.php");
	$FCode = $_SESSION['FCode'];
	$sql="SELECT * FROM tbl_evaluationfaculty WHERE FCode='$FCode'";
	$result=mysqli_query($conn,$sql);
	$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$d1 = $row['FCode'];
	$d2 = $row['password'];
	$d3 = $row['isAdmin'];
	$d4 = "";
	$d5 = "";
	$EID = $row['EmpID'];
	if($d3==0) {
		$d3 = 'Staff';
	} else if($d3==1) {
		$d3 = 'Administrator';
	} else if($d3==2) {
		$d3 = "Professor";
	}else {
		$d3 = 'System';
	} 
	if($d4==null) {
		$d4 = 'not set';
	}
	if($EID==null) {
			$EID = 'not set';
	}
?>
