<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$sa1 = $_POST['sa1'];
$sa2 = $_POST['sa2'];
$sa3 = $_POST['sa3'];
$sa4 = $_POST['sa4'];
$sa5 = $_POST['sa5'];
$sa6 = $_POST['sa6'];
$sa7 = $_POST['sa7'];
$sa8 = $_POST['sa8'];

if($sa1==null || $sa2==null || $sa3==null || $sa4==null) {
	header("location:index.php?r=faculty/NewSeminarAttended&msg=Please fill up all the required fields.&msgType=err");
} else { 
	$sql="INSERT INTO tbl_seminar VALUES ('$sa1', '$sa2', '$sa3', '$sa4', '$sa5', '$sa6', '$sa7', '$sa8', '$EmpID')";
	$result=mysqli_query($conn, $sql);
	header("location:index.php?r=faculty/sa&msg=Seminar has been added.&msgType=suc");
}
mysqli_close($conn);
?>