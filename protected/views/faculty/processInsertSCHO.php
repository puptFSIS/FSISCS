<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$sc1 = $_POST['sc1'];
$sc2 = $_POST['sc2'];
$sc3 = $_POST['sc3'];
$sc4 = $_POST['sc4'];
$sc5 = $_POST['sc5'];
$sc6 = $_POST['sc6'];
$sc7 = $_POST['sc7'];

if($sc1==null || $sc2==null || $sc3==null || $sc4==null) {
	header("location:index.php?r=faculty/NewScholarship&msg=Please fill up all the required fields.&msgType=err");
} else { 
	$sql="INSERT INTO tbl_scholar VALUES ('$sc2', '$sc3', '$sc1', '$sc4', '$sc5', '$sc6', '$sc7', '$EmpID')";
	$result=mysqli_query($conn, $sql);
	header("location:index.php?r=faculty/scholarships&msg=Scholarship has been added.&msgType=succ");
}
mysqli_close($conn);
?>