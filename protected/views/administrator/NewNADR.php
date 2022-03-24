<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$NADR1 = $_POST['nadr'];

if($NADR1==null) {
	header("location: index.php?r=administrator/OtherInformation&msg=Please fill up the new recognition. * Required fields.&msgType=error");
} else {
	$sql="INSERT INTO tbl_nadr VALUES ('$EmpID', '$NADR1')";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("location: index.php?r=administrator/OtherInformation&msg=<strong>$NADR1</strong> has been added to your non-academic distinctions/recognitions.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/OtherInformation&msg=Error saving information.&msgType=error");
	}
}

?>