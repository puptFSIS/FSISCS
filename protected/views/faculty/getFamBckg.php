<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql = "SELECT * FROM tbl_familybackground WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	
	$ssurname = $row['spouseSurname'];
	$sfname = $row['spouseFirstname'];
	$smname = $row['spouseMiddlename'];
	$occ = $row['spouseOccupation'];
	$empname = $row['spouseEmployerName'];
	$busadd = $row['spouseBusinessAddress'];
	$bustelno = $row['spouseBusinessTelNo'];
	$fsurname = $row['spouseFSurname'];
	$ffname = $row['spouseFFirstname'];
	$fmname = $row['spouseFMiddlename'];
	$msurname = $row['spouseMSurname'];
	$mfname = $row['spouseMFirstname'];
	$mmname = $row['spouseMMiddlename'];
	
	$sql = "SELECT * FROM tbl_children WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$fullname = array("","","","","","","","","","  ","  ","  ","  ","  ");
	$fullname[0] = "";
	$cm = array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$cd= array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$cy= array("  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ","  ");
	$ctr=0;
	while($row = mysqli_fetch_array($result)) {
		if ($row['month']=="January") {
			$m="01";
		} else if ($row['month']=="February") {
			$m="02";
		} else if ($row['month']=="March") {
			$m="03";
		} else if ($row['month']=="April") {
			$m="04";
		} else if ($row['month']=="May") {
			$m="05";
		} else if ($row['month']=="June") {
			$m="06";
		} else if ($row['month']=="July") {
			$m="07";
		} else if ($row['month']=="August") {
			$m="08";
		} else if ($row['month']=="September") {
			$m="09";
		} else if ($row['month']=="October") {
			$m="10";
		} else if ($row['month']=="November") {
			$m="11";
		} else if ($row['month']=="December") {
			$m="12";
		}
		$fullname[$ctr] = $row['fullname'];
		$cm[$ctr] = '   ' . $m;
		$cd[$ctr] = $row['day'];
		$cy[$ctr] = $row['year'];
		$ctr = $ctr + 1;
	}
?>