<?php
session_start();
$EmpID = $_SESSION['CEmpID'];
$tc1 = $_POST['tc1'];
$tc2 = $_POST['tc2'];
$tc3 = $_POST['tc3'];
$tc4 = $_POST['tc4'];
$tc5 = $_POST['tc5'];
include("config.php");

	$sql="UPDATE tbl_taxcertificate SET certno='$tc1', issuedat='$tc2', ionm='$tc3', iond='$tc4', iony='$tc5'  WHERE EmpID='$EmpID'";
	$result=mysqli_query($conn,$sql);	
	
	if($result) {
		header("location: index.php?r=administrator/TaxCertificate&msg=Your tax certificate information has been updated successfully.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/TaxCertificate&msg=Error processing request.&msgType=error");
	}

?>