<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$vw1 = $_POST['v1'];
$vw2 = $_POST['v2'];
$vw3 = $_POST['v3'];
$vw4 = $_POST['v4'];
$vw5 = $_POST['v5'];
$vw6 = $_POST['v6'];
$vw7 = $_POST['v7'];
$vw8 = $_POST['v8'];
$vw9 = $_POST['v9'];
$vw10 = $_POST['v10'];

if($vw1==null || $vw10==null) {
	header("location: index.php?r=administrator/VoluntaryWorkNew&msg=Please fill up all the required fields. * Required fields.&msgType=error");
} else {
	if($vw9==null) {
		$vw9==" ";
	}
	if($vw2==null) {
		$vw2==" ";
	}
	$sql="INSERT INTO tbl_vwork VALUES ('$EmpID', '$vw1', '$vw2', '$vw3', '$vw4', '$vw5', '$vw6', '$vw7', '$vw8', '$vw9', '$vw10')";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("location: index.php?r=administrator/VoluntaryWork&msg=New voluntary work has been added to your voluntary work.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/VoluntaryWork&msg=Error saving information to your voluntary work.&msgType=error");
	}
}

?>