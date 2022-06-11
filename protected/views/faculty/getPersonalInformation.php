<?php
	include("config.php");
	$EmpID= "";
	if(isset($_SESSION['CEmpID'])) {
		$EmpID = $_SESSION['CEmpID'];
	} else {
		die(header("Location: index.php?r=site/index"));
	}
	$m = "00";
	$sql = "SELECT * FROM tbl_personalinformation WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);
	//$count=mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
	$surname = $row['surname'];
	$firstname = $row['firstname'];
	$middlename = $row['middlename'];
	$nameextension = $row['nameExtension'];
	if ($row['bmonth']=="January" or $row['bmonth']=="01") {
		$m="01";
	} else if ($row['bmonth']=="February" or $row['bmonth']=="02") {
		$m="02";
	} else if ($row['bmonth']=="March" or $row['bmonth']=="03") {
		$m="03";
	} else if ($row['bmonth']=="April" or $row['bmonth']=="04") {
		$m="04";
	} else if ($row['bmonth']=="May" or $row['bmonth']=="05") {
		$m="05";
	} else if ($row['bmonth']=="June" or $row['bmonth']=="06") {
		$m="06";
	} else if ($row['bmonth']=="July" or $row['bmonth']=="07") {
		$m="07";
	} else if ($row['bmonth']=="August" or $row['bmonth']=="08") {
		$m="08";
	} else if ($row['bmonth']=="September" or $row['bmonth']=="09") {
		$m="09";
	} else if ($row['bmonth']=="October" or $row['bmonth']=="10") {
		$m="10";
	} else if ($row['bmonth']=="November" or $row['bmonth']=="11") {
		$m="11";
	} else if ($row['bmonth']=="December" or $row['bmonth']=="12") {
		$m="12";
	}
	$d = $row['bday'];
	$y = $row['byear'];
	$resadd = $row['residentialAddress'];
	$pbirth = $row['birthplace'];
	$sex = $row['sex'];
	$cstatus = $row['civilStatus'];
	$zipcode = $row['zipCode'];
	$telno = $row['telNo'];
	$peradd = $row['permanentAddress'];
	$citizenship = $row['citizenship'];
	$height = $row['height'];
	$weight = $row['weight'];
	$pzipCode = $row['pzipCode'];
	$bloodType = $row['bloodType'];
	$ptelNo = $row['ptelNo'];
	$gsis = $row['GSIS_ID_NO'];
	$phealth = $row['PHILHEALTH_NO'];
	$pagibig = $row['PAGIBIG_ID_NO'];
	$sss = $row['SSS_NO'];
	$email = $row['email'];
	$cellNo = $row['cellNo'];
	$tin = $row['TIN_NO'];
	$EmpID = $row['EmpID'];
	$fcode = $row['FCode'];
	// $fcode = $EmpID
?>