<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$fts1 = $_POST['fts1'];
$fts2 = $_POST['fts2'];
$fts3 = $_POST['fts3'];
$fts4 = $_POST['fts4'];
$fts5 = $_POST['fts5'];
$fts6 = $_POST['fts6'];
$fts7 = $_POST['fts7'];
$fts1 = substr($fts1,0,4);
if($fts2==null) {
	header("location:index.php?r=administrator/NewTempSub&msg=Please fill up all the required fields.&msgType=err");
} else { 
	$sql="INSERT INTO tbl_fts VALUES ('$fts1', '$fts2', '$fts3', '$fts4', '$fts5', '$fts6', '$fts7')";
	$result=mysqli_query($conn,$sql);	
	header("location:index.php?r=administrator/TempSub&msg=$fts1 has been added to your professional organization.&msgType=suc");
}
mysqli_close();
?>