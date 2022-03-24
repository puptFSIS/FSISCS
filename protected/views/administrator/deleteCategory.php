<?php
	session_start();
	include ("config.php");
	$EmpID = $_SESSION['CEmpID']; 
	include("config.php");
	$cat = $_GET['cat'];
	$sql="DELETE FROM tbl_categories where category = '$cat'";
	$result=mysqli_query($conn,$sql);
	if($result) {
		header("Location: index.php?r=administrator/Categories");
	}
	mysqli_close($conn);
?>