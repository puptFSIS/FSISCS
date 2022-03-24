<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$p = $_GET['p'];
$o = $_GET['o'];
$l = $_GET['l'];

	$sql="DELETE FROM tbl_org WHERE EmpID='$EmpID' AND Pos='$p' AND Organization='$o' AND Level='$l'";
	$result=mysqli_query($conn, $sql);
	header("location:index.php?r=faculty/ProOrg&msg=$o($p) has been successfully removed from your organizations that you joined.&msgType=suc");
mysqli_close($conn);
?>