<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$rp1 = $_POST['rp1'];
$rp2 = $_POST['rp2'];
$rp3 = $_POST['rp3'];
$rp4 = $_POST['rp4'];
$rp5 = $_POST['rp5'];
$rp6 = $_POST['rp6'];

if($rp1==null || $rp2==null || $rp3==null || $rp4==null || $rp5==null || $rp6==null) {
	header("location:index.php?r=faculty/NewRefereedPublication&msg=Please fill up all the required fields.&msgType=err");
} else { 
	$sql="INSERT INTO tbl_referred VALUES ('$rp1', '$rp2', '$rp3', '$rp4', '$rp5', '$rp6', '$EmpID')";
	$result=mysqli_query($conn, $sql);
	header("location:index.php?r=faculty/refereedPublications&msg=Refereed Publication has been added.&msgType=succ");
}
mysqli_close($conn);
?>