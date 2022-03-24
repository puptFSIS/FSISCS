<?php
session_start();
$EmpID = $_SESSION['CEmpID'];

include("config.php");

$name = $_GET['name'];
$school = $_GET['school']; 
	$sql="DELETE FROM tbl_scholar WHERE EmpID='$EmpID' AND Name='$name' AND School='$school'";
	$result=mysqli_query($conn, $sql);

	header("location:index.php?r=faculty/scholarships&msg=$name has been successfully removed from your list of scholarship receiver.&msgType=succ");

mysqli_close($conn);
?>