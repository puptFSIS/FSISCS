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

$ovw1 = $_GET['orgname'];
$ovw2 = $_GET['orgadd'];
$ovw3 = $_GET['fromm'];
$ovw4 = $_GET['fromd'];
$ovw5 = $_GET['fromy'];
$ovw6 = $_GET['tom'];
$ovw7 = $_GET['tod'];
$ovw8 = $_GET['toy'];
$ovw9 = $_GET['hours'];
$ovw10 = $_GET['pos'];

if($vw1==null || $vw10==null) {
	header("location: index.php?r=administrator/VoluntaryWorkNew&msg=Please fill up all the required fields. * Required fields.&msgType=error");
} else {
	$sql="DELETE FROM tbl_vwork WHERE EmpID='$EmpID' AND orgname='$ovw1' AND orgadd='$ovw2' AND fromm='$ovw3' AND fromd='$ovw4' AND fromy='$ovw5' AND tom='$ovw6' AND tod='$ovw7' AND toy='$ovw8' AND hours='$ovw9' AND pos='$ovw10'";
	$result=mysqli_query($conn,$sql);	
	
	$sql="INSERT INTO tbl_vwork VALUES ('$EmpID', '$vw1', '$vw2', '$vw3', '$vw4', '$vw5', '$vw6', '$vw7', '$vw8', '$vw9', '$vw10')";
	$result=mysqli_query($conn,$sql);	
	if($result) {
		header("location: index.php?r=administrator/VoluntaryWork&msg=Voluntary work has been updated successfully.&msgType=succ");
	} else {
		header("location: index.php?r=administrator/VoluntaryWork&msg=Error saving information to your voluntary work.&msgType=error");
	}
}

?>