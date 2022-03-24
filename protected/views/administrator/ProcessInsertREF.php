<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$ref1 = $_POST['ref1'];
$ref2 = $_POST['ref2'];
$ref3 = $_POST['ref3'];

if($ref1==null || $ref2==null || $ref3==null) {
	header("location: index.php?r=administrator/ReferencesNew&msg=Please fill up all the required fields. * Required fields.&msgType=error");
} else {
	$sql="INSERT INTO tbl_references VALUES ('$EmpID', '$ref1', '$ref2', '$ref3')";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("location: index.php?r=administrator/References&msg=New referene has been added to your references.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/References&msg=Error saving information to your references.&msgType=error");
	}
}

?>