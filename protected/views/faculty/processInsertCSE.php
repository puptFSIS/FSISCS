<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$cse1 = $_POST['tb1'];
$cse2 = $_POST['tb2'];
$cse3 = $_POST['tb3'];
$cse4 = $_POST['tb4'];
$cse5 = $_POST['tb5'];
$cse6 = $_POST['tb6'];
$cse7 = $_POST['tb7'];
$cse8 = $_POST['tb8'];
$cse9 = $_POST['tb9'];
$cse10 = $_POST['tb10'];

if($cse2==null || $cse6==null) {
	header("location: index.php?r=faculty/NewCSE&msg=Please fill up all the required fields. * Required fields&msgType=error");
} else {
	$sql="INSERT INTO tbl_cse VALUES ('$cse1', '$cse2', '$cse3', '$cse4', '$cse5', '$cse6', '$cse7', '$cse8', '$cse9', '$cse10', '$EmpID')";
	$result=mysqli_query($conn, $sql);
	if($result) {
		header("location: index.php?r=faculty/communitySE&msg=New community service examination has been added to your CSE.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/communitySE&msg=Error saving information to your CSE.&msgType=error");
	}
}

?>