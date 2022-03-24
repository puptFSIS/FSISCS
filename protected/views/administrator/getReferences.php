<?php
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$sql="SELECT * FROM tbl_references WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	$name = array("","","","","","");
	$address = array("","","","","","");
	$telno = array("","","","","","");
	$ctr = 1;
	while($row = mysqli_fetch_array($result)) {
		$name[$ctr] = $row['name'];
		$address[$ctr] = $row['address'];
		$telno[$ctr] = $row['telno'];
		$ctr = $ctr + 1;
	}
	$certno = "";
	$iat = "";
	$ionm = "00";
	$iond = "00";
	$iony = "00";
	
	$sql1="SELECT * FROM tbl_taxcertificate WHERE EmpID='$EmpID'";
	$result1=mysqli_query($conn,$sql1);
	$row = mysqli_fetch_array($result1);
	$certno = $row['certno'];
	$iat = $row['issuedat'];
	if ($row['ionm']=="January") {
		$ionm="01";
	} else if ($row['ionm']=="February") {
		$ionm="02";
	} else if ($row['ionm']=="March") {
		$ionm="03";
	} else if ($row['ionm']=="April") {
		$ionm="04";
	} else if ($row['ionm']=="May") {
		$ionm="05";
	} else if ($row['ionm']=="June") {
		$ionm="06";
	} else if ($row['ionm']=="July") {
		$ionm="07";
	} else if ($row['ionm']=="August") {
		$ionm="08";
	} else if ($row['ionm']=="September") {
		$ionm="09";
	} else if ($row['ionm']=="October") {
		$ionm="10";
	} else if ($row['ionm']=="November") {
		$ionm="11";
	} else if ($row['ionm']=="December") {
		$ionm="12";
	} else {
		$ionm="";
	}
	$iond = $row['iond'];
	$iony = $row['iony'];
?>