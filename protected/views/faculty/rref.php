<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$name = $_GET['name'];
$address = $_GET['address'];
$telno = $_GET['telno'];

	$sql="DELETE FROM tbl_references WHERE EmpID='$EmpID' AND name='$name' AND address='$address' AND telno='$telno'";
	$result=mysqli_query($conn, $sql);
	
	if($result) {
		header("location: index.php?r=faculty/References&msg=<strong>$name</strong> has been removed successfully to your references.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/References&msg=Error processing command.&msgType=error");
	}

?>