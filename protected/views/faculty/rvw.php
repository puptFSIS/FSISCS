<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

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

	$sql="DELETE FROM tbl_vwork WHERE EmpID='$EmpID' AND orgname='$ovw1' AND orgadd='$ovw2' AND fromm='$ovw3' AND fromd='$ovw4' AND fromy='$ovw5' AND tom='$ovw6' AND tod='$ovw7' AND toy='$ovw8' AND hours='$ovw9' AND pos='$ovw10'";
	$result=mysqli_query($conn, $sql);
	
	if($result) {
		header("location: index.php?r=faculty/VoluntaryWork&msg=<strong>$ovw1 - $ovw2</strong> has been removed successfully to your voluntary work.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/VoluntaryWork&msg=Error removing voluntary work to your profile.&msgType=error");
	}

?>