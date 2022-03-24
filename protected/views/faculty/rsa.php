<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$t = $_GET['t'];
$n = $_GET['n'];
$s = $_GET['s'];
	$sql="DELETE FROM tbl_seminar WHERE EmpID='$EmpID' AND Title='$t' AND Nature='$n' AND Sponsor='$s'";
	$result=mysqli_query($conn, $sql);
	header("location:index.php?r=faculty/sa&msg=Seminar has been successfully removed from saeminars attended.&msgType=suc");
mysqli_close($conn);
?>