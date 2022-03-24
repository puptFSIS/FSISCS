<?php
	session_start();
	include("config.php");
	$EmpID = $_SESSION['CEmpID'];
	$certno = $_POST['certno'];
	$iat = $_POST['iat'];
	$ionm = $_POST['ionm'];
	$iond = $_POST['iond'];
	$iony = $_POST['iony'];
	$sql = "INSERT INTO tbl_taxcertificate VALUES('$EmpID','$certno','$iat','$ionm','$iond','$iony')";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("location: index.php?r=faculty/TaxCertificate&msg=Your tax certificate details have been created.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/TaxCertificate&msg=Error processing request.&msgType=err");
	}
?>