<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$name = $_GET['name'];
$address = $_GET['address'];
$telno = $_GET['telno'];
$nname = $_POST['nname'];
$naddress = $_POST['naddress'];
$ntelno = $_POST['ntelno'];

	$sql="UPDATE tbl_references SET name='$nname', address='$naddress', telno='$ntelno' WHERE EmpID='$EmpID' AND name='$name' AND address='$address' AND telno='$telno'";
	$result=mysqli_query($conn, $sql);
	
	if($result) {
		header("location: index.php?r=faculty/References&msg=<strong>$name</strong> has been updated successfully.&msgType=succ");
	} else {
		header("location: index.php?r=faculty/References&msg=Error processing command.&msgType=error");
	}

?>