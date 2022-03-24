<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$po1 = $_POST['po1'];
$po2 = $_POST['po2'];
$po3 = $_POST['po3'];
$po4 = $_POST['po4'];
$po5 = $_POST['po5'];
$po6 = $_POST['po6'];

if($po1==null || $po2==null) {
	header("location:index.php?r=faculty/proOrg&msg=Please fill up all the required fields.&msgType=err");
} else { 
	$sql="INSERT INTO tbl_org VALUES ('$po2', '$po1', '$po3', '$po4', '$po5', '$po6', '$EmpID')";
	$result=mysqli_query($conn,$sql);	
	header("location:index.php?r=faculty/proOrg&msg=$po1 has been added to your professional organization.&msgType=suc");
}
mysqli_close();
?>