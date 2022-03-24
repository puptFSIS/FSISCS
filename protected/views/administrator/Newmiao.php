<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$MIAO1 = $_POST['miao'];

if($MIAO1==null) {
	header("location: index.php?r=administrator/OtherInformation&msg=Please fill up the new membership field. * Required fields.&msgType=error");
} else {
	$sql="INSERT INTO tbl_miao VALUES ('$EmpID', '$MIAO1')";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("location: index.php?r=administrator/OtherInformation&msg=<strong>$MIAO1</strong> has been added to your membership in association/organization.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/OtherInformation&msg=Error saving information.&msgType=error");
	}
}

?>